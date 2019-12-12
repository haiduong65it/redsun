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

Route::get('/admin/dashboard', 'HomeController@dashboard');

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

		Route::get('xemct/{id_sanpham}','SanphamController@get_chitiet');
		Route::post('xemct/{id}','SanphamController@post_chitiet');
	});

	Route::group(['prefix'=>'hinhanh'], function(){

		Route::get('danhsach', 'HinhanhController@danhsach');

		Route::get('them', 'HinhanhController@get_them');
		Route::post('them', 'HinhanhController@post_them');

		Route::get('sua/{id}', 'HinhanhController@get_sua');
		Route::post('sua/{id}', 'HinhanhController@post_sua');

		Route::get('xoa/{id}', 'HinhanhController@xoa');
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

