<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Models\UserAddress;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Services\OrderService;
use App\Exceptions\InvalidRequestException;

class OrdersController extends Controller
{
    /**
     * Notes: 创建订单
     * Created by PhpStorm.
     * User: ChenYiWen
     * DateTime: 2020/9/3 17:31
     * @param OrderRequest $request
     * @return mixed
     */
    public function store(OrderRequest $request, OrderService $orderService)
    {
        $user    = $request->user();
        $address = UserAddress::find($request->input('address_id'));

        return $orderService->store($user, $address, $request->input('remark'), $request->input('items'));
    }

    /**
     * Notes: 订单列表
     * Created by PhpStorm.将下单的商
     * User: ChenYiWen
     * DateTime: 2020/9/4 15:53
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\View\View|\think\response\View
     */
    public function index(Request $request)
    {
        $orders = Order::query()
            // 使用 with 方法预加载，避免N + 1问题
            ->with(['items.product', 'items.productSku'])
            ->where('user_id', $request->user()->id)
            ->orderBy('created_at','desc')
            ->paginate();

        return view('orders.index', ['orders' => $orders]);
    }

    /**
     * Notes: 订单详情页
     * Created by PhpStorm.
     * User: ChenYiWen
     * DateTime: 2020/9/4 17:00
     * @param Order $order
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\View\View|\think\response\View
     */
    public function show(Order $order, Request $request)
    {
        $this->authorize('own', $order);
        return view('orders.show', ['order' => $order->load(['items.productSku', 'items.product'])]);
    }

    /**
     * Notes: 确认收货
     * Created by PhpStorm.
     * User: ChenYiWen
     * DateTime: 2020/9/17 17:50
     * @param Order $order
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function received(Order $order, Request $request)
    {
        // 校验权限
        $this->authorize('own', $order);

        // 判断订单的发货状态是否为已发货
        if ($order->ship_status !== Order::SHIP_STATUS_DELIVERED) {
            throw new InvalidRequestException('发货状态不正确');
        }

        // 更新发货状态为已收到
        $order->update(['ship_status' => Order::SHIP_STATUS_RECEIVED]);

        // 返回订单信息
        return $order;
    }
}
