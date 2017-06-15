<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'admin','middleware' => 'auth.checkrole', 'as' => 'admin.'], function() {

  Route::group(['as' => 'categories.'], function()
     {
         Route::get('categories', ['as'=>'index' ,'uses'=>'CategoriesController@index']);
         Route::get('categories/create',['as'=>'create' ,'uses'=>'CategoriesController@create']);
         Route::get('categories/edit/{id}',['as'=>'edit' ,'uses'=>'CategoriesController@edit']);
         Route::post('categories/update/{id}',['as'=>'update' ,'uses'=>'CategoriesController@update']);
         Route::post('categories/store',['as'=>'store' ,'uses'=>'CategoriesController@store']);
     });

    Route::group(['as' => 'clients.'], function()
     {
         Route::get('clients', ['as'=>'index' ,'uses'=>'ClientsController@index']);
         Route::get('clients/create',['as'=>'create' ,'uses'=>'ClientsController@create']);
         Route::get('clients/edit/{id}',['as'=>'edit' ,'uses'=>'ClientsController@edit']);
         Route::post('clients/update/{id}',['as'=>'update' ,'uses'=>'ClientsController@update']);
         Route::post('clients/store',['as'=>'store' ,'uses'=>'ClientsController@store']);
     });


  Route::group(['as' => 'products.'], function()
     {
         Route::get('products', ['as'=>'index' ,'uses'=>'ProductsController@index']);
         Route::get('products/create',['as'=>'create' ,'uses'=>'ProductsController@create']);
         Route::get('products/edit/{id}',['as'=>'edit' ,'uses'=>'ProductsController@edit']);
         Route::post('products/update/{id}',['as'=>'update' ,'uses'=>'ProductsController@update']);
         Route::post('products/store',['as'=>'store' ,'uses'=>'ProductsController@store']);
         Route::get('products/destroy/{id}',['as'=>'destroy' ,'uses'=>'ProductsController@destroy']);
     });

  Route::group(['as' => 'orders.'], function()
   {
       Route::get('orders', ['as'=>'index' ,'uses'=>'OrdersController@index']);
       Route::get('orders/edit/{id}',['as'=>'edit' ,'uses'=>'OrdersController@edit']);
       Route::post('orders/update/{id}',['as'=>'update' ,'uses'=>'OrdersController@update']);
   });

  Route::group(['as' => 'cupoms.'], function()
   {
       Route::get('cupoms', ['as'=>'index' ,'uses'=>'CupomsController@index']);
       Route::get('cupoms/create',['as'=>'create' ,'uses'=>'CupomsController@create']);
         Route::post('cupoms/store',['as'=>'store' ,'uses'=>'CupomsController@store']);
       Route::get('cupoms/edit/{id}',['as'=>'edit' ,'uses'=>'CupomsController@edit']);
       Route::post('cupoms/update/{id}',['as'=>'update' ,'uses'=>'CupomsController@update']);
   });

});
  
  Route::group(['prefix' => 'customer', 'as' => 'customer'], function() {
      Route::get('order/create',['as' => 'order.new', 'uses' => 'CheckoutController@create']); 
  });

