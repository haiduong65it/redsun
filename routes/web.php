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
	});
});

