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




Route::get('/', 'HomeController@index')->name('home');


//Route::get('/test', 'PageController@test')->name('test');

Route::get('/register', 'AuthController@showRegister')->name('register');
Route::post('/register', 'AuthController@createUser')->name('register');
Route::get('/login', 'AuthController@showLogin')->name('login');
Route::post('/login', 'AuthController@login')->name('login');
Route::get('/logout', 'AuthController@logout')->name('logout');

Route::get('/refreshcaptcha', 'AuthController@refreshCaptcha')->name('refreshcaptcha');


Route::get('/terms', 'PageController@terms')->name('terms');
Route::get('/privacy', 'PageController@privacy')->name('privacy');

Route::get('/seller/dashboard', 'DashboardController@seller')->name('seller.dashboard');
Route::get('/buyer/dashboard', 'DashboardController@buyer')->name('buyer.dashboard');

Route::middleware(['auth'])->group(function () {

Route::post('/seller/dashboard/create', 'ProductController@store')->name('product.create');
Route::get('/seller/dashboard/create', 'ProductController@create')->name('product.show');

});





Auth::routes();
