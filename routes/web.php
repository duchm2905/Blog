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


Route::get('/','LoginController@index')->name('loginView');

Route::post('/','LoginController@index');

Route::get('/logout',[
    'as' => 'logout',
    'uses' => 'LoginController@logout'
]);

Route::group(['namespace' => 'Admin','middleware'=>'authCheck'],function () {

    Route::get('listUser', 'UserController@listUser')->name('listUser');

    Route::get('listUser/getData', 'UserController@userData')->name('listUser.getData');

    Route::get('post/postData',[
        'as' => 'post.postData',
        'uses' => 'PostController@listPostData'
        ]);
    Route::get('post',[
        'as' => 'post.list',
        'uses' => 'PostController@listPost'
    ]);
    Route::get('post/create',[
        'as' => 'post.create',
        'uses' => 'PostController@createPost'
    ]);
    Route::post('post/create',[
        'as' => 'post.create',
        'uses' => 'PostController@store'
    ]);
    Route::post('post/update',[
        'as' => 'post.update',
        'uses' => 'PostController@update'
    ]);
    Route::get('post/{post_id}',[
        'as' => 'post.details',
        'uses' => 'PostController@detailsPost'
    ]);
    Route::get('post/delete/{post_id}',[
        'as' => 'post.delete',
        'uses' => 'PostController@delete'
    ]);
    Route::get('category/getData',[
        'as'=> 'category.getData',
        'uses' => 'CategoryController@getData'
    ]);
    Route::get('category',[
        'as'=> 'category.list',
        'uses' => 'CategoryController@listCategory'
    ]);

});

