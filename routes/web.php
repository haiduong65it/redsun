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

//Auth::routes();

Route::get('/admin/dashboard', 'HomeController@dashboard')->middleware('AdminLogin');

Route::get('/admin/register', 'UserController@get_Register');
Route::post('/admin/register', 'UserController@post_Register');
Route::get('/admin/login', 'UserController@get_Login');
Route::post('/admin/login', 'UserController@post_Login');
Route::get('/admin/edit/{id}', 'UserController@get_Edit');
Route::post('/admin/edit/{id}', 'UserController@post_Edit');
Route::get('/admin/logout', 'UserController@Logout');

Route::group(['prefix'=>'admin', 'middleware'=>'AdminLogin'], function(){
	Route::group(['prefix'=>'nhanvien'], function(){

		Route::get('danhsach', 'NhanvienController@danhsach');

		Route::get('them', 'NhanvienController@get_them');
		Route::post('them', 'NhanvienController@post_them');

		Route::get('sua/{id}', 'NhanvienController@get_sua');
		Route::post('sua/{id}', 'NhanvienController@post_sua');

		Route::get('xoa/{id}', 'NhanvienController@xoa');
	});

	Route::group(['prefix'=>'thanhvien'], function(){

		Route::get('danhsach', 'ThanhvienController@danhsach');

		Route::get('them', 'ThanhvienController@get_them');
		Route::post('them', 'ThanhvienController@post_them');

		Route::get('sua/{id}', 'ThanhvienController@get_sua');
		Route::post('sua/{id}', 'ThanhvienController@post_sua');

		Route::get('xoa/{id}', 'ThanhvienController@xoa');
	});

	Route::group(['prefix'=>'loaisanpham'], function(){

		Route::get('danhsach', 'LoaisanphamController@danhsach');

		Route::get('them', 'LoaisanphamController@get_them');
		Route::post('them', 'LoaisanphamController@post_them');

		Route::get('sua/{id}', 'LoaisanphamController@get_sua');
		Route::post('sua/{id}', 'LoaisanphamController@post_sua');

		Route::get('xoa/{id}', 'LoaisanphamController@xoa');
	});

	Route::group(['prefix'=>'thuonghieu'], function(){

		Route::get('danhsach', 'ThuonghieuController@danhsach');

		Route::get('them', 'ThuonghieuController@get_them');
		Route::post('them', 'ThuonghieuController@post_them');

		Route::get('sua/{id}', 'ThuonghieuController@get_sua');
		Route::post('sua/{id}', 'ThuonghieuController@post_sua');

		Route::get('xoa/{id}', 'ThuonghieuController@xoa');
	});

	Route::group(['prefix'=>'baohanh'], function(){

		Route::get('danhsach', 'BaohanhController@danhsach');

		Route::get('them', 'BaohanhController@get_them');
		Route::post('them', 'BaohanhController@post_them');

		Route::get('sua/{id}', 'BaohanhController@get_sua');
		Route::post('sua/{id}', 'BaohanhController@post_sua');

		Route::get('xoa/{id}', 'BaohanhController@xoa');
	});

	Route::group(['prefix'=>'sanpham'], function(){

		Route::get('danhsach', 'SanphamController@danhsach');

		Route::get('them', 'SanphamController@get_them');
		Route::post('them', 'SanphamController@post_them');

		Route::get('sua/{id}', 'SanphamController@get_sua');
		Route::post('sua/{id}', 'SanphamController@post_sua');

		Route::get('xoa/{id}', 'SanphamController@xoa');

		Route::get('xemct/{id}','SanphamController@get_chitiet');

		Route::get('suact/{id}','SanphamController@get_suact');
		Route::post('suact/{id}','SanphamController@post_suact');
		Route::post('xoact/{id}','SanphamController@xoact');

		
	});

	Route::group(['prefix'=>'hinhanh'], function(){

		Route::get('danhsach', 'HinhanhController@danhsach');

		Route::get('them', 'HinhanhController@get_them');
		Route::post('them', 'HinhanhController@post_them');

		Route::get('sua/{id}', 'HinhanhController@get_sua');
		Route::post('sua/{id}', 'HinhanhController@post_sua');

		Route::get('xoa/{id}', 'HinhanhController@xoa');
	});

	Route::group(['prefix'=>'khuyenmai'], function(){

		Route::get('danhsach', 'KhuyenmaiController@danhsach');

		Route::get('them', 'KhuyenmaiController@get_them');
		Route::post('them', 'KhuyenmaiController@post_them');

		Route::get('sua/{id}', 'KhuyenmaiController@get_sua');
		Route::post('sua/{id}', 'KhuyenmaiController@post_sua');

		Route::get('xoa/{id}', 'KhuyenmaiController@xoa');

		Route::get('xemdssp/{id}','KhuyenmaiController@get_dssp');
		Route::get('themct/{id}','KhuyenmaiController@get_themct');
		Route::post('themct/{id}','KhuyenmaiController@post_themct');

		Route::get('xoact/{id}','KhuyenmaiController@get_xoact');
	});

	Route::group(['prefix'=>'phieunhap'], function(){

    	Route::get('danhsach','PhieunhapController@danhsach');

    	Route::get('chitiet/{id}','PhieunhapController@get_chitiet');

    	Route::get('them','PhieunhapController@get_them');
		Route::post('them','PhieunhapController@post_them');

		Route::get('sua/{id}','PhieunhapController@get_sua');
		Route::post('sua/{id}','PhieunhapController@post_sua');

		Route::get('xoa/{id}','PhieunhapController@xoa');

		Route::get('themct/{id}','PhieunhapController@get_themCT');
		Route::post('themct/{id}','PhieunhapController@post_themCT');
		Route::get('suact/{id}','PhieunhapController@get_suact');
		Route::post('suact/{id}','PhieunhapController@post_suact');
		Route::post('xoact/{id}','PhieunhapController@xoact');
	});

	Route::group(['prefix'=>'donhang'], function () {

    	Route::get('danhsach','DonhangController@danhsach');

		Route::get('duyetdon/{id}','DonhangController@get_duyet');
		Route::post('duyetdon/{id}','DonhangController@post_duyet');

		Route::get('chitiet/{id}','DonhangController@get_chitiet');
		Route::get('xoa/{id}','DonhangController@get_xoa');
	});
});

Route::get('/', 'HomeController@home')->name('home');
Route::get('/login', 'FrontendController@get_Login');
Route::post('/login', 'FrontendController@post_Login');
Route::get('/register', 'FrontendController@get_Register');
Route::post('/register', 'FrontendController@post_Register');
Route::get('/edit/{id}', 'FrontendController@get_Edit');
Route::post('/edit/{id}', 'FrontendController@post_Edit');
Route::get('logout', 'FrontendController@Logout');
Route::get('/cart','FrontendController@get_dathang');
Route::post('/cart','FrontendController@post_dathang');
Route::get('/detail_product/{id}','FrontendController@getCTSanPham');

Route::get('/add-to-cart/{id}',[
	'as' => 'themgiohang',
	'uses' => 'FrontendController@AddToCart'
]);

Route::get('/del-cart/{id}',[
	'as' => 'xoagiohang',
	'uses' => 'FrontendController@getDelItemCart'
]);

Route::get('/product','FrontendController@get_sanpham');
Route::post('/product','FrontendController@post_sanpham');
Route::get('/introduce','FrontendController@get_introduce');
