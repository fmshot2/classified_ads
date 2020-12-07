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




Route::get('/home', 'ServiceController@index2')->name('home');
Route::get('/serviceDetail/{id}', 'ServiceController@serviceDetail')->name('serviceDetail');




Route::get('/createService', 'ServiceController@createService')->name('createService');
Route::post('/storeService', 'ServiceController@storeService')->name('service.store');

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
Route::post('/admin/like', 'ServiceController@saveLike')->name('admin.like');

Route::delete('/seller/service/delete/{id}', 'ServiceController@destroy')->name('service.delete');

Route::get('/adminDashboard', 'DashboardController@adminDashboard')->name('adminDashboard');

});

Route::get('/admin/dashboard', 'DashboardController@admin')->name('admin.dashboard');
Route::post('admin/dashboard/category/show', 'CategoryController@store')->name('admin.category.store');
Route::get('/admin/dashboard/category/show', 'CategoryController@create')->name('admin.category.show');

Route::delete('/admin/dashboard/category/', 'CategoryController@destroy')->name('admin.category.destroy');


Route::any ( '/search',  'ServiceController@search3')->name('search3');
Route::any ( '/searchOnServiceDetail',  'ServiceController@searchOnServiceDetail')->name('searchOnServiceDetail');





//Auth::routes();
 