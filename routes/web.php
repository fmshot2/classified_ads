<?php

use App\Http\Controllers\OperationalController;
use App\Http\Controllers\ServiceImageController;
// use App\Http\Controllers\SubscriptionController;

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
// Route::get('referRegister/{slug}', 'AdminController@refer')->name('referRegister');
Route::get('ajaxSearchResult/{slug}', 'OperationalController@ajaxSearchResult');
// Route::get('getMobileSubCategory/{slug}', 'OperationalController@getMobileSubCategory');

//Agent Middleware starts here
Route::post('create_user', 'AuthController@create_user');
Route::post('create_agent', 'AuthController@create_agent');
Route::post('/agent_profile/{id}', 'AuthController@update_Profile_4_agent')->name('agent.profile.update');



Route::get('/agent/agent_Complete_Reg', 'AuthController@agent_Complete_Reg_page')->name('agent_Complete_Reg_mail');
Route::post('/agent/agent_Complete_Reg_payment', 'AuthController@agent_save_complete_reg')->name('agent_Complete_Reg');


//  Last point of Agent Reg. This involves no payment
Route::post('/agent/agent_Complete_Reg_none', 'OldCodeController@agent_save_complete_reg')->name('agent_Complete_Reg2');



Route::get('get-tourist-sites/{state}', 'OperationalController@getTouristSites')->name('gettouristsites');
Route::get('ajax/search/', 'OperationalController@ajaxSearchResult')->name('ajax.search.result');
Route::get('dapo/search/', 'OperationalController@dapSearch')->name('dap.search');


// Route::middleware(['auth:agent'])->group(function () {

    Route::get('/agent/dashboard', 'AgentController@agentDashboard')->name('agent.dashboard');
    Route::get('/agent/referal/all', 'AgentController@allReferals')->name('agent.referal.all');
    Route::get('/agent/profile/', 'AgentController@viewProfile')->name('agent.profile');
    Route::get('/agent/notification/all', 'AgentController@allNotifications')->name('agent.notification.all');
    Route::get('/agent/notification/{slug}', 'AgentController@viewNotification')->name('agent.notification.view');
    Route::get('/agent/make-request-for-payment', 'AgentController@viewBlade')->name('agent.view.request.blade');
    Route::post('/agent/submit-withdrawal-request', 'AgentController@agentRequest')->name('agent.make.request');
    Route::get('/agent/payment-history', 'AgentController@paymentHistory')->name('agent.payment.history');

// });
//Agent Middleware ends here

//Accountant Middleware starts here
Route::middleware(['accountant'])->group(function() {
    Route::get('/accountant', 'AccountantController@accountantDashboard')->name('accountant.dashboard');
    Route::get('/accountant/all-payments', 'AccountantController@allPayments')->name('accountant.all.payments');
    Route::get('/accountant/successful-payments', 'AccountantController@successfulPayments')->name('accountant.successful.payments');
    Route::get('/accountant/unsuccessful-payments', 'AccountantController@unsuccessfulPayments')->name('accountant.unsuccessful.payments');
    Route::get('/accountant/all-referrals', 'AccountantController@allReferrals')->name('accountant.all.referrals');
    Route::get('/accountant/successful-referrals', 'AccountantController@successfulReferrals')->name('accountant.successful.referrals');
    Route::get('/accountant/unpaid-referrals', 'AccountantController@unsuccessfulReferrals')->name('accountant.unsuccessful.referrals');
    Route::get('/accountant/profile', 'AccountantController@accountantProfile')->name('accountant.profile');

    Route::get('/accountant/advertisements', 'AccountantController@adRequests')->name('accountant.ad.requests');
    Route::post('/accountant/save-ad', 'AdvertPaymentController@save_ad')->name('accountant.save.ad');
    Route::post('/accountant/update-ad/{id}', 'AdvertPaymentController@update_ad')->name('accountant.update.ad');
    Route::get('/accountant/badge-requests', 'AccountantController@badgeRequests')->name('accountant.badges');

    Route::post('/accountant/make-payment/{id}', 'AccountantController@makePayment')->name('make_payment');
    Route::post('/accountant/pay-due/{id}', 'AccountantController@makePayment1')->name('pay.due');
    Route::post('/accountant/pay-agent-due/{id}', 'AccountantController@makePayment2')->name('pay.agent.due');
    Route::get('/accountant/view-payment/{id}', 'AccountantController@viewPayment')->name('accountant.view.payment');
    // Route::get('/accountant/print/{id}', 'AccountantController@printHistory')->name('print.history');

    Route::get('/accountant/pending-agent-payments', 'AccountantController@pendingPayments')->name('accountant.pending.agent.payments');
    Route::get('/accountant/successful-agent-payments', 'AccountantController@paidPayments')->name('accountant.paid.agent.payments');
    Route::get('/accountant/all-agent-payments', 'AccountantController@allPayments')->name('accountant.all.agent.payments');

    //get seller due payments
    Route::get('/accountant/seller-due-payments', 'AccountantController@viewDuePayments')->name('accountant.all.due.payments');
    Route::get('/accountant/seller-settled-payments', 'AccountantController@settledPayments')->name('accountant.settled.payments');

    Route::get('/accountant/agent-due-payments', 'AccountantController@agentDuePayments')->name('accountant.agent.due.payments');
    Route::get('/accountant/agent-settled-payments', 'AccountantController@agentSettledPayments')->name('accountant.agent.settled.payments');

    Route::post('/accountant/generate-payment', 'AccountantController@generatePayment')->name('accountant.generate.payment');
    Route::post('/accountant/generate-seller-payment', 'AccountantController@generateSellerPayment')->name('accountant.generate.seller.payment');
});
//Accountant Middleware ends here


