<?php

use Illuminate\Support\Facades\Route;
use App\Message;

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
Route::get('/seller/service/add', 'SellerController@createService')->name('seller.service.create');

Route::get('/seller/message/unread', 'SellerController@unreadMessage')->name('seller.message.unread');
Route::get('/seller/message/read', 'SellerController@readMessage')->name('seller.message.read');
Route::get('/seller/message/all', 'SellerController@allMessage')->name('seller.message.all');
Route::delete('/seller/message/{id}', 'SellerController@destroyMessage')->name('seller.message.delete');


Route::get('/seller/service/create', 'ServiceController@create')->name('service.create');

Route::post('/admin/like', 'ServiceController@saveLike')->name('admin.like');

Route::delete('/seller/service/delete/{id}', 'ServiceController@destroy')->name('service.delete');
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
View::composer(['layouts.frontend_partials.navbar', ], function ($view) {
    $categories = App\Category::all();
   $view->with('categories',$categories);
});

View::composer(['layouts.seller_partials.navbar', 'layouts.seller_partials.sidebar'], function ($view) {

    $all_message = Message::where('service_user_id', Auth::id() );
    $unread_message =  $all_message->Where('status', 0);
    $check_unread_message_table = collect($unread_message)->isEmpty();
    $unread_message_count = $check_unread_message_table == true ? 0 : $unread_message->count();
    $unread_message = $check_unread_message_table == true ? 0 : $unread_message->orderBy('id', 'desc')->take(5)->get();

   $view->with( compact( 'unread_message_count', 'unread_message') );

});

//Auth::routes();
 