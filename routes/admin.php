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
 
});
 

