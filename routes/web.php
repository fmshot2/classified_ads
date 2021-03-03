<?php

use App\Http\Controllers\OperationalController;
use App\Http\Controllers\ServiceImageController;
use Illuminate\Support\Facades\Route;
use App\Message;
use App\Notification;
use App\Service;

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

//Route::get('referRegister/{slug}',  'AuthController@showRegisterforRefer')->name('referRegister');
//Route::get('referRegister/{slug}', 'AdminController@refer')->name('referRegister');
Route::post('gtPAy', 'BadgeController@gtPAy');
Route::get ( 'findgeo2',  'ServiceController@findNearestRestaurants');
Route::get( '/catpagesortby/{letter}',  'OperationalController@catPageSortBy');
Route::get( '/requestbadge/{id}',  'OperationalController@requestbadge');
Route::post( '/requestbadge/{id}',  'OperationalController@requestbadge')->name('badge.request');
Route::post( '/user-feedback',  'OperationalController@feedbackform')->name('feedback.form');

Route::get('email', function () {
    return new App\Mail\UserRegistered();
});


Route::get('/allfeat', 'OperationalController@getfeatservices');

Route::get('upload', 'ImageController@upload');
Route::post('upload/store', 'ImageController@store');
Route::post('delete', 'ImageController@delete');




Route::post('/subscribe', 'AdminController@subscribe')->name('subscribe');
Route::view('/cities', 'featured_city')->name('allcities');

Route::get('/send/email', 'ServiceController@mail');

Route::get('dropzone/example', 'DropzoneController@dropzoneExample');
Route::post('dropzone/store', 'UserController@dropzoneStore')->name('dropzone.store');

Route::get('dropzone', 'DropzoneController@dropzone');
Route::post('dropzone/store', 'DropzoneController@dropzoneStore')->name('dropzone.store');

Route::get('/', 'ServiceController@index2')->name('home');
Route::get('/serviceDetail/{slug}', 'ServiceController@serviceDetail')->name('serviceDetail');
Route::post('saveContacts', 'ServiceController@saveContacts')->name('saveContacts');
Route::get('/contacts', 'ServiceController@showContacts')->name('contacts');
Route::get('/allservices', 'ServiceController@allServices')->name('allServices');
Route::post('/searchOnServiceDetail', 'ServiceController@search')->name('service.search');
Route::get('/search_by_city/{city}', 'ServiceController@search_by_city')->name('search_by_city');
Route::get('/service-providers', 'ServiceController@allSellers')->name('seller.sellers');
Route::get('/terms-of-use', 'ServiceController@termsOfUse')->name('terms-of-use');
Route::get('/advertisement', 'AdminController@advertisement')->name('advertisement');

Route::post('/store_contact_form', 'ContactController@store_contact_form')->name('store_contact_form');
Route::post('/store_advert_form', 'AdvertController@store_advert_form')->name('store_advert_form');

Route::get('/all-featured-sellers', 'ServiceController@allFeaturedSellers')->name('allSellers');

Route::post('/buyer/createcomment', 'ServiceController@storeComment')->name('user.message');
Route::post('/buyer/createcomment2', 'ServiceController@storeComment2');
Route::get('/buyer/like', 'ServiceController@saveLike2');

Route::post('/buyer/createcomplaint', 'ComplaintController@storeComplaint');

Route::post('/buyer/createbadge', 'ServiceController@createbadge');


Route::get('/buyer/dashboard', 'BuyerController@index')->name('buyer.dashboard');
Route::get('/buyer/profile', 'BuyerController@showProfile')->name('buyer.profile');
Route::get('/buyer/messages', 'BuyerController@showMessages')->name('buyer.messages');
Route::get('services/{slug}','CategoryController@show')->name('services');
Route::get('/services/sub/{slug}','CategoryController@subcategory')->name('services.subcategory');
Route::get('/categoryDetail/{id}', 'CategoryController@categoryDetail')->name('categoryDetail');
Route::get('/catdet/{id}', 'CategoryController@show')->name('catdet');

Route::get('/saveLike2','ServiceController@saveLike2')->name('saveLike2');




