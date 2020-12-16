<?php

use Illuminate\Support\Facades\Route;
use App\Message;
use App\Notification;

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
Route::post('/searchOnServiceDetail', 'ServiceController@search')->name('service.search');
Route::get('/search_by_city/{city}', 'ServiceController@search_by_city')->name('search_by_city');



Route::post('/buyer/createcomment', 'ServiceController@storeComment')->name('user.message');
Route::get('/buyer/dashboard', 'BuyerController@index')->name('buyer.dashboard');
Route::get('/buyer/profile', 'BuyerController@showProfile')->name('buyer.profile');
Route::get('/buyer/messages', 'BuyerController@showMessages')->name('buyer.messages');
Route::get('services/{id}','CategoryController@show')->name('services');



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

Route::get('frequently-asked-questions','FaqController@get_faq')->name('faq');
Route::get('contact-us','ContactController@contact_us')->name('contact');


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
Route::get('/seller/message/{slug}', 'SellerController@viewMessage')->name('seller.message.view');
Route::get('/seller/message/reply/{slug}', 'SellerController@replyMessage')->name('seller.message.reply');
Route::post('/seller/message/reply/', 'SellerController@storeReplyMessage')->name('seller.message.reply.store');


Route::get('/seller/dashboard/service/active', 'SellerController@activeService')->name('seller.service.active');
Route::get('/seller/dashboard/service/pending', 'SellerController@pendingService')->name('seller.service.pending');
Route::get('/seller/dashboard/service/all', 'SellerController@allService')->name('seller.service.all');
Route::post('/service/store/', 'SellerController@storeService')->name('service.save');

Route::get('/seller/notification/unread', 'SellerController@unreadNotification')->name('seller.notification.unread');
Route::get('/seller/notification/all', 'SellerController@allNotification')->name('seller.notification.all');
Route::get('/seller/notification/{slug}', 'SellerController@viewNotification')->name('seller.notification.view');

Route::get('/seller/profile/', 'SellerController@viewProfile')->name('seller.profile');
Route::post('/seller/profile/{id}', 'AuthController@updateProfile')->name('profile.update');




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

Route::any ( '/search',  'ServiceController@search')->name('search3');
Route::any ( '/search4',  'ServiceController@search3')->name('search4');

//Route::any ( '/searchforuser',  'ServiceController@searchSeller')->name('searchUser');



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

    $unread_notification_count = Notification::where('status', 0)->count();
    $unread_notification = Notification::where('status', 0);
    $check_unread_notification_table = collect($unread_notification)->isEmpty();
    $unread_notification = $check_unread_notification_table == true ? 0 : $unread_notification->orderBy('id', 'desc')->take(5)->get();
   $view->with( compact( 'unread_message_count', 'unread_message', 'unread_notification_count', 'unread_notification') );

});

//Auth::routes();
 