<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminAttachmentController;
use App\Http\Controllers\Admin\Api\ServicesController as ServicesApiController;
use App\Http\Controllers\Admin\AdminInvoicesController;
use App\Http\Controllers\Admin\AdminNotificationsController;
use App\Http\Controllers\Admin\AdminOrderBriefController;
use App\Http\Controllers\Admin\AdminRefundsController;
use App\Http\Controllers\Admin\AdminStorageController;
use App\Http\Controllers\Admin\CouponsController;
use App\Http\Controllers\Admin\CustomersController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\OrderDiscussionController as AdminOrderDiscussionController;
use App\Http\Controllers\Admin\OrdersController;
use App\Http\Controllers\Admin\ServiceCategoriesController;
use App\Http\Controllers\Admin\ServicesController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\BillingAddressController;
// use App\Http\Controllers\CompanyInformationsController;
use App\Http\Controllers\BillingPortalController;
use App\Http\Controllers\CheckOutController;

use App\Http\Controllers\AttachmentController;
use App\Http\Controllers\InvoicesController;
use App\Http\Controllers\LeadsController;
use App\Http\Controllers\DashboardController;

use App\Http\Controllers\NotificationsController;
use App\Http\Controllers\UserSocialProfilesController;

use App\Http\Controllers\OrderBriefController;
use App\Http\Controllers\OrderDiscussionController;
use App\Http\Controllers\PaymentsController;
use App\Http\Controllers\RefundsController;
use App\Http\Controllers\ServicePagesController;
use App\Http\Controllers\StorageController;
use App\Http\Controllers\ThankyouController;
use App\Http\Controllers\UserOrdersController;
use App\Http\Controllers\HomeController;

use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\StripeWebhookController;
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

Route::get('/', function () {
    return view('home');
});
Route::get('/', [HomeController::class, 'index'])->name('home');


Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::group(['middleware' => 'authenticate_admin'], function () {
        Route::resource('services', ServicesController::class);
        // Route::get('', [AdminOrderBriefController::class, 'edit'])->name('orders.brief.edit');
        
        Route::resource('users', UsersController::class);
        Route::resource('orders', OrdersController::class);
        Route::get('orders/{id}/discusion', [AdminOrderDiscussionController::class, 'index'])->name('orders.discussion');
        Route::resource('customers', CustomersController::class);
        Route::get('refunds/request', [AdminRefundsController::class, 'index_request'])->name('refunds.request');
        Route::resource('refunds', AdminRefundsController::class);
        Route::resource('storage', AdminStorageController::class);
        Route::resource('invoices', AdminInvoicesController::class);
        Route::get('orders/{order_id}/brief', [AdminOrderBriefController::class, 'index'])->name('orders.brief.index');
        Route::post('orders/{order_id}/brief', [AdminOrderBriefController::class, 'store'])->name('orders.brief.store');
        Route::get('orders/{order_id}/brief/edit', [AdminOrderBriefController::class, 'edit'])->name('orders.brief.edit');
        Route::get('orders/{order_id}/brief/update', [AdminOrderBriefController::class, 'update'])->name('orders.brief.update');
        Route::get('orders/{order_id}/brief-image', [AdminOrderBriefController::class, 'show_image'])->name('orders.brief.show_image');
        Route::get('notifications', [AdminNotificationsController::class, 'index'])->name('notifications.index');
        Route::get('attachment/{folder}/{file}', [AdminAttachmentController::class, 'index'])->name('attachment');
        Route::get('service_categories/{id}/services', [ServicesApiController::class, 'index']);
        Route::get('api/service_categories/{id}/services', [ServicesApiController::class, 'index']);
        Route::get('api/services/{id}/packages', [ServicesApiController::class, 'service_package']);


        Route::resource('coupons', CouponsController::class);


        // Route::resource('refunds', AdminRefundsController::class);

        Route::resource('service_categories', ServiceCategoriesController::class);
        Route::get('dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    });

    Route::group(['middleware' => 'guest_admin'], function () {
        Route::get('login', [LoginController::class, 'create']);
        Route::post('login', [LoginController::class, 'store'])->name('login');
    });
    Route::get('logout', [LoginController::class, 'logout'])->name('logout');
});

Route::get('checkout', [CheckOutController::class, 'Create'])->name('checkout');
Route::post('checkout/{plan_id}', [CheckOutController::class, 'store'])->name('checkout.store');
Route::get('payment/{order_id}', [PaymentsController::class, 'index'])->name('payment');
Route::post('payment/{order_id}', [PaymentsController::class, 'store'])->name('payment.store');
// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::resource('invoices', InvoicesController::class);
    Route::resource('refunds', RefundsController::class);
    Route::get('orders/{order_id}/brief', [OrderBriefController::class, 'index'])->name('orders.brief.index');
    Route::post('orders/{order_id}/brief', [OrderBriefController::class, 'store'])->name('orders.brief.store');
    Route::get('orders/{order_id}/brief-image', [OrderBriefController::class, 'show_image'])->name('orders.brief.show_image');
    Route::get('orders/complete', [UserOrdersController::class, 'index_complete'])->name('orders.complete');
  
    Route::resource('orders', UserOrdersController::class);
    Route::get('payment-methods', [BillingPortalController::class, 'index'])->name('billing-portal');
    Route::get('orders/{id}/discussion', [OrderDiscussionController::class, 'index'])->name('orders.discussion');
    Route::post('orders/{id}/discussion', [OrderDiscussionController::class, 'store'])->name('orders.discussion.store');
    Route::resource('files', StorageController::class);
    Route::get('notifications', [NotificationsController::class, 'index'])->name('notifications.index');
Route::group(['prefix' => 'account', 'as' => 'account.'], function () {

    Route::get('profile', [UserProfileController::class, 'index'])->name('profile');
    Route::put('profile/update', [UserProfileController::class, 'update'])->name('profile.update');
    Route::get('password', [UserProfileController::class, 'view_chnge_password'])->name('password');
    Route::put('password/update', [UserProfileController::class, 'update_password'])->name('password.update');
    Route::get('setting', [UserProfileController::class, 'view_setting'])->name('setting');
    Route::put('setting/update', [UserProfileController::class, 'update_setting'])->name('setting.update');
    Route::get('social_profile', [UserSocialProfilesController::class, 'index'])->name('social_profile');
    Route::put('social_profile/udpate', [UserSocialProfilesController::class, 'update'])->name('social_profile.update');
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('billing', [BillingAddressController::class, 'index'])->name('billing');
    Route::put('billing/update', [BillingAddressController::class, 'update'])->name('billing.update');
    

});
    Route::get('pricing', [UserOrdersController::class, 'check_pricing'])->name('pricing');
    Route::get('attachment/{folder}/{file}', [AttachmentController::class, 'index'])->name('attachment');
    Route::get('thankyou/{id}', [ThankyouController::class, 'index'])->name('thankyou');

    // Route::put('profile/update', [UserProfileController::class, 'update_password'])->name('profile.update');
});