//add service Routes
Route::get('/createService', 'ServiceController@createService')->name('createService');
Route::post('/storeService', 'ServiceController@storeService')->name('service.store');

Route::get('/allCategories/', 'CategoryController@allCategories')->name('allCategories');
    //dynamic dropdown country and states
Route::get('/admin/user_register/ajax/{state_id}',array('as'=>'user_register.ajax','uses'=>'CategoryController@stateForCountryAjax'));
Route::get('/getlocal_governments/{id}','CategoryController@getlocal_governments');
Route::get('api/get-city-list/{state_name}','CategoryController@getCityList');
Route::get('api/get-category-list/{state_name}','CategoryController@getCategoryList');

Route::get('api/get-like-list/{id}','ServiceController@getLikeList');

Route::get('frequently-asked-questions','FaqController@get_faq')->name('faq');

Route::get('contact-us','ContactController@contact_us')->name('contact');

/*the next 3 routes are for implementing verify by email. they are working well. thanks.
just add middleware ->middleware(['verified']); to the end to any route to ensure only email verified users can access that.
Auth::routes(['verify' => true]);
Route::get('/email/verify', function () {
    return view('auth.verify');
})->middleware('auth');
Route::get('/home', 'AuthController@loginformail')->name('loginformail');
*/
Route::get('/register', 'AuthController@showRegister')->name('register');
Route::post('/register', 'AuthController@createUser')->name('register');
Route::get('/login', 'AuthController@showLogin')->name('login');
Route::post('/login', 'AuthController@login')->name('login');
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::get('/refreshcaptcha', 'AuthController@refreshCaptcha')->name('refreshcaptcha');

Route::get('/terms', 'PageController@terms')->name('terms');
Route::get('/privacy', 'PageController@privacy')->name('privacy');


Route::get('/admin2/like/{id}', 'ServiceController@saveLike2')->name('admin2.like');

Route::get('/drop', 'ServiceController@dropzone');


Route::post('/admin/like', 'ServiceController@saveLike')->name('admin.like');




Route::get('/provider/service/create', 'ServiceController@create')->name('service.create');
Route::delete('/provider/service/delete/{id}', 'ServiceController@destroy')->name('service.delete');

Route::middleware(['seller'])->group(function () { //Seller Middleware protection start here


    Route::prefix('provider')->group(function ()
    {
        Route::get('/dashboard/make_withdrawal_request/{refer_id}', 'DashboardController@make_withdrawal_request')->name('seller.make_withdrawal_request');

        Route::get('/dashboard', 'DashboardController@seller')->name('seller.dashboard');

        Route::get('/service/add', 'SellerController@createService')->name('seller.service.create');
        Route::get('/service/badges', 'BadgeController@badges')->name('seller.service.badges');
        Route::post('/service/createpay', 'ServiceController@createpay');
        Route::post('/service/createpay4Advert', 'BadgeController@createpay4Advert');
        Route::get('/service/adverts', 'BadgeController@adverts')->name('seller.service.adverts');

        Route::get('/service/{id}', [ServiceImageController::class, 'showService'])->name('seller.service.show.service');
        Route::post('/service/images/store/{id}', [ServiceImageController::class, 'imagesStore'])->name('service.images.store');
        Route::get('/service/images/delete/{id}', [ServiceImageController::class, 'imagesDelete'])->name('service.image.delete');
        Route::get('/service/post_advert', 'SellerController@post_advert')->name('seller.post_advert');

        Route::get('/service/create_service_page', 'ServiceController@create_service_page')->name('create_service_page');
        Route::get('/notification/unread', 'SellerController@unreadNotification')->name('seller.notification.unread');
        Route::get('/notification/all', 'SellerController@allNotification')->name('seller.notification.all');
        Route::get('/notification/{slug}', 'SellerController@viewNotification')->name('seller.notification.view');

        Route::get('/profile/', 'SellerController@viewProfile')->name('seller.profile');


        Route::get('/message/unread', 'SellerController@unreadMessage')->name('seller.message.unread');
        Route::get('/message/read', 'SellerController@readMessage')->name('seller.message.read');
        Route::get('/message/all', 'SellerController@allMessage')->name('seller.message.all');
        Route::delete('/message/{id}', 'SellerController@destroyMessage')->name('seller.message.delete');
        Route::get('/message/{slug}', 'SellerController@viewMessage')->name('seller.message.view');
        Route::get('/message/reply/{slug}', 'SellerController@replyMessage')->name('seller.message.reply');
        Route::post('/message/reply/', 'SellerController@storeReplyMessage')->name('seller.message.reply.store');

        Route::get('/dashboard/service/active', 'SellerController@activeService')->name('seller.service.active');
        Route::get('/dashboard/service/pending', 'SellerController@pendingService')->name('seller.service.pending');
        Route::get('/dashboard/service/all', 'SellerController@allService')->name('seller.service.all');

        Route::get('/dashboard/service/view/{slug}', 'SellerController@viewService')->name('service.view');
        Route::get('/dashboard/service/update/{slug}', 'SellerController@viewServiceUpdate')->name('service.update.view');

    });



    Route::post('/service/store/', 'SellerController@storeService')->name('service.save');
    Route::post('dropzone/store', 'SellerController@service_save_image');
    Route::post('/service/{id}', 'SellerController@storeServiceUpdate')->name('service.update');
    Route::post('/service/{updateImage}', 'SellerController@updateImage')->name('service.updateImage');


    Route::get('/service/{id}', 'SellerController@destroy')->name('seller.service.destroy');


    Route::any ( '/save/service/Badge',  'BadgeController@saveService4Badge')->name('saveService4Badge');

    Route::any ( '/save/service/Advert',  'BadgeController@saveService4Advert')->name('saveService4Advert');

}); //Seller Middleware protection start here