Route::post('api/logintestPayment', 'AuthController@logintestPayment');

Route::post('advertisement/create', 'OperationalController@advertCreate')->name('advertisement.create');
Route::get('referral-program/', 'OperationalController@referralprogram')->name('referralprogram');
Route::get('about-us/', 'OperationalController@aboutus')->name('aboutus');

Route::get('test_new_badge', 'BadgeController@test_new_badge');

Route::post('gtPAy', 'BadgeController@gtPAy');
Route::post('gtPAyForRegistration', 'AuthController@gtPAyForRegistration')->name('gtPAyForRegistration');

Route::get ( 'findgeo2',  'ServiceController@findNearestRestaurants');
Route::get( '/catpagesortby/{letter}',  'OperationalController@catPageSortBy');
Route::get( '/requestbadge/{id}',  'BadgeController@requestbadge');
Route::post( '/requestbadge/{id}',  'BadgeController@requestbadge')->name('badge.request');

Route::get( '/requestsubscription/{id}',  'SubscriptionController@requestsubscription');

Route::post( '/user-feedback',  'OperationalController@feedbackform')->name('feedback.form');

Route::get('/benefits-of-efcontact','OperationalController@get_benefits_of_efcontact')->name('benefits-of-efcontact');

// Route::get('email', function () {
//     return new App\Mail\UserRegistered();
// });


Route::get('/allfeat', 'OperationalController@getfeatservices');

Route::get('upload', 'ImageController@upload');
Route::post('upload/store', 'ImageController@store');
Route::post('delete', 'ImageController@delete');




Route::post('/subscribe', 'AdminController@subscribe')->name('subscribe');
Route::view('/tourist-sites-in-nigeria', 'featured_city')->name('allcities');
Route::get('/house-of-assembly', 'GovernmentOfficialController@index')->name('government.officials');

Route::get('/send/email', 'ServiceController@mail');

Route::get('dropzone/example', 'DropzoneController@dropzoneExample');
Route::post('dropzone/store', 'UserController@dropzoneStore')->name('dropzone.store');

Route::get('dropzone', 'DropzoneController@dropzone');
Route::post('dropzone/store', 'DropzoneController@dropzoneStore')->name('dropzone.store');

Route::get('/', 'ServiceController@index2')->name('home');
Route::get('/serviceDetail/{slug}', 'ServiceController@serviceDetail')->name('serviceDetail');
Route::get('job-applicant/details/{slug}', 'OperationalController@seekingWorkDetails')->name('job.applicant.detail');
Route::post('saveContacts', 'ServiceController@saveContacts')->name('saveContacts');
Route::get('/contacts', 'ServiceController@showContacts')->name('contacts');
Route::get('/allservices', 'ServiceController@allServices')->name('allServices');
Route::post('/searchOnServiceDetail', 'ServiceController@search')->name('service.search');
Route::get('/search_by_city/{city}', 'ServiceController@search_by_city')->name('search_by_city');
Route::get('/service-providers', 'ServiceController@allSellers')->name('seller.sellers');
Route::get('/terms-of-use', 'ServiceController@termsOfUse')->name('terms-of-use');
Route::get('/privacy-policy', 'OperationalController@privacypolicy')->name('privacy-policy');
Route::get('/advertisement', 'OperationalController@advertisement')->name('advertisement');

Route::post('/store_contact_form', 'ContactController@store_contact_form')->name('store_contact_form');
Route::post('/store_advert_form', 'AdvertController@store_advert_form')->name('store_advert_form');
Route::post('/store_advert_request_form', 'AdvertRequestsFormController@store_advert_request_form')->name('store_advert_request_form');

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

Route::get('payment-request', 'PaymentRequestController@getBuyerPage')->name('buyer.make.request');
Route::post('submit-request', 'PaymentRequestController@submitRequest')->name('buyer.submit.payemnt.request');
Route::get('/buyer/payment-history', 'PaymentRequestController@buyerPaymentHistory')->name('buyer.payment.history');
Route::get('/delete-history/{id}', 'PaymentRequestController@deleteHistory')->name('history.delete');
//add service Routes
Route::get('/createService', 'ServiceController@createService')->name('createService');
Route::post('/storeService', 'ServiceController@storeService')->name('service.store');

Route::get('/allCategories/', 'CategoryController@allCategories')->name('allCategories');
    //dynamic dropdown country and states
Route::get('/admin/user_register/ajax/{state_id}',array('as'=>'user_register.ajax','uses'=>'CategoryController@stateForCountryAjax'));
Route::get('/getlocal_governments/{id}','CategoryController@getlocal_governments');
Route::get('api/get-city-list/{state_name}','CategoryController@getCityList');
Route::get('api/get-category-list/{state_name}','CategoryController@getCategoryList');

Route::get('api/get-subcategory-list/{category_slug}','CategoryController@getSubCategoryList');
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
App\Http\Controllers\Auth\ForgotPasswordController@sendResetLinkEmail
*/
Route::post('/createUser2', 'OldCodeController@createUser2')->name('createUser2');

Route::get('/register', 'AuthController@showRegister')->name('register');
Route::get('/group-register', 'AuthController@showGroupRegister')->name('register');
Route::post('/register2', 'AuthController@createUser')->name('register2');
//original payment and registration with gtpay
Route::post('/register', 'AuthController@pay_with_gtpay')->name('register');
//end original payment and registration with gtpay

