<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//首页
Route::get('/', 'PagesController@root')->name('root')->middleware('verified');

Route::get('products/favorites', 'ProductsController@favorites')->name('products.favorites');


Auth::routes(['verify' => true]);

// auth 中间件代表需要登录，verified中间件代表需要经过邮箱的验证
Route::group(['middleware' => ['auth','verified']], function () {
    //收货地址列表
    Route::get('user_addresses','UserAddressesController@index')->name('user_addresses.index');
    //添加收货地址
    Route::get('user_addresses/create','UserAddressesController@create')->name('user_addresses.create');
    //处理添加收货地址
    Route::post('user_addresses', 'UserAddressesController@store')->name('user_addresses.store');
    //修改收货地址
    Route::get('user_addresses/{user_address}','UserAddressesController@edit')->name('user_addresses.edit');
    Route::put('user_addresses/{user_address}', 'UserAddressesController@update')->name('user_addresses.update');
    //删除收货地址
    Route::delete('user_addresses/{user_address}', 'UserAddressesController@destroy')->name('user_addresses.destroy');

    //商品列表页面
    Route::redirect('/', '/products')->name('root');
    Route::get('products', 'ProductsController@index')->name('products.index');

    //商品详情页
    Route::get('products/{product}', 'ProductsController@show')->name('products.show');

    //商品收藏
    Route::post('products/{product}/favorite','ProductsController@favor')->name('products.favor');
    //取消商品收藏
    Route::delete('products/{product}/favorite','ProductsController@disfavor')->name('products.disfavor');

    //添加商品
    Route::post('cart', 'CartController@add')->name('cart.add');
    //查看购物车
    Route::get('cart','CartController@index')->name('cart.index');
    //移除购物车商品
    Route::delete('cart/{sku}','CartController@remove')->name('cart.remove');

    //购物车下单
    Route::post('orders', 'OrdersController@store')->name('orders.store');

    //订单列表
    Route::get('orders','OrdersController@index')->name('orders.index');

    //订单详情页
    Route::get('orders/{order}', 'OrdersController@show')->name('orders.show');

    // 支付宝支付
//    Route::get('alipay', function() {
//        return app('alipay')->web([
//            'out_trade_no' => time(),
//            'total_amount' => '1',
//            'subject' => 'test subject - 测试',
//        ]);
//    });

    // 订单支付宝支付
    Route::get('payment/{order}/alipay', 'PaymentController@payByAlipay')->name('payment.alipay');

    Route::get('payment/{order}/wechat', 'PaymentController@payByWechat')->name('payment.wechat');

    // 前端回调地址
    Route::get('payment/alipay/return', 'PaymentController@alipayReturn')->name('payment.alipay.return');

    // 确认收货
    Route::post('orders/{order}/received', 'OrdersController@received')->name('orders.received');

    // 展示评价
    Route::get('orders/{order}/review', 'OrdersController@review')->name('orders.review.show');
    // 提交评价
    Route::post('orders/{order}/review', 'OrdersController@sendReview')->name('orders.review.store');

    // 提交退款申请
    Route::post('orders/{order}/apply_refund', 'OrdersController@applyRefund')->name('orders.apply_refund');

    // 检查优惠券
    Route::get('coupon_codes/{code}', 'CouponCodesController@show')->name('coupon_codes.show');

    // 众筹
    Route::post('crowdfunding_orders','OrdersController@crowdfunding')->name('crowdfunding_orders.store');

    // 分期付款
    Route::post('payment/{order}/installment', 'PaymentController@payByInstallment')->name('payment.installment');

    // 分期付款列表页
    Route::get('installments', 'InstallmentsController@index')->name('installments.index');

    // 分期详情页
    Route::get('installments/{installment}', 'InstallmentsController@show')->name('installments.show');

    // 分期还款(支付宝)
    Route::get('installments/{installment}/alipay', 'InstallmentsController@payByAlipay')->name('installments.alipay');
    Route::get('installments/alipay/return', 'InstallmentsController@alipayReturn')->name('installments.alipay.return');

    // 分期还款（微信）
    Route::get('installments/{installment}/wechat', 'InstallmentsController@payByWechat')->name('installments.wechat');
});

Route::post('installments/wechat/notify', 'InstallmentsController@wechatNotify')->name('installments.wechat.notify');

// 服务器端回调地址
Route::post('payment/alipay/notify', 'PaymentController@alipayNotify')->name('payment.alipay.notify');

Route::post('payment/wechat/notify', 'PaymentController@wechatNotify')->name('payment.wechat.notify');

// 退款回调路由
Route::post('payment/wechat/refund_notify', 'PaymentController@wechatRefundNotify')->name('payment.wechat.refund_notify');

// 后端回调不能放在 auth 中间件中
Route::post('installments/alipay/notify', 'InstallmentsController@alipayNotify')->name('installments.alipay.notify');

Route::post('installments/wechat/refund_notify', 'InstallmentsController@wechatRefundNotify')->name('installments.wechat.refund_notify');