Route::middleware(['auth'])->group(function () { //Auth Middleware protection start here

    Route::get('/buyer/dashboard', 'DashboardController@buyer')->name('buyer.dashboard');
    Route::get('/buyer/dashboard/service/all', 'BuyerController@allService')->name('buyer.service.all');
    Route::get('/buyer/message/unread', 'BuyerController@unreadMessage')->name('buyer.message.unread');
    Route::get('/buyer/message/read', 'BuyerController@readMessage')->name('buyer.message.read');
    Route::get('/buyer/message/all', 'BuyerController@allMessage')->name('buyer.message.all');
    Route::get('/buyer/notification/all', 'BuyerController@allNotification')->name('buyer.notification.all');
    Route::get('/buyer/profile/', 'BuyerController@viewProfile')->name('buyer.profile');

    Route::get('/buyer/message/{slug}', 'BuyerController@viewMessage')->name('buyer.message.view');
    Route::get('/buyer/message/reply/{slug}', 'BuyerController@replyMessage')->name('buyer.message.reply');
    Route::post('/buyer/message/reply/', 'BuyerController@storeReplyMessage')->name('buyer.message.reply.store');

    Route::post('/profile/{id}', 'AuthController@updateProfile')->name('profile.update');
    Route::post('/profile/update/{id}', 'AuthController@updatePassword')->name('profile.update.password');



}); //Auth Middleware protection end here


