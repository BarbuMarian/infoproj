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

Route::get('/', function () {
    return view('welcome');
});

/*
Route::get('/page', function () {
    return view('public.master_public');
});
*/
/*
Route::get('/admin', function () {
    return view('admin.master_admin');
});
*/
/*
Route::get('/admin', 'ProductsController@index');
Route::post('/admin','ProductsController@store')->name('addimage');


Route::get('/page', 'ProductsController@show');

Route::get('/contact', function () {
    return 'contact us';
});

Route::get('/layout', function () {
    return view('layout');
});
*/

// de aici incepe admin

Route::view('contact','contact');
//Route::view('about','about');
Route::get('produse', function () {
    return view('admin.produse');
});



Route::get('admin', 'ProductsController@index');
Route::get('admin/create','ProductsController@create');
Route::post('admin','ProductsController@store');
Route::get('/admin/{product}','ProductsController@show');
Route::get('admin/{product}/edit','ProductsController@edit');
Route::patch('admin/{product}','ProductsController@update');
Route::delete('admin/{product}','ProductsController@destroy');
