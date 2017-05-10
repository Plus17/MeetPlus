<?php

Route::group(['middleware' => ['web', 'auth', 'role:admin']] ,function(){
    Route::get('/', 'AdminController@index')
            ->name('admin.index');

    Route::get('/users', 'AdminController@indexUsers')
            ->name('admin.users.index');

	 Route::get('/events', 'EventController@indexByAdmin')
            ->name('events.index');

    Route::resource('/events', 'EventController', ['except' => [
    	'index'
	]]);
});
