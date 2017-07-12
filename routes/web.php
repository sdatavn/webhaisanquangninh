<?php
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
Auth::routes();
Route::get('trangchu', function () {
	return redirect('/');
});
Route::get('admin/quanlyslide/uphinh','adminController@uphinhslide');
Route::post('admin/quanlyslide/uphinh','adminController@uphinhslide1');
Route::get('admin/quanlyslide/suahinh/{id}','adminController@suahinhslide');
Route::post('admin/quanlyslide/suahinh/{id}','adminController@suahinhslide1');
Route::get('admin/quanlyslide/xoahinh/{id}','adminController@xoahinhslide');
Route::get('admin/doimatkhau','adminController@doimatkhau');
Route::post('admin/doimatkhau','adminController@doimatkhau1');
Route::get('admin/menuu','adminController@menuu');
Route::get('guigmail','trangchuController@guimail');
Route::get('admin/thongbao','adminController@thongbao');
Route::get('admin/thongbao/{id}','adminController@xoathongbao');
Route::get('timkiem','trangchuController@timkiem');
Route::get('admin/thanhtoan','adminController@hdthanhtoan');
Route::get('admin/muahang','adminController@hdmuahang');
Route::get('gioithieu','trangchuController@gioithieu');
Route::get('lienhe','trangchuController@lienhe');
Route::any('admin/hientheloai/{id}','adminController@hientheloai');
Route::get("admin/index",'adminController@index');
Route::get('admin/upbai','adminController@upbai');
Route::post('admin/upbai','adminController@save');
Route::get('admin/thongtin','adminController@thongtin');
Route::post('admin/suabai','adminController@suabai');
Route::get('admin/baihaisan','adminController@baihaisan');
Route::get('admin/sapxep','adminController@baihaisansx');
Route::get('admin/quanlybanner','adminController@quanlybanner');
Route::post('admin/quanlybanner','adminController@banner');
Route::get('admin/quanlyslide','adminController@quanlyslide');
Route::post('admin/quanlyslide','adminController@slide');
Route::get('admin/quanlydonhang','adminController@quanlydonhang');
Route::get('admin/quanlydonhangg','adminController@quanlydonhangg');
Route::post('admin/capnhat','adminController@capnhatthongtin');
Route::post('admin/gioithieu/save','adminController@luugioithieu');
Route::post('admin/lienhe/save','adminController@luulienhe');
Route::get('admin/menu','adminController@menu');
Route::get('admin/menuu','adminController@menuu');
Route::get('admin/gioithieu','adminController@gioithieu');
Route::get('admin/lienhe','adminController@lienhe');
Route::get('admin/{id}','adminController@sua');
Route::get('admin/xoa/{id}','adminController@xoa');
Route::get('/','trangchuController@trangchu');
Route::get('sanpham/{id}','trangchuController@sanpham');
Route::get('admin',function(){
	return redirect('admin/baihaisan');
});
Route::get('admin/menu/chitietmenu/themtheloai/{id}','adminController@themtl');
Route::POST('admin/menu/chitietmenu/themtheloai/{id}','adminController@savetl');
Route::get('admin/menu/chitietmenu/xoa/{id1}/{id}','adminController@xoatl');
Route::get('admin/menu/chitietmenu/sua/{id1}/{id}','adminController@suatl');
Route::post('admin/menu/chitietmenu/sua/{id1}/{id}','adminController@luutl');
Route::get('admin/menu/themmenu','adminController@themmenu');
Route::POST('admin/menu/themmenu','adminController@luumenu');
Route::get('admin/menu/sua/{id}','adminController@suamenu1');
Route::post('admin/menu/sua/{id}','adminController@suamenu2');
Route::get('admin/menu/chitietmenu/thutu','adminController@menucontt');
Route::get('admin/menu/chitietmenu/{id}','adminController@menucon');
Route::get('admin/menu/{id}','adminController@xoamenu');
Route::resource('cart', 'CartController');
Route::delete('emptyCart', 'CartController@emptyCart');
Route::post('switchToWishlist/{id}', 'CartController@switchToWishlist');
Route::resource('wishlist', 'WishlistController');
Route::delete('emptyWishlist', 'WishlistController@emptyWishlist');
Route::post('switchToCart/{id}', 'WishlistController@switchToCart');
Route::post('thanhcong','CartController@luucsdl');
Route::get('danhmuc/{id}','trangchuController@trangcha');
Route::get('danhmuc/{id1}/{id}','trangchuController@phanloai');
Route::get('admin/quanlydonhang/{id}','adminController@xoadonhang');
Route::get('tintuc/{id}','trangchuController@tintuc');
Route::get('thanhtoan','trangchuController@thanhtoan');
Route::get('muahang','trangchuController@muahang');
Route::get('admin/thanhtoan/save','adminController@luuthanhtoan');
Route::get('admin/muahang/save','adminController@luumuahang');


