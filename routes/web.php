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

Route::get('/help', function () {
    return view('help');
});

route::get('/customers', 'CustomersController@index');

route::get('/customers/{id}', 'CustomersController@onlyOne');

route::get('/customers/{id}/address', 'CustomersController@onlyOneAndAdress');

route::get('/customers/by-company/{company_id}', 'CustomersController@customersByCompany');

route::resource('/products', 'ProductsController');

route::resource('/groups', 'GroupsController');

Route::get('/klarna', 'KlarnaController@index');

Route::get('/confirmation', 'KlarnaController@confirmation');

Route::get('/klarna-acknowledge', 'KlarnaController@acknowledge');

Route::get('/insta', 'InstaController@index');

Route::get('/twitter/count', 'TwitterController@countWordsInTweets');

Route::post('/twitter/count-words', 'TwitterController@countWordsInTweetsAndSort');

Route::get('/twitter', 'TwitterController@searchTweets');