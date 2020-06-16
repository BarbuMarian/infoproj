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

Route::get('/add-to-cart/{id}', [
        'uses' => 'ProductsController@getAddToCart',
        'as' => 'product.addToCart',
]);
Route::get('/shopping-cart', [
        'uses' => 'ProductsController@getCart',
        'as' => 'product.shoppingCart',
]);
Route::get('/checkout', [
        'uses' => 'ProductsController@getCheckout',
        'as' => 'checkout',
]);
Route::post('/checkout', [
        'uses' => 'ProductsController@postCheckout',
        'as' => 'checkout',
]);

Route::get('/reduce{id}', [
        'uses' => 'ProductsController@getReduceByOne',
        'as' => 'product.reduceByOne',
]);
Route::get('/remove{id}', [
        'uses' => 'ProductsController@getRemoveItem',
        'as' => 'product.remove',
]);


Route::group(['middleware' => 'adminMid'], function () {
    Route::get('admin', 'ProductsController@index');
    Route::get('admin/create','ProductsController@create');
    Route::post('admin','ProductsController@store');
    Route::get('/admin/{product}','ProductsController@show');
    Route::get('admin/{product}/edit','ProductsController@edit');
    Route::patch('admin/{product}','ProductsController@update');
    Route::delete('admin/{product}','ProductsController@destroy');

    Route::get('comenzi','ProductsController@getorders');
});
    Route::get('/', 'ProductsController@index');
    Route::get('/guest/{product}', 'ProductsController@show');
    Route::get('/','ProductsController@sort')->name('sorting');



    Route::get('/detaliiprodus.{format}/{id}','ProductsController@formatSingle')->name('single');

    Route::get('/afisareproduse.{format}','ProductsController@formatAll')->name('all');

Route::get('/login', function () {
    return view('admin.logare');
});

Route::post('/logare', 'UsersController@index');
Route::get('/logout', 'UsersController@logOut');
