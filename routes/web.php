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


Route::get('/image', 'CommonController@createImage')->name('image');



Route::group(['prefix' => 'blog'], function(){

    Route::get('/index', 'BlogController@index')->name('blog.index');
    Route::get('/list', 'BlogController@getList')->name('blog.list');
    Route::get('/show', 'BlogController@show')->name('blog.show');
    Route::get('/source', 'BlogController@source')->name('blog.source');
    Route::post('/comment', 'BlogController@comment')->name('blog.comment');
    Route::post('/source', 'BlogController@source')->name('blog.source');

    Route::group(['prefix' => 'label'], function(){
        Route::get('/list', 'LabelController@getList')->name('blog.label,list');
    });


});