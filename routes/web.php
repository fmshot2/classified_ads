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

Route::get('/', 'ServiceController@index2')->name('home');
Route::get('/serviceDetail/{id}', 'ServiceController@serviceDetail')->name('serviceDetail');
Route::post('/buyer/createcomment', 'ServiceController@storeComment')->name('user.message');
Route::get('/buyer/dashboard', 'BuyerController@index')->name('buyer.dashboard');




// add comment routes
//Route::get('ajaxRequest', [AjaxController::class, 'ajaxRequest']);
//Route::post('ajaxRequest', 'ServiceController@ajaxRequestPost')->name('ajaxRequest.post');

// add comment routes



//add service Routes
Route::get('/createService', 'ServiceController@createService')->name('createService');
Route::post('/storeService', 'ServiceController@storeService')->name('service.store');
Route::get('/catdet/{id}', 'CategoryController@show')->name('catdet');
Route::get('/allCategories/', 'CategoryController@allCategories')->name('allCategories');
Route::get('/categoryDetail/{id}', 'CategoryController@categoryDetail')->name('categoryDetail');
    //dynamic dropdown country and states
Route::get('/admin/user_register/ajax/{state_id}',array('as'=>'user_register.ajax','uses'=>'CategoryController@stateForCountryAjax'));
Route::get('/getlocal_governments/{id}','CategoryController@getlocal_governments');
Route::get('api/get-city-list/{id}','CategoryController@getCityList');
;







Route::get('/register', 'AuthController@showRegister')->name('register');
Route::post('/register', 'AuthController@createUser')->name('register');
Route::get('/login', 'AuthController@showLogin')->name('login');
Route::post('/login', 'AuthController@login')->name('login');
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::get('/refreshcaptcha', 'AuthController@refreshCaptcha')->name('refreshcaptcha');

Route::get('/terms', 'PageController@terms')->name('terms');
Route::get('/privacy', 'PageController@privacy')->name('privacy');

Route::middleware(['auth'])->group(function () {
Route::get('/seller/dashboard', 'DashboardController@seller')->name('seller.dashboard');
Route::get('/seller/service/create', 'ServiceController@create')->name('service.create');
Route::post('/admin/like', 'ServiceController@saveLike')->name('admin.like');

Route::delete('/seller/service/delete/{id}', 'ServiceController@destroy')->name('service.delete');

Route::get('/seller/dashboard', 'DashboardController@adminDashboard')->name('adminDashboard');

});

Route::get('/admin/dashboard', 'DashboardController@admin')->name('admin.dashboard');
Route::post('admin/dashboard/category/show', 'CategoryController@store')->name('admin.category.store');
Route::get('/admin/dashboard/category/show', 'CategoryController@index')->name('admin.category.show');
Route::delete('/admin/category/{id}', 'CategoryController@destroy')->name('admin.category.delete');

Route::get('/admin/dashboard/service/all', 'AdminController@allService')->name('admin.service.all');
Route::get('/admin/dashboard/service/active', 'AdminController@activeService')->name('admin.service.active');
Route::get('/admin/dashboard/service/pending', 'AdminController@pendingService')->name('admin.service.pending');
Route::get('/admin/dashboard/service/pending', 'AdminController@pendingService')->name('admin.service.pending');
Route::patch('/admin/dashboard/service/status/{id}', 'AdminController@updateServiceStatus')->name('admin.service.status');
Route::delete('/admin/dashboard/service/destroy/{id}', 'AdminController@destroy')->name('admin.service.destroy');

Route::get('/admin/dashboard/service/search', 'AdminController@serviceSearch')->name('admin.service.search');
Route::get('/admin/dashboard/user/search', 'AdminController@userSearch')->name('admin.user.search');


Route::get('/admin/dashboard/seller', 'AuthController@seller')->name('admin.seller');
Route::get('/admin/dashboard/buyer', 'AuthController@buyer')->name('admin.buyer');

Route::any ( '/search',  'ServiceController@search3')->name('search3');
//Route::any ( '/searchforuser',  'ServiceController@searchSeller')->name('searchUser');

Route::any ( '/searchOnServiceDetail',  'ServiceController@searchOnServiceDetail')->name('searchOnServiceDetail');


//Views Composer 
View::composer(['layouts.frontend_partials.navbar'], function ($view) {
    $categories = App\Category::all();
   $view->with('categories',$categories);
});



//Auth::routes();
 