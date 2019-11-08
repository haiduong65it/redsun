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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard');


Route::group(['prefix'=>'admin'], function(){
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

