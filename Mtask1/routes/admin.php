<?php

Route::group(['prefix'=>'admin', 'namespace'=>'Admin'],function(){
    Config::set('auth.defines','admin');
    route::get('login','AdminAuth@login');
    route::post('login','AdminAuth@loginpost');
    route::get('forgot/password','AdminAuth@forgot_password');
    route::post('forgot/password','AdminAuth@forgot_password_post');
    route::get('reset/password/{token}','AdminAuth@reset_password');
    route::post('reset/password/{token}','AdminAuth@reset_password_final');


Route::group(['middleware'=>'admin:admin'], function(){


    Route::resource('admin','AdminController');
    Route::resource('category','CategoryController');
    Route::resource('news','NewsController');
    
    Route::delete('admin/destroy/all','AdminController@multi_delete');
    Route::delete('category/destroy/all','CategoryController@multi_delete');
    Route::delete('news/destroy/all','NewsController@multi_delete');
    Route::post('upload/image/{id}','NewsController@upload_file');
    Route::post('update/image/{id}','NewsController@update_news_image');
    Route::post('delete/news/image/{id}','NewsController@delete_main_image');
    Route::get('/', function () {
        return view('admin.home');
    });
    
    route::any('logout','AdminAuth@logout');
route::get('setting','Settings@settings');
route::post('setting','Settings@save_settings');



}) ;   
    

});


