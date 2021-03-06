<?php
 

Route::get('/home', 'School\HomeController@index')->name('home');
Route::get('/setpassword', 'School\HomeController@setpassword')->name('setpassword');  
Route::group(['prefix'=>'profile'], function() { 
    Route::get('/password', [
        'as' => 'profile.password',
        'middleware' => ['school'],
        'uses' => 'School\HomeController@changepassword'
    ]);  
    Route::post('/set_password', [
        'as' => 'profile.set_password',
        'middleware' => ['school'],
        'uses' => 'School\HomeController@savepassword'
    ]);
    Route::post('/update_password', [
        'as' => 'profile.update_password',
        'middleware' => ['school'],
        'uses' => 'School\HomeController@update_password'
    ]);
    Route::get('/details', [
        'as' => 'profile.details',
        'middleware' => ['school'],
        'uses' => 'School\HomeController@details'
    ]);  
});
  
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
    Route::post('/delete/{id}', [
        'as' => 'teacher.delete',
        'middleware' => ['school'],
        'uses' => 'School\EmployeeController@delete'
    ]);
    Route::get('/getfiles', [
        'as' => 'teacher.getfiles',
        'middleware' => ['school'],
        'uses' => 'School\AttendanceController@getfiles'
    ]); 
});