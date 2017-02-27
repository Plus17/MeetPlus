<?php

Route::group(['middleware' => ['web', 'auth', 'role:admin']] ,function(){
    Route::get('/', 'AdminController@index')
            ->name('admin.index');
});
