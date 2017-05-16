
<?php

Route::group(['middleware' => ['web', 'auth', 'role:admin']] ,function(){
	Auth::loginUsingId(1);
    Route::get('/', 'AdminController@index')
            ->name('admin.index');

    Route::get('/users', 'AdminController@indexUsers')
            ->name('admin.users.index');

	 Route::get('/events', 'EventController@indexByAdmin')
            ->name('admin.events.index');
});
