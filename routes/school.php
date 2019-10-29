<?php
 

Route::get('/home', 'School\HomeController@index')->name('home');
  
Route::group(['prefix'=>'teacher'], function() { 
    Route::get('/create', [
        'as' => 'teacher.create',
        'middleware' => ['school'],
        'uses' => 'School\TeacherController@createTeacher'
    ]);  
 
});