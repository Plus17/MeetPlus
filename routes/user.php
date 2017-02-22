<?php


Route::group(['middleware' => ['web', 'auth', 'role:user']] ,function(){
    Route::resource('/profile', 'UserController');
    Route::resource('/events', 'EventController');
});
