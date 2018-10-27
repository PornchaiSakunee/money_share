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
        //baby_share
        Route::prefix('baby_share')->namespace('main_data')->group(function () {
            Route::get('/', 'Baby_shareController@index')->name('baby_share');
            Route::get('/get-amphur', 'Baby_shareController@get_amphur')->name('baby_share.get_amphur');
            Route::get('/get-districts', 'Baby_shareController@get_districts')->name('baby_share.get_districts');
            Route::post('/insert_baby_share', 'Baby_shareController@insert')->name('insert_baby_share');
            Route::get('/edit_get_babyshare', 'Baby_shareController@edit_get_babyshare')->name('edit_get_babyshare');
          });
        //name_share
          Route::prefix('name_share')->namespace('main_data')->group(function () {
            Route::get('/share_name', 'ShareNmaeController@index')->name('share_name'); 
            Route::post('/share_name_insert', 'ShareNmaeController@insert')->name('share_name_insert'); 
          });
          //share_num
          Route::prefix('share_num')->namespace('main_data')->group(function () {
            Route::get('/share_num', 'ShareNumController@index')->name('share_num'); 
            Route::post('/share_num_insert', 'ShareNumController@insert')->name('share_num_insert'); 
          });

          

       
        

        Route::get('menu-food-view', 'food\Menu_foodController@add_view')->name('menu-food-view');
        Route::get('category', 'CategoryController@index')->name('category');
        
   

});
