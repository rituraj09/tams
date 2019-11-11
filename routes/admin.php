<?php
 

Route::get('/home', 'Admin\HomeController@index')->name('home');
 

Route::group(['prefix'=>'school'], function() { 
    Route::get('/create', [
        'as' => 'school.create',
        'middleware' => ['admin'],
        'uses' => 'Admin\SchoolController@createSchool'
    ]); 
    Route::post('/save', [
        'as' => 'school.save',
        'middleware' => ['admin'],
        'uses' => 'Admin\SchoolController@saveSchool'
    ]);
    Route::get('/view', [
        'as' => 'school.view',
        'middleware' => ['admin'],
        'uses' => 'Admin\SchoolController@view_schools'
    ]); 
    Route::get('/edit/{id}', [
        'as' => 'school.edit',
        'middleware' => ['admin'],
        'uses' => 'Admin\SchoolController@edit'
    ]); 
    Route::post('/update/{id}', [
        'as' => 'school.update',
        'middleware' => ['admin'],
        'uses' => 'Admin\SchoolController@update'
    ]);
    Route::get('/password/{id}', [
        'as' => 'school.password',
        'middleware' => ['admin'],
        'uses' => 'Admin\SchoolController@password'
    ]); 
    Route::post('/update_password/{id}', [
        'as' => 'school.update_password',
        'middleware' => ['admin'],
        'uses' => 'Admin\SchoolController@update_password'
    ]);
    Route::post('/delete/{id}', [
        'as' => 'school.delete',
        'middleware' => ['admin'],
        'uses' => 'Admin\SchoolController@delete'
    ]);
     
});
 