Route::middleware(['admin'])->group(function () { //Admin Middleware protection start here
    Route::get('/admin/dashboard/approve_withdrawal_request/{id}', 'DashboardController@approve_withdrawal_request')->name('admin.approve_withdrawal_request');

    Route::get('/admin/dashboard', 'DashboardController@admin')->name('admin.dashboard');
    Route::get('/admin/dashboard/category/show', 'CategoryController@index')->name('admin.category.show');
    Route::post('admin/dashboard/category/show', 'CategoryController@store')->name('admin.category.store');
    Route::get('/admin/category/{id}', 'CategoryController@destroy')->name('admin.category.delete');
    Route::get('/admin/dashboard/single/category/{id}', 'CategoryController@categoryShow')->name('admin.single.category.show');
    Route::put('/admin/dashboard/single/category/{id}', 'CategoryController@categoryUpdate')->name('admin.single.category.update');


    Route::get('/admin/dashboard/subcategory/show', 'CategoryController@subcategoryIndex')->name('admin.subcategory.show');
    Route::get('/admin/subcategory/{id}', 'CategoryController@subCatDestroy')->name('admin.subcategory.delete');
    Route::post('admin/dashboard/subcategory/create', 'CategoryController@createSubCategory')->name('admin.subcategory.store');
    Route::get('/admin/dashboard/single/subcategory/{id}', 'CategoryController@subCategoryShow')->name('admin.single.subcategory.show');
    Route::put('/admin/dashboard/single/subcategory/{id}', 'CategoryController@subCategoryUpdate')->name('admin.single.subcategory.update');

    Route::get('/admin/dashboard/service/all', 'AdminController@allService')->name('admin.service.all');
    Route::get('/admin/dashboard/service/active', 'AdminController@activeService')->name('admin.service.active');
    Route::get('/admin/dashboard/service/pending', 'AdminController@pendingService')->name('admin.service.pending');
    Route::get('/admin/dashboard/service/pending', 'AdminController@pendingService')->name('admin.service.pending');
    Route::get('/admin/dashboard/service/status/{id}', 'AdminController@updateServiceStatus')->name('admin.service.status');
    Route::get('/admin/dashboard/service/destroy/{id}', 'AdminController@destroy')->name('admin.service.destroy');
    Route::get('admin/dashboard/service/view/{slug}', 'AdminController@viewService')->name('admin.view');


    Route::get('/admin/dashboard/service/search', 'AdminController@serviceSearch')->name('admin.service.search');
    Route::get('/admin/dashboard/user/search', 'AdminController@userSearch')->name('admin.user.search');


    Route::get('/admin/dashboard/service-providers', 'AuthController@seller')->name('admin.seller');
    Route::get('/admin/dashboard/service-seekers', 'AuthController@buyer')->name('admin.buyer');
    Route::get('/activate_user/{id}', 'AdminController@activate_user')->name('admin.activate');

    Route::get('/admin/profile/', 'AdminController@viewProfile')->name('admin.profile');

    Route::get('/admin/notification/all', 'AdminController@allNotification')->name('admin.notification.all');
    Route::post('/admin/notification/send', 'AdminController@sendNotification')->name('admin.notification.send');

    Route::get('/admin/system/config', 'AdminController@systemConfig')->name('system.config');


    Route::post('/admin/system/{id}', 'AdminController@storeSystemConfig')->name('system.config.store');

    Route::get('/admin/pages/faq', 'AdminController@FAQs')->name('admin.pages.faq');
    Route::get('/admin/badge/requests', 'AdminController@allBadges')->name('badge.request');
    Route::get('/admin/seller/saveBadge/', 'AdminController@saveBadge')->name('save.badge');
    Route::get('/admin/privacy-policy/', 'AdminController@privacyPolicy')->name('admin.privacy.policy');
    Route::post('/admin/save_privacy_policy/', 'AdminController@save_privacyPolicy')->name('admin.save_privacyPolicy');
    Route::get('/admin/terms-of-use/', 'AdminController@termsOfUse')->name('admin.termsOfUse');
    Route::post('/admin/save_terms_of_use/', 'AdminController@save_termsOfUse')->name('admin.save_termsOfUse');
    Route::post('/admin/save_faq/', 'AdminController@save_faq')->name('admin.save_faq');
    Route::get('/admin/save_faq/', 'AdminController@show_faq')->name('admin.show_faq');
    Route::get('/admin/delete/faqs/{id}', 'AdminController@delete_faqs')->name('admin.delete_faqs');

    // Banner Sliders
    Route::get('/admin/sliders', 'AdminController@sliders')->name('admin.sliders');
    Route::get('/admin/slider/{id}', 'AdminController@slider')->name('admin.slider');
    Route::post('/admin/save_slider/', 'AdminController@save_slider')->name('admin.save_slider');
    Route::put('/admin/update/slider/{id}', 'OperationalController@sliderUpdate')->name('admin.update.slider');
    Route::get('/admin/delete/sliders/{id}', 'AdminController@delete_sliders')->name('admin.delete_sliders');

    // Advertisement
    // Route::get('/admin/sliders', 'AdminController@sliders')->name('admin.sliders');
    Route::get('/admin/sponsored/slider/{id}', 'OperationalController@get_advert_slider')->name('admin.advert.slider');
    Route::post('/admin/advert/save_slider/', 'OperationalController@create_advert_sliders')->name('admin.advert.save_slider');
    Route::put('/admin/advert/update_slider/{id}', 'OperationalController@update_advert_sliders')->name('admin.advert.update_slider');
    Route::get('/admin/delete/sponsored/{id}', 'OperationalController@delete_advert_slider')->name('admin.advert.delete_sliders');

    Route::get('/admin/pending_advert_requests', 'AdminController@pending_advert_requests')
    ->name('pending_advert_requests');
    Route::get('/admin/treated_advert_requests', 'AdminController@treated_advert_requests')
    ->name('treated_advert_requests');
    Route::get('/admin/active_adverts', 'AdminController@active_adverts')
    ->name('active_adverts');
    Route::get('all_events', 'AdminController@all_events')->name('event2');

    Route::get('/admin/events', 'AdminController@events')
    ->name('events');
    Route::post('/admin/save_event/', 'AdminController@save_event')->name('admin.save_event');





    Route::get('seller/service/badges/badger','BadgeController@getBadgeList')->name('fff');
    ///seller/service/admin/get-badge-list/2 404 (Not Found)

    Route::get('admin/usersfeedback','AdminController@usersfeedback')->name('admin.users.feedback');



}); //Admin Middleware protection end here



