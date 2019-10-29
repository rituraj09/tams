<?php
 

Route::get('/home', 'School\HomeController@index')->name('home');
  
Route::group(['prefix'=>'teacher'], function() { 
    Route::get('/create', [
        'as' => 'teacher.create',
        'middleware' => ['school'],
        'uses' => 'School\EmployeeController@createTeacher'
    ]);  
    Route::post('/save', [
        'as' => 'teacher.save',
        'middleware' => ['school'],
        'uses' => 'School\EmployeeController@saveTeacher'
    ]);
    Route::get('/view_employees', [
        'as' => 'teacher.view',
        'middleware' => ['school'],
        'uses' => 'School\EmployeeController@view_employees'
    ]);  

    Route::post('/import', [
        'as' => 'teacher.import',
        'middleware' => ['school'],
        'uses' => 'School\EmployeeController@import'
    ]);  
});