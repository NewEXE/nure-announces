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

Route::get('/', 'PageController@index')->name('home');

Route::get('/pages/search', 'PageController@search')->name('pages.search');
Route::get('/pages/{alias}', 'PageController@page')->name('pages.page');
Route::resource('/pages', 'PageController');

Route::post('/announces/{announce}/restore', 'AnnounceController@restore')->name('announces.restore');
Route::post('/announces/{announce}', 'AnnounceController@softDelete')->name('announces.softDelete');
Route::resource('/announces', 'AnnounceController');

Auth::routes();

Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function() {
    Route::get('/', ['uses' => 'Admin\AdminController', 'as' => 'admin.index']);

    Route::resource('/users', 'Admin\UserController', ['names'=>'admin.users']);

    Route::resource('/announces', 'Admin\AnnounceController', ['names'=>'admin.announces']);

    Route::resource('/pages', 'Admin\PageController', ['names'=>'admin.pages']);
});