Route::post('leads', [LeadsController::class, 'store'])->name('leads.store');

// Route::get('file/storage/{storage_id}/download', [StorageController::class, 'download_file'])->name('file.download');

// Route::get('orders', [UserOrdersController::class, 'index']);
// Route::get('orders/create', [UserOrdersController::class, 'create']);
// Route::get('orders/show', [UserOrdersController::class, 'show']);

// Route::get('company-informations/create', [CompanyInformationsController::class, 'create'])->name('company-informations');
// Route::post('company-informations', [CompanyInformationsController::class, 'store'])->name('company-informations.store');

Route::get('who-we-are', function () {
    return view('pages.who-we-are');
})->name('who-we-are');

Route::get('how-it-works', function () {
    return view('pages.how-it-works');
})->name('how-it-works');

Route::get('contact', function () {
    return view('pages.contact');
})->name('contact');

Route::get('portfolio', function () {
    return view('pages.portfolio');
})->name('portfolio');

Route::get('support', function () {
    return view('pages.support');
})->name('support');

Route::get('book-a-call', function () {
    return view('pages.book-a-call');
})->name('book-a-call');

Route::get('categories', function () {
    return view('pages.categories');
})->name('categories');

Route::get('terms-and-conditions', function () {
    return view('pages.terms-and-conditions');
})->name('terms-and-conditions');

Route::get('privacy-and-policy', function () {
    return view('pages.privacy-and-policy');
})->name('privacy-and-policy');

Route::get('refund-policy', function () {
    return view('pages.refund-policy');
})->name('refund-policy');

Route::get('cookie-policy', function () {
    return view('pages.cookie-policy');
})->name('cookie-policy');

Route::get('copyright-policy', function () {
    return view('pages.copyright-policy');
})->name('copyright-policy');

Route::get('coming-soon', function () {
    return view('pages.coming-soon');
})->name('coming-soon');



Route::get('/{slug}', [ServicePagesController::class, 'index'])->name('service-page');



// stripe webhook
Route::post(
    '/stripe/webhook',
    [StripeWebhookController::class, 'handleWebhook']
);
