<?php


Route::group(['middleware' => ['web', 'auth', 'role:user']] ,function(){
    Route::resource('/profile', 'UserController');
    Route::resource('/events', 'EventController');

    Route::post('/event_comment', 'EventCommentController')
            ->name('event.comment.store');
});
