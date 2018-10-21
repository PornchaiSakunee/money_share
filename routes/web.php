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

Route::group(['middleware' => ['langMiddleware']],function(){

        Route::get('/', function () {
            return view('welcome');
        });
        Route::get('lang/{id}',"setLangController@setlang");
        Route::get('manage-room', 'ManageroomController@index');

        Route::get('add-building', 'BuildingController@index');
        Route::post('amphures', 'BuildingController@amphures');
        Route::post('districts', 'BuildingController@districts');
       


        Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');


        Auth::routes();

        Route::get('/home', 'HomeController@index')->name('home');

        Route::get('baby_share', 'main_data\Baby_shareController@index')->name('baby_share');
        Route::post('insert_baby_share', 'main_data\Baby_shareController@insert')->name('insert_baby_share');

        Route::get('menu-food-view', 'food\Menu_foodController@add_view')->name('menu-food-view');
        Route::get('category', 'CategoryController@index')->name('category');
        
   

});
