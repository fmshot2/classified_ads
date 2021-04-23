<?php

use App\Http\Controllers\Api\ServiceController;
use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\GeneralController;
use App\Http\Controllers\BadgeController;
use App\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('gt_payment_details/{user_id}/{badge_type}', 'BadgeController@gt_response');
Route::post('logintestPayment/{user_id}', 'AuthController@logintestPayment');


// Route::post('create_user', 'AuthController@create_user');

Route::post('logintestPayment', 'AuthController@gt_response');


// "https://yellowpage.test/api/logintestPayment";


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    // ACCOUNT MANAGEMENT
    Route::post('login', [AuthController::class, 'login']);
    Route::post('register', [AuthController::class, 'register']);
    Route::post('save-user/{amount}/{tranxRef}', [AuthController::class, 'saveUser']);
    Route::get('profile', [AuthController::class, 'profile']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::get('check-if-email-exist', [AuthController::class, 'checkEmailIfExist']);

    Route::prefix('user')->group(function () {
        // DASHBOARD
        Route::get('dashboard', [ServiceController::class, 'dashboard']);

        // SERVICES
        Route::get('services', [ServiceController::class, 'myServices']);
        Route::post('service/create', [ServiceController::class, 'createService']);
        Route::delete('service/delete/{id}', [ServiceController::class, 'deleteService']);

        // SEEKING WORK
        Route::post('seeking-work/create', [ServiceController::class, 'seekingWorkCreate']);
        Route::get('seekingwork/{slug}', [ServiceController::class, 'showCV']);
        Route::post('seekingwork/images/store/{id}', [ServiceController::class, 'imagesSeekingWorkStore']);
        Route::get('seekingwork/images/delete/{seekingworkid}/{id}', [ServiceController::class, 'imagesDelete']);
        Route::delete('seeking-work/delete/{id}', [ServiceController::class, 'deleteSeekingWork']);

        // Favourites
        Route::get('my-favourites/', [ServiceController::class, 'myFavourites']);

        // Feedbacks
        Route::get('my-client-feedbacks/', [ServiceController::class, 'clientfeedbacks']);

        // Messages
        Route::get('my-messages/', [ServiceController::class, 'myMessages']);
        Route::delete('/message/{id}', [ServiceController::class, 'deleteMessage']);
        Route::get('/message', [ServiceController::class, 'viewMessage']);
        Route::get('/message/read-messages', [ServiceController::class, 'readMessages']);
        Route::get('/message/unread-messages', [ServiceController::class, 'unReadMessages']);
        Route::get('/message/reply', [ServiceController::class, 'replyMessage']);
        Route::post('/message/replies', [ServiceController::class, 'messageReply']);

        // Notifications
        Route::get('/notification/all', [ServiceController::class, 'allNotifications']);
        Route::get('/notification', [ServiceController::class, 'viewNotification']);
        Route::get('/notification/mark-all-as-read', [ServiceController::class, 'notificationMarkAsAllRead']);
        Route::get('/notification/mark-as-read', [ServiceController::class, 'notificationMarkAsRead']);
        Route::post('/notification/delete', [ServiceController::class, 'notificationDelete']);

        // Apply For Badge
        Route::get( '/request-for-badge/{id}', [ServiceController::class, 'requestForBadge']);
        Route::post('/paid-for-badge', [ServiceController::class, 'paidForBadge']);

        // Payment - Subscription/Featured
        Route::get('featured/{id}', [ServiceController::class, 'featuredServices']);
        Route::post('user-subscription', [ServiceController::class, 'userSubscription']);

        // Payment History
        Route::get( '/payment-history', [ServiceController::class, 'paymentHistory']);


        // Comments
        Route::post( '/store-comment', [ServiceController::class, 'storeComment']);
        Route::post( '/reply-comment', [ServiceController::class, 'storeCommentReply']);
    });
});


Route::prefix('v1')->group(function ()
{
    // SERVICES
    Route::get('services', [ServiceController::class, 'index']);
    Route::get('services/{id}', [ServiceController::class, 'show']);
    Route::get('search/', [ServiceController::class, 'search']);

    // SERVICES CLOSE TO YOU
    Route::get('services-close-to-me', [ServiceController::class, 'serviceCloseToYou']);

    // SEEKING WORK (CV)
    Route::get('job-applicants/all', [ServiceController::class, 'seekingWorkLists']);
    Route::get('job-applicant/details/{slug}', [ServiceController::class, 'seekingWorkDetails']);


    // CATEGORIES
    Route::get('/categories', [ServiceController::class, 'categories']);
    Route::get('/category/{id}', [ServiceController::class, 'showcategory']);
    Route::get('/subcategories', [ServiceController::class, 'sub_categories']);
    Route::get('/thecategory/services/', [ServiceController::class, 'servicesByCategory']);

    // BANNER
    Route::get('banner/sliders', [GeneralController::class, 'banner_slider']);

    // ADVERTS
    Route::get('sponsored/advertisements', [GeneralController::class, 'advertisement']);

    Route::get('system-config/', [GeneralController::class, 'systemConfig']);
});
