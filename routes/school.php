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

    Route::get('/upload', [
        'as' => 'attendance.upload',
        'middleware' => ['school'],
        'uses' => 'School\AttendanceController@upload'
    ]);  
    Route::post('/import', [
        'as' => 'attendance.import',
        'middleware' => ['school'],
        'uses' => 'School\AttendanceController@import'
    ]);  
    Route::post('/savedata', [
        'as' => 'attendance.savedata',
        'middleware' => ['school'],
        'uses' => 'School\AttendanceController@savedata'
    ]);  

    Route::get('/edit/{id}', [
        'as' => 'teacher.edit',
        'middleware' => ['school'],
        'uses' => 'School\EmployeeController@edit'
    ]); 
    Route::post('/update/{id}', [
        'as' => 'teacher.update',
        'middleware' => ['school'],
        'uses' => 'School\EmployeeController@update'
    ]);
});