<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('index');
 
Auth::routes(); 
Route::group(['prefix' => 'admin'], function () {
  Route::get('/login', 'AdminAuth\LoginController@showLoginForm')->name('admin.login');
  Route::post('/login', 'AdminAuth\LoginController@login');
  Route::post('/logout', 'AdminAuth\LoginController@logout')->name('admin.logout');

  Route::get('/register', 'AdminAuth\RegisterController@showRegistrationForm')->name('admin.register');
  Route::post('/register', 'AdminAuth\RegisterController@register');

  Route::post('/password/email', 'AdminAuth\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.request');
  Route::post('/password/reset', 'AdminAuth\ResetPasswordController@reset')->name('admin.password.email');
  Route::get('/password/reset', 'AdminAuth\ForgotPasswordController@showLinkRequestForm')->name('admin.password.reset');
  Route::get('/password/reset/{token}', 'AdminAuth\ResetPasswordController@showResetForm');




});

Route::group(['prefix' => 'school'], function () {
  Route::get('/login', 'SchoolAuth\LoginController@showLoginForm')->name('school.login');
  Route::post('/login', 'SchoolAuth\LoginController@login');
  Route::post('/logout', 'SchoolAuth\LoginController@logout')->name('school.logout');
  //Route::get('/register', 'SchoolAuth\RegisterController@showRegistrationForm')->name('admin.school.register');
 // Route::post('/register', 'SchoolAuth\RegisterController@register');
  Route::post('/password/email', 'SchoolAuth\ForgotPasswordController@sendResetLinkEmail')->name('school.password.request');
  Route::post('/password/reset', 'SchoolAuth\ResetPasswordController@reset')->name('school.password.email');
  Route::get('/password/reset', 'SchoolAuth\ForgotPasswordController@showLinkRequestForm')->name('school.password.reset');
  Route::get('/password/reset/{token}', 'SchoolAuth\ResetPasswordController@showResetForm');
});
