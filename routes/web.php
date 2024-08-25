<?php

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
Route::get('/', [App\Http\Controllers\Customer\HomeController::class, 'index'])->name('/');
Route::get('/home', [App\Http\Controllers\Customer\HomeController::class, 'index'])->name('home');


// Services
Route::get('/services', [App\Http\Controllers\Customer\ServiceController::class, 'index'])->name('services');
Route::get('/services/category/{category}', [App\Http\Controllers\Customer\ServiceController::class, 'serviceByCategory'])->name('services-by-category');



// Cart
Route::get('carts', [App\Http\Controllers\Customer\CartController::class, 'index'])->name('carts');
Route::post('carts', [App\Http\Controllers\Customer\CartController::class, 'store'])->name('carts.store');





// ####  ADMIN ROUTES ####

// Guest Users
Route::middleware(['guest', 'PreventBackHistory'])->group(function () {
    Route::get('login', [App\Http\Controllers\Admin\AuthController::class, 'showLogin'])->name('login');
    Route::post('login', [App\Http\Controllers\Admin\AuthController::class, 'login'])->name('signin');
});


// Authenticated users
Route::middleware(['auth', 'PreventBackHistory'])->group(function () {

    // Auth Routes
    Route::get('edit-profile', [App\Http\Controllers\Admin\DashboardController::class, 'editProfile'])->name('edit-profile');
    // Route::get('home', fn() => redirect()->route('dashboard'))->name('home');
    Route::post('logout', [App\Http\Controllers\Admin\AuthController::class, 'Logout'])->name('logout');
    Route::get('show-change-password', [App\Http\Controllers\Admin\AuthController::class, 'showChangePassword'])->name('show-change-password');
    Route::post('change-password', [App\Http\Controllers\Admin\AuthController::class, 'changePassword'])->name('change-password');



    // Dashboard routes
    Route::get('dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');



    // Masters routes
    Route::resource('categories', App\Http\Controllers\Admin\Masters\CategoryController::class);
    Route::resource('subcategories', App\Http\Controllers\Admin\Masters\SubCategoryController::class);
    Route::resource('coupons', App\Http\Controllers\Admin\Masters\CouponController::class);
    Route::resource('timeslots', App\Http\Controllers\Admin\Masters\TimeSlotController::class);
    Route::resource('cities', App\Http\Controllers\Admin\Masters\CityController::class);

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
