<?php

use Illuminate\Support\Facades\Route;

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




Route::get('/home', 'HomeController@index')->name('home');


//Route::get('/test', 'PageController@test')->name('test');

Route::get('/createService', 'ServiceController@createService')->name('createService');



Route::get('/register', 'AuthController@showRegister')->name('register');
Route::post('/register', 'AuthController@createUser')->name('register');
Route::get('/login', 'AuthController@showLogin')->name('login');
Route::post('/login', 'AuthController@login')->name('login');
Route::get('/logout', 'AuthController@logout')->name('logout');
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::get('/refreshcaptcha', 'AuthController@refreshCaptcha')->name('refreshcaptcha');

Route::get('/terms', 'PageController@terms')->name('terms');
Route::get('/privacy', 'PageController@privacy')->name('privacy');

Route::middleware(['auth'])->group(function () {
Route::get('/seller/dashboard', 'DashboardController@seller')->name('seller.dashboard');
Route::get('/seller/service/create', 'ServiceController@create')->name('service.create');
Route::get('/adminDashboard', 'CategoryController@adminDashboard')->name('adminDashboard');
});







//Auth::routes();
