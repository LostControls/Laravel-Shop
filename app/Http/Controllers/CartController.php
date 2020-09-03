<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddCartRequest;
use App\Models\ProductSku;
use Illuminate\Http\Request;
use App\Models\CartItem;

class CartController extends Controller
{
    /**
     * Notes: 购物车页面
     * Created by PhpStorm.
     * User: ChenYiWen
     * DateTime: 2020/9/3 10:05
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\View\View|\think\response\View
     */
    public function index(Request $request)
    {
        $cartItems = $request->user()->cartItems()->with(['productSku.product'])->get();

        return view('cart.index', ['cartItems' => $cartItems]);
    }

    /**
     * Notes: 添加商品到购物车
     * Created by PhpStorm.
     * User: ChenYiWen
     * DateTime: 2020/9/3 10:05
     * @param AddCartRequest $request
     * @return array
     */
    public function add(AddCartRequest $request)
    {
        $user   = $request->user();
        $skuId  = $request->input('sku_id');
        $amount = $request->input('amount');

        //从数据库中查询该商品是否已经在购物车中
        if ($cart = $user->cartItems()->where('product_sku_id', $skuId)->first()) {

            // 如果存在则直接叠加商品数量
            $cart->update([
               'amount' => $cart->amount + $amount,
            ]);
        } else {

            //否则创建一个新的购物车记录
            $cart = new CartItem(['amount' => $amount]);
            $cart->user()->associate($user);
            $cart->productSku()->associate($skuId);
            $cart->save();
        }

        return [];
    }

    /**
     * Notes: 移除购物车商品
     * Created by PhpStorm.
     * User: ChenYiWen
     * DateTime: 2020/9/3 10:13
     * @param ProductSku $sku
     * @param Request $request
     * @return array
     */
    public function remove(ProductSku $sku, Request $request)
    {
        $request->user()->cartItems()->where('product_sku_id',$sku->id)->delete();

        return [];
    }
}
