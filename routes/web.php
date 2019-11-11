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
});

Route::get('/', 'HomeController@home');