Route::post ( '/searchonservices',  'ServiceController@searchonservices')->name('searchonservices');

// Route::get ( '/searchresults',  'ServiceController@search')->name('search3');
Route::get ( '/searchresults',  'ServiceController@search3')->name('search3');




Route::get ('getlat', function()
  {

$data = file_get_contents("https://geolocation-db.com/json");
$json = json_decode($data, true);
$latitude = $json['latitude'];
$longitude = $json['longitude'];
      return response()->json(['success'=>'updated done', 'latitude'=>$latitude, 'longitude'=>$longitude]);
  }

);

Route::get ( 'geolo',  'AdminController@geo')->name('geolo');

Route::get ( 'findgeo',  'ServiceController@findNearestServices');
Route::get ( 'findLat2',  'ServiceController@findNearestServices2');

Route::get ( 'findLat',  'AdminController@findNearestRestaurants');



// Route::get ('getgeo',   function ($latitude, $longitude, $radius = 400)
// {

//     $restaurants = Restaurant::selectRaw("id, name, address, latitude, longitude, rating, zone ,
//                      ( 6371000 * acos( cos( radians(?) ) *
//                        cos( radians( latitude ) )
//                        * cos( radians( longitude ) - radians(?)
//                        ) + sin( radians(?) ) *
//                        sin( radians( latitude ) ) )
//                      ) AS distance", [$latitude, $longitude, $latitude])
//         ->where('active', '=', 1)
//         ->having("distance", "<", $radius)
//         ->orderBy("distance",'asc')
//         ->offset(0)
//         ->limit(20)
//         ->get();

//     return $restaurants;
// })




//Views Composer
View::composer(['layouts.frontend_partials.navbar', 'layouts.frontend_partials.footer' ], function ($view) {
    $categories = App\Category::all();
    $service = Service::take(3)->get();
   $view->with( compact('categories', 'service') );
});

View::composer(['layouts.seller_partials.navbar', 'layouts.seller_partials.sidebar', 'layouts.backend_partials.navbar', 'layouts.backend_partials.sidebar'], function ($view) {
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


View::composer(['layouts.buyer_partials.navbar', 'layouts.buyer_partials.sidebar'], function ($view) {
    $reply_message = Message::where('reply', 'yes' );

    $all_message = $reply_message->Where('buyer_id', Auth::id() );
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



Route::post('/slider/create', [OperationalController::class, 'sliderCreate'])->name('slider.create');
