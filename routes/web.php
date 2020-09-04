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
});


