<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\homeController;

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
//Admin routes
//Route::get('/', function(){return view('login');});
Route::get('/', 'adminController@home');
Route::get('/logout', 'adminController@logout')->name('logout');;

Route::post('adminLogin', 'adminController@adminLogin')->name('adminLogin');
Route::get('home', 'adminController@home')->name('home');

Route::post('search', 'adminController@search')->name('search');
Route::get('add_product', 'adminController@add_product')->name('add_product');
Route::post('edit_products', 'adminController@edit_products')->name('update_pro');
Route::get('column', 'adminController@column')->name('column');
Route::get('home', 'adminController@home');
Route::post('supplier', 'adminController@supplier')->name('supplier');
Route::post('col_up', 'adminController@col_up')->name('col_up');


Route::get('delpro/{id}', 'adminController@delpro')->name('delpro');

Route::get('data', function(){ return view('data'); } );