Route::post('/password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::post('/password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');
Route::get('/password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::get('/password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');

Route::post('/agent/register', 'AuthController@createAgent')->name('agent.register');
Route::post('/agent/register2', 'OldCodeController@createAgent')->name('agent.register2');

Route::get('/login', 'AuthController@showLogin')->name('login');
Route::post('/login', 'AuthController@login')->name('login');

Route::get('/agent_Login', 'AuthController@show_agent_Login')->name('show_agent_Login');
Route::post('/agent_Login', 'AuthController@agent_login')->name('show_agent_Login');


Route::post('/logout', 'Auth\LoginController@logout')->name('logout');
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::get('/refreshcaptcha', 'AuthController@refreshCaptcha')->name('refreshcaptcha');

Route::get('/terms', 'PageController@terms')->name('terms');


Route::get('/admin2/like/{id}', 'ServiceController@saveLike2')->name('admin2.like');

Route::get('/drop', 'ServiceController@dropzone');


Route::post('/admin/like', 'ServiceController@saveLike')->name('admin.like');




Route::get('/provider/service/create', 'ServiceController@create')->name('service.create');
Route::delete('/provider/service/delete/{id}', 'ServiceController@destroy')->name('service.delete');

Route::middleware(['seller'])->group(function () { //Seller Middleware protection start here


    Route::prefix('provider')->group(function ()
    {
        Route::get('/dashboard/make_withdrawal_request/{refer_id}', 'DashboardController@make_withdrawal_request')->name('seller.make_withdrawal_request');
        Route::get('/serviceDetail/{slug}', 'ServiceController@serviceDetail')->name('service_detail_4_provider');
        Route::get('/job-applicant/details/{slug}', 'OperationalController@seekingWorkPreviewDetails')->name('job.applicant.preview.detail');


        Route::get('/dashboard', 'DashboardController@seller')->name('seller.dashboard');

        Route::get('/dashboard/sub/all', 'SubscriptionController@allSub')->name('seller.sub.all');
        Route::get('/sub/add', 'SubscriptionController@createSub')->name('seller.sub.create');
        Route::post('/service/create_sub', 'SubscriptionController@createSubpay')->name('createSubpay');


        Route::get('/service/add', 'SellerController@createService')->name('seller.service.create');
        Route::get('/service/badges', 'BadgeController@badges')->name('seller.service.badges');
        Route::post('/service/createpay', 'BadgeController@createBadgepay')->name('createpaystack');
        Route::post('/service/create_pay_featured', 'BadgeController@create_pay_featured')->name('create_pay_featured');

        Route::post('/service/createpay', 'AuthController@createPaystackpay')->name('createpaypaystack2');

        Route::post('/service/createpay4Advert', 'BadgeController@createpay4Advert');
        Route::get('/service/adverts', 'BadgeController@adverts')->name('seller.service.adverts');

        Route::get('/service/{slug}', [ServiceImageController::class, 'showService'])->name('seller.service.show.service');
        Route::get('/seekingwork/{slug}', [OperationalController::class, 'showCV'])->name('seller.show.cv');
        Route::post('/service/images/store/{id}', [ServiceImageController::class, 'imagesStore'])->name('service.images.store');
        Route::post('/seekingwork/images/store/{id}', [OperationalController::class, 'imagesSeekingWorkStore'])->name('seekingwork.images.store');
        Route::get('/service/images/delete/{id}', [ServiceImageController::class, 'imagesDelete'])->name('service.image.delete');
        Route::get('/seekingwork/images/delete/{seekingworkid}/{id}', [OperationalController::class, 'imagesDelete'])->name('seekingwork.image.delete');
        Route::get('/service/post_advert', 'SellerController@post_advert')->name('seller.post_advert');

        Route::get('/service/create_service_page', 'ServiceController@create_service_page')->name('create_service_page');
        Route::get('/notification/unread', 'SellerController@unreadNotification')->name('seller.notification.unread');
        Route::get('/notification/all', 'SellerController@allNotification')->name('seller.notification.all');
        Route::get('/notification/{slug}', 'SellerController@viewNotification')->name('seller.notification.view');
        Route::get('/notifications/markallasread', 'NotificationController@notificationMarkAsAllRead')->name('seller.notification.markallasread');

        Route::get('/profile/', 'SellerController@viewProfile')->name('seller.profile');
        // Route::post('/profile/update/{id}', 'AuthController@updatePassword')->name('profile.update.password');



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


        Route::get('my-referrals/', 'SellerController@myreferrals')->name('provider.myreferrals');
        Route::get('client-feedbacks/', 'OperationalController@clientfeedbacks')->name('provider.clientfeedbacks.all');
        Route::get('totalservicelikes/', 'OperationalController@sellerLikesCount')->name('provider.totalservicelikes');
        Route::get('my-favourites/', 'OperationalController@myFavourites')->name('provider.myfavourites');

        Route::get('make-payment-request', 'SellerController@getSellerPage')->name('seller.make.request');
        Route::post('submit-payment-request', 'PaymentRequestController@submitRequest')->name('seller.submit.payemnt.request');
        Route::get('payment-history', 'SellerController@PaymentHistory')->name('seller.payment.history');

        Route::post('seeking-work/create', 'OperationalController@seekingWorkCreate')->name('provider.seeking.work.create');
        // Route::get('payment-history', 'SellerController@PaymentHistory')->name('seller.payment.history');


        Route::post('badge_paid_for/', 'OperationalController@paidForBadge')->name('provider.paid.for.badge');

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
        Route::post('/profile/update/{id}', 'AuthController@update_Password_4_Agent')->name('profile.updateAgent.password');

    Route::post('/profile/update/account/{id}', 'AuthController@updateAccount')->name('profile.update.account');



});
//Auth Middleware protection end here


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


        Route::get('/admin/dashboard/subscription/all', 'AdminController@allSubscription')->name('admin.subscription.all');



    Route::get('/admin/dashboard/service/search', 'AdminController@serviceSearch')->name('admin.service.search');
    Route::get('/admin/dashboard/user/search', 'AdminController@userSearch')->name('admin.user.search');


    Route::get('/admin/dashboard/service-providers', 'AuthController@seller')->name('admin.seller');
    Route::get('/admin/dashboard/all-agents', 'AuthController@allagents')->name('admin.allagents');
    Route::get('/admin/dashboard/service-seekers', 'AuthController@buyer')->name('admin.buyer');
    Route::get('/activate_user/{id}', 'AdminController@activate_user')->name('admin.activate');
    Route::get('/activate_agent/{id}', 'AdminController@activate_agent')->name('admin.activate.agent');

    Route::get('/admin/profile/', 'AdminController@viewProfile')->name('admin.profile');

    Route::get('/admin/notification/all', 'AdminController@allNotification')->name('admin.notification.all');
    Route::post('/admin/notification/general/send', 'NotificationController@GeneralNofications')->name('admin.notification.general.send');
    Route::post('/admin/notification/send', 'AdminController@sendNotification')->name('admin.notification.send');
    Route::get('/admin/notification/markallasread', 'NotificationController@notificationMarkAsAllRead')->name('admin.notification.markallasread');

    Route::get('/admin/system/config', 'AdminController@systemConfig')->name('system.config');
    Route::post('/profile/update/{id}', 'AuthController@updatePassword')->name('profile.update.password');

    Route::post('/admin/system/{id}', 'AdminController@storeSystemConfig')->name('system.config.store');

    Route::get('/admin/pages/faq', 'AdminController@FAQs')->name('admin.pages.faq');
    Route::get('/admin/badge/requests', 'AdminController@allBadges')->name('badge.request');
    Route::get('/admin/seller/saveBadge/', 'AdminController@saveBadge')->name('save.badge');
    Route::get('/admin/privacy-policy/', 'AdminController@privacyPolicy')->name('admin.privacy.policy');
    Route::post('/admin/save_privacy_policy/', 'AdminController@save_privacyPolicy')->name('admin.save_privacyPolicy');
    Route::get('/privacy', 'AdminController@privacy')->name('privacy');

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

    //Tourism
    Route::get('/admin/tourist-sites', 'TourismController@cities')->name('admin.cities');
    Route::get('/admin/city/{slug}', 'TourismController@city')->name('admin.city');
    Route::post('/admin/save-city', 'TourismController@save_city')->name('admin.save_city');
    Route::put('/admin/update-city/{slug}', 'TourismController@update_city')->name('admin.update.city');
    Route::put('/admin/add_city_images/{slug}', 'TourismController@add_city_images')->name('admin.add_city_images');
    Route::get('/admin/delete-city/{slug}', 'TourismController@deleteCity')->name('admin.delete.city');

    // Government Officials
    Route::get('/admin/government-officials', 'GovernmentOfficialController@officials')->name('admin.government.officials');
    Route::post('/admin/official/create', 'GovernmentOfficialController@create_official')->name('admin.government.create');
    Route::get('/admin/official/delete/{id}', 'GovernmentOfficialController@delete_official')->name('admin.delete.official');

    //add admin
    Route::get('add-admin', 'AdminController@add_admin')->name('admin.add.admin');
    Route::post('submit-admin', 'AdminController@submit_admin')->name('admin.submit.admin');
    Route::get('all-admins', 'AdminController@allAdmins')->name('admin.all.admins');

     //add cmo
    Route::get('add-cmo', 'AdminController@add_cmo')->name('admin.add.cmo');
    Route::post('submit-cmo', 'AdminController@submit_cmo')->name('admin.submit.cmo');
    Route::get('all-cmos', 'AdminController@allCmos')->name('admin.all.cmos');

    //add data entry officer
    Route::get('add-data-entry', 'AdminController@add_data')->name('admin.add.data');
    Route::post('submit-data', 'AdminController@submit_data')->name('admin.submit.data');
    Route::get('all-data-entry-officers', 'AdminController@allData')->name('admin.all.data');

    //add accountant
    Route::get('/admin/add-accountant', 'AccountantController@add_accountant')->name('add-accountant');
    Route::post('/admin/submit-accountant', 'AccountantController@submit_accountant')->name('submit_accountant');

    // Advertisement
    // Route::get('/admin/sliders', 'AdminController@sliders')->name('admin.sliders');
    Route::get('/admin/sponsored/slider/{id}', 'OperationalController@get_advert_slider')->name('admin.advert.slider');
    Route::post('/admin/advert/save_slider/', 'OperationalController@create_advert_sliders')->name('admin.advert.save_slider');
    Route::put('/admin/advert/update_slider/{id}', 'OperationalController@update_advert_sliders')->name('admin.advert.update_slider');
    Route::get('/admin/delete/sponsored/{id}', 'OperationalController@delete_advert_slider')->name('admin.advert.delete_sliders');

    Route::get('/admin/pending_advert_requests', 'AdminController@pending_advert_requests')->name('pending_advert_requests');
    Route::get('/admin/all_adverts', 'AdminController@all_adverts')->name('admin.all_adverts');
    Route::get('/admin/treated_advert_requests', 'AdminController@treated_advert_requests')
    ->name('treated_advert_requests');
    Route::get('/admin/active_adverts', 'AdminController@active_adverts')
    ->name('active_adverts');
    Route::get('all_events', 'AdminController@all_events')->name('event2');

    Route::get('/admin/events', 'AdminController@events')
    ->name('events');
    Route::post('/admin/save_event/', 'AdminController@save_event')->name('admin.save_event');

    Route::get('admin/send-email', 'AdminController@send_email')->name('admin.send_email');
   Route::get('admin/send-sms', 'AdminController@send_sms')->name('admin.send_sms');

    Route::get('/admin/add-data-entry', 'AdminController@add_data')->name('admin.add.data');
    Route::post('/admin/submit-data', 'AdminController@submit_data')->name('admin.submit.data');
    Route::get('/admin/all-data-entry-officers', 'AdminController@allData')->name('admin.all.data');

    Route::get('seller/service/badges/badger','BadgeController@getBadgeList')->name('fff');
    ///seller/service/admin/get-badge-list/2 404 (Not Found)

    Route::get('/admin/usersfeedback','AdminController@usersfeedback')->name('admin.users.feedback');
    Route::get('/admin/userfeedback/{id}','AdminController@userfeedback')->name('admin.user.feedback');
    Route::put('/admin/userfeedback/treat/{id}','AdminController@treatfeedback')->name('admin.user.feedback.treat');
    Route::get('/admin/userfeedback/delete/{id}','AdminController@feedbackDelete')->name('admin.user.feedback.delete');


    // PAGES CONTENTS TABLE
    Route::get('/admin/pages-contents', 'PageContentController@pagescontents')->name('admin.pagescontents');
    Route::post('/admin/pages-contents/privacy', 'PageContentController@savePrivacyPolicy')->name('admin.pagescontents.save.privacy');
    Route::post('/admin/pages-contents/about', 'PageContentController@saveAboutUs')->name('admin.pagescontents.save.aboutus');
    Route::post('/admin/pages-contents/about-section-one', 'PageContentController@saveAboutUsSection1')->name('admin.pagescontents.saveAboutUsSection1');
    Route::post('/admin/pages-contents/about-section-two', 'PageContentController@saveAboutUsSection2')->name('admin.pagescontents.saveAboutUsSection2');
    Route::post('/admin/pages-contents/about-section-three', 'PageContentController@saveAboutUsSection3')->name('admin.pagescontents.saveAboutUsSection3');
    Route::post('/admin/pages-contents/benefitsofefc', 'PageContentController@saveBenefitsofEfcontact')->name('admin.pagescontents.save.benefitsofefc');
    Route::post('/admin/pages-contents/termofuse', 'PageContentController@saveTermOfUse')->name('admin.pagescontents.save.termofuse');


    //accountant routes
    Route::get('/admin/all-accountants', 'AdminController@allAccountants')->name('all_accountants');


}); //Admin Middleware protection end here

Route::prefix('superadmin')->middleware(['superadmin'])->group(function () { //SuperAdmin Middleware protection start here
    Route::get('dashboard/approve_withdrawal_request/{id}', 'DashboardController@approve_withdrawal_request')->name('admin.approve_withdrawal_request');

    Route::get('dashboard', 'DashboardController@admin')->name('superadmin.dashboard');
    Route::get('dashboard/category/show', 'CategoryController@index')->name('superadmin.category.show');
    Route::post('dashboard/category/show', 'CategoryController@store')->name('superadmin.category.store');
    Route::get('category/{id}', 'CategoryController@destroy')->name('superadmin.category.delete');
    Route::get('dashboard/single/category/{id}', 'CategoryController@categoryShow')->name('superadmin.single.category.show');
    Route::put('dashboard/single/category/{id}', 'CategoryController@categoryUpdate')->name('superadmin.single.category.update');
    Route::post('/profile/update/{id}', 'AuthController@updatePassword')->name('profile.update.password');

    // Route::get('/admin/dashboard', 'DashboardController@admin')->name('admin.dashboard');
    // Route::get('/admin/dashboard/category/show', 'CategoryController@index')->name('admin.category.show');
    // Route::post('admin/dashboard/category/show', 'CategoryController@store')->name('admin.category.store');
    // Route::get('/admin/category/{id}', 'CategoryController@destroy')->name('admin.category.delete');
    // Route::get('/admin/dashboard/single/category/{id}', 'CategoryController@categoryShow')->name('admin.single.category.show');
    // Route::put('/admin/dashboard/single/category/{id}', 'CategoryController@categoryUpdate')->name('admin.single.category.update');


    Route::get('dashboard/subcategory/show', 'CategoryController@subcategoryIndex')->name('superadmin.subcategory.show');
    Route::get('subcategory/{id}', 'CategoryController@subCatDestroy')->name('superadmin.subcategory.delete');
    Route::post('dashboard/subcategory/create', 'CategoryController@createSubCategory')->name('superadmin.subcategory.store');
    Route::get('dashboard/single/subcategory/{id}', 'CategoryController@subCategoryShow')->name('superadmin.single.subcategory.show');
    Route::put('dashboard/single/subcategory/{id}', 'CategoryController@subCategoryUpdate')->name('superadmin.single.subcategory.update');

    Route::get('dashboard/service/all', 'AdminController@allService')->name('superadmin.service.all');
    Route::get('dashboard/service/active', 'AdminController@activeService')->name('superadmin.service.active');
    Route::get('dashboard/service/pending', 'AdminController@pendingService')->name('superadmin.service.pending');
    Route::get('dashboard/service/pending', 'AdminController@pendingService')->name('superadmin.service.pending');
    Route::get('dashboard/service/status/{id}', 'AdminController@updateServiceStatus')->name('superadmin.service.status');
    Route::get('dashboard/service/destroy/{id}', 'AdminController@destroy')->name('superadmin.service.destroy');
    Route::get('dashboard/service/view/{slug}', 'AdminController@viewService')->name('superadmin.view');


    Route::get('dashboard/service/search', 'AdminController@serviceSearch')->name('superadmin.service.search');
    Route::get('dashboard/user/search', 'AdminController@userSearch')->name('superadmin.user.search');


    Route::get('dashboard/service-providers', 'AuthController@seller')->name('superadmin.seller');
    Route::get('dashboard/all-agents', 'AuthController@allagents')->name('superadmin.allagents');
    Route::get('dashboard/service-seekers', 'AuthController@buyer')->name('superadmin.buyer');
    Route::get('/activate_user/{id}', 'Admin@activate_user')->name('superadmin.activate');
    Route::get('/activate_agent/{id}', 'Admin@activate_agent')->name('superadmin.activate.agent');

    Route::get('profile/', 'AdminController@viewProfile')->name('superadmin.profile');

    Route::get('notification/all', 'AdminController@allNotification')->name('superadmin.notification.all');
    Route::post('notification/general/send', 'NotificationController@GeneralNofications')->name('superadmin.notification.general.send');
    Route::post('notification/send', 'AdminController@sendNotification')->name('superadmin.notification.send');
    Route::get('notification/markallasread', 'NotificationController@notificationMarkAsAllRead')->name('superadmin.notification.markallasread');

    Route::get('system/config', 'AdminController@systemConfig')->name('superadmin.system.config');


    Route::post('system/{id}', 'AdminController@storeSystemConfig')->name('superadmin.system.config.store');

    Route::get('pages/faq', 'AdminController@FAQs')->name('superadmin.pages.faq');
    Route::get('dashboard/badge/requests', 'AdminController@allBadges')->name('superadmin.badge.request');
    Route::get('seller/saveBadge/', 'AdminController@saveBadge')->name('superadmin.save.badge');
    Route::get('privacy-policy/', 'AdminController@privacyPolicy')->name('superadmin.privacy.policy');
    Route::post('save_privacy_policy/', 'AdminController@save_privacyPolicy')->name('superadmin.save_privacyPolicy');
    Route::get('privacy', 'AdminController@privacy')->name('superadmin.privacy');

    Route::get('terms-of-use/', 'AdminController@termsOfUse')->name('superadmin.termsOfUse');
    Route::post('save_terms_of_use/', 'AdminController@save_termsOfUse')->name('superadmin.save_termsOfUse');
    Route::post('save_faq/', 'AdminController@save_faq')->name('superadmin.save_faq');
    Route::get('save_faq/', 'AdminController@show_faq')->name('superadmin.show_faq');
    Route::get('delete/faqs/{id}', 'AdminController@delete_faqs')->name('superadmin.delete_faqs');

    // Banner Sliders
    Route::get('sliders', 'AdminController@sliders')->name('superadmin.sliders');
    Route::get('slider/{id}', 'AdminController@slider')->name('superadmin.slider');
    Route::post('save_slider/', 'AdminController@save_slider')->name('superadmin.save_slider');
    Route::put('update/slider/{id}', 'OperationalController@sliderUpdate')->name('superadmin.update.slider');
    Route::get('delete/sliders/{id}', 'AdminController@delete_sliders')->name('superadmin.delete_sliders');

    //Tourism
    Route::get('tourist-sites', 'TourismController@cities')->name('superadmin.cities');
    Route::get('city/{slug}', 'TourismController@city')->name('superadmin.city');
    Route::post('save-city', 'TourismController@save_city')->name('superadmin.save_city');
    Route::put('update-city/{slug}', 'TourismController@update_city')->name('superadmin.update.city');
    Route::put('add_city_images/{slug}', 'TourismController@add_city_images')->name('superadmin.add_city_images');
    Route::get('delete-city/{slug}', 'TourismController@deleteCity')->name('superadmin.delete.city');

    //add accountant
    Route::get('add-accountant', 'AccountantController@add_accountant')->name('superadmin.add-accountant');
    Route::post('submit-accountant', 'AccountantController@submit_accountant')->name('superadmin.submit_accountant');

    //add admin
    Route::get('add-admin', 'AdminController@add_admin')->name('superadmin.add.admin');
    Route::post('submit-admin', 'AdminController@submit_admin')->name('superadmin.submit.admin');
    Route::get('all-admins', 'AdminController@allAdmins')->name('superadmin.all.admins');

     //add cmo
    Route::get('add-cmo', 'AdminController@add_cmo')->name('superadmin.add.cmo');
    Route::post('submit-cmo', 'AdminController@submit_cmo')->name('superadmin.submit.cmo');
    Route::get('all-cmos', 'AdminController@allCmos')->name('superadmin.all.cmos');

    //add data entry officer
    Route::get('add-data-entry', 'AdminController@add_data')->name('superadmin.add.data');
    Route::post('submit-data', 'AdminController@submit_data')->name('superadmin.submit.data');
    Route::get('all-data-entry-officers', 'AdminController@allData')->name('superadmin.all.data');
    // Advertisement
    // Route::get('/admin/sliders', 'AdminController@sliders')->name('admin.sliders');
    Route::get('sponsored/slider/{id}', 'OperationalController@get_advert_slider')->name('superadmin.advert.slider');
    Route::post('advert/save_slider/', 'OperationalController@create_advert_sliders')->name('superadmin.advert.save_slider');
    Route::put('advert/update_slider/{id}', 'OperationalController@update_advert_sliders')->name('superadmin.advert.update_slider');
    Route::get('delete/sponsored/{id}', 'OperationalController@delete_advert_slider')->name('superadmin.advert.delete_sliders');

    Route::get('pending_advert_requests', 'AdminController@pending_advert_requests')->name('superadmin.pending_advert_requests');
    Route::get('all_adverts', 'AdminController@all_adverts')->name('superadmin.all_adverts');
    Route::get('treated_advert_requests', 'AdminController@treated_advert_requests')
    ->name('superadmin.treated_advert_requests');
    Route::get('active_adverts', 'AdminController@active_adverts')
    ->name('superadmin.active_adverts');
    Route::get('all_events', 'AdminController@all_events')->name('superadmin.event2');

    Route::get('events', 'AdminController@events')
    ->name('superadmin.events');
    Route::post('save_event/', 'AdminController@save_event')->name('superadmin.save_event');





//     Route::get('seller/service/badges/badger','BadgeController@getBadgeList')->name('fff');
//     ///seller/service/admin/get-badge-list/2 404 (Not Found)

    Route::get('usersfeedback','AdminController@usersfeedback')->name('superadmin.users.feedback');
    Route::get('userfeedback/{id}','AdminController@userfeedback')->name('superadmin.user.feedback');
    Route::put('userfeedback/treat/{id}','AdminController@treatfeedback')->name('superadmin.user.feedback.treat');
    Route::get('userfeedback/delete/{id}','AdminController@feedbackDelete')->name('superadmin.user.feedback.delete');


    // PAGES CONTENTS TABLE
    Route::get('pages-contents', 'PageContentController@pagescontents')->name('superadmin.pagescontents');
    Route::post('pages-contents/privacy', 'PageContentController@savePrivacyPolicy')->name('superadmin.pagescontents.save.privacy');
    Route::post('pages-contents/about', 'PageContentController@saveAboutUs')->name('superadmin.pagescontents.save.aboutus');
    Route::post('pages-contents/about-section-one', 'PageContentController@saveAboutUsSection1')->name('superadmin.pagescontents.saveAboutUsSection1');
    Route::post('pages-contents/about-section-two', 'PageContentController@saveAboutUsSection2')->name('superadmin.pagescontents.saveAboutUsSection2');
    Route::post('pages-contents/about-section-three', 'PageContentController@saveAboutUsSection3')->name('superadmin.pagescontents.saveAboutUsSection3');
    Route::post('pages-contents/benefitsofefc', 'PageContentController@saveBenefitsofEfcontact')->name('superadmin.pagescontents.save.benefitsofefc');
    Route::post('pages-contents/termofuse', 'PageContentController@saveTermOfUse')->name('superadmin.pagescontents.save.termofuse');

    Route::get('send-email', 'AdminController@send_email')->name('superadmin.send_email');
    Route::get('create-sms', 'AdminController@sendSms')->name('superadmin.send_sms');

   Route::post('send-sms', 'AdminController@submit_sms')->name('data.submit.sms');
   Route::post('send-email', 'AdminController@submitEmail')->name('data.submit.email');


   Route::post('send-sms', 'AdminController@submit_sms')->name('data.submit.sms');
   Route::post('send-email', 'AdminController@submitEmail')->name('data.submit.email');
    //accountant routes
    Route::get('all-accountants', 'AdminController@allAccountants')->name('superadmin.all_accountants');


});
//SuperAdmin Middleware protection end here

Route::prefix('cmo')->middleware(['cmo'])->group(function () { //CMO Middleware protection start here

    Route::get('dashboard', 'DashboardController@admin')->name('cmo.dashboard');
    Route::get('dashboard/category/show', 'CategoryController@index')->name('cmo.category.show');
    Route::post('dashboard/category/show', 'CategoryController@store')->name('cmo.category.store');
    Route::get('category/{id}', 'CategoryController@destroy')->name('cmo.category.delete');
    Route::get('dashboard/single/category/{id}', 'CategoryController@categoryShow')->name('cmo.single.category.show');
    Route::put('dashboard/single/category/{id}', 'CategoryController@categoryUpdate')->name('cmo.single.category.update');


    Route::get('dashboard/subcategory/show', 'CategoryController@subcategoryIndex')->name('cmo.subcategory.show');
    Route::get('subcategory/{id}', 'CategoryController@subCatDestroy')->name('cmo.subcategory.delete');
    Route::post('dashboard/subcategory/create', 'CategoryController@createSubCategory')->name('cmo.subcategory.store');
    Route::get('dashboard/single/subcategory/{id}', 'CategoryController@subCategoryShow')->name('cmo.single.subcategory.show');
    Route::put('dashboard/single/subcategory/{id}', 'CategoryController@subCategoryUpdate')->name('cmo.single.subcategory.update');


    Route::get('profile/', 'AdminController@viewProfile')->name('cmo.profile');

    Route::get('notification/all', 'AdminController@allNotification')->name('cmo.notification.all');
    Route::post('notification/general/send', 'NotificationController@GeneralNofications')->name('cmo.notification.general.send');
    Route::post('notification/send', 'AdminController@sendNotification')->name('cmo.notification.send');
    Route::get('notification/markallasread', 'NotificationController@notificationMarkAsAllRead')->name('cmo.notification.markallasread');

    Route::get('system/config', 'AdminController@systemConfig')->name('cmo.system.config');

     Route::get('events', 'AdminController@events')
    ->name('cmo.events');
    Route::post('system/{id}', 'AdminController@storeSystemConfig')->name('system.config.store');

    Route::get('pages/faq', 'AdminController@FAQs')->name('cmo.pages.faq');
    // Route::get('/admin/badge/requests', 'AdminController@allBadges')->name('badge.request');
    // Route::get('/admin/seller/saveBadge/', 'AdminController@saveBadge')->name('save.badge');
    Route::get('privacy-policy/', 'AdminController@privacyPolicy')->name('cmo.privacy.policy');
    Route::post('save_privacy_policy/', 'AdminController@save_privacyPolicy')->name('cmo.save_privacyPolicy');
    Route::get('privacy', 'AdminController@privacy')->name('cmo.privacy');

    Route::get('terms-of-use/', 'AdminController@termsOfUse')->name('cmo.termsOfUse');
    Route::post('save_terms_of_use/', 'AdminController@save_termsOfUse')->name('cmo.save_termsOfUse');
    Route::post('save_faq/', 'AdminController@save_faq')->name('cmo.save_faq');
    Route::get('save_faq/', 'AdminController@show_faq')->name('cmo.show_faq');
    Route::get('delete/faqs/{id}', 'AdminController@delete_faqs')->name('cmo.delete_faqs');

    // Banner Sliders
    Route::get('sliders', 'AdminController@sliders')->name('cmo.sliders');
    Route::get('slider/{id}', 'AdminController@slider')->name('cmo.slider');
    Route::post('save_slider/', 'AdminController@save_slider')->name('cmo.save_slider');
    Route::put('update/slider/{id}', 'OperationalController@sliderUpdate')->name('cmo.update.slider');
    Route::get('delete/sliders/{id}', 'AdminController@delete_sliders')->name('cmo.delete_sliders');

    //Tourism
    Route::get('tourist-sites', 'TourismController@cities')->name('cmo.cities');
    Route::get('city/{slug}', 'TourismController@city')->name('cmo.city');
    Route::post('save-city', 'TourismController@save_city')->name('cmo.save_city');
    Route::put('update-city/{slug}', 'TourismController@update_city')->name('cmo.update.city');
    Route::put('add_city_images/{slug}', 'TourismController@add_city_images')->name('cmo.add_city_images');
    Route::get('delete-city/{slug}', 'TourismController@deleteCity')->name('cmo.delete.city');



    // PAGES CONTENTS TABLE
    Route::get('pages-contents', 'PageContentController@pagescontents')->name('cmo.pagescontents');
    Route::post('pages-contents/privacy', 'PageContentController@savePrivacyPolicy')->name('cmo.pagescontents.save.privacy');
    Route::post('pages-contents/about', 'PageContentController@saveAboutUs')->name('cmo.pagescontents.save.aboutus');
    Route::post('pages-contents/about-section-one', 'PageContentController@saveAboutUsSection1')->name('cmo.pagescontents.saveAboutUsSection1');
    Route::post('pages-contents/about-section-two', 'PageContentController@saveAboutUsSection2')->name('cmo.pagescontents.saveAboutUsSection2');
    Route::post('pages-contents/about-section-three', 'PageContentController@saveAboutUsSection3')->name('cmo.pagescontents.saveAboutUsSection3');
    Route::post('pages-contents/benefitsofefc', 'PageContentController@saveBenefitsofEfcontact')->name('cmo.pagescontents.save.benefitsofefc');
    Route::post('pages-contents/termofuse', 'PageContentController@saveTermOfUse')->name('cmo.pagescontents.save.termofuse');


}); //CMO Middleware protection end here

Route::prefix('data-officer')->middleware(['data'])->group(function () { //Data Entry Officer Middleware protection start here

    Route::get('dashboard', 'DashboardController@admin')->name('data.dashboard');

    Route::get('notification/all', 'AdminController@allNotification')->name('data.notification.all');
    Route::post('notification/general/send', 'NotificationController@GeneralNofications')->name('data.notification.general.send');
    Route::post('notification/send', 'AdminController@sendNotification')->name('data.notification.send');
    Route::get('notification/markallasread', 'NotificationController@notificationMarkAsAllRead')->name('data.notification.markallasread');
    Route::get('profile/', 'AdminController@viewProfile')->name('data.profile');

   Route::get('send-email', 'AdminController@send_email')->name('data.send_email');
   Route::get('create-sms', 'AdminController@sendSms')->name('data.send_sms');

   Route::post('send-sms', 'AdminController@submit_sms')->name('data.submit.sms');
   Route::post('send-email', 'AdminController@submitEmail')->name('data.submit.email');


}); //Data Entry Officer Middleware protection end here

Route::post ( '/searchonservices',  'ServiceController@searchonservices')->name('searchonservices');

// Route::get ( '/searchresults',  'ServiceController@search')->name('search3');
Route::get ( '/searchresults',  'ServiceController@homepage_search')->name('search3');

Route::get('/download-ad-brochure', 'OperationalController@downloadAdBrochure')->name('download.ad.brochure');




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


// Auth::routes();



Route::post('/slider/create', [OperationalController::class, 'sliderCreate'])->name('slider.create');
