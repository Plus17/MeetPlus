<?php

Route::group(['middleware' => ['web', 'auth', 'role:admin']] ,function(){
    Route::get('/', 'AdminController@index')
            ->name('admin.index');

    Route::get('/users', 'AdminController@indexUsers')
            ->name('admin.users.index');
});
