<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DiscountController;
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

Route::middleware(['auth', 'auth.role'])->group(function () {
    // General Routes
    Route::get('/', function () {
        return view('welcome');
    })->name('welcome');

    // Admin Routes
    Route::prefix('dashboard')->group(function () {
        Route::get('/', function () {
            return view('admin.dashboard');
        })->name('dashboard');

        // Users Routes (CRUD)
        Route::prefix('users')->group(function () {
            Route::get('/', [UserController::class, 'index'])->name('users.index'); // View all users
            Route::get('/create', [UserController::class, 'create'])->name('users.create'); // Add user
            Route::get('/edit/{user}', [UserController::class, 'edit'])->name('users.edit'); // Edit user
            Route::post('/', [UserController::class, 'store'])->name('users.store'); // Create user
            Route::put('/{user}', [UserController::class, 'update'])->name('users.update'); // Update user
            Route::patch('/{user}/toggle', [UserController::class, 'toggleStatus'])->name('users.toggleStatus'); // Toggle active/inactive
            Route::delete('/{user}', [UserController::class, 'destroy'])->name('users.destroy'); // Delete user
            Route::get('/{user}', [UserController::class, 'show'])->name('users.show'); // View user details

        });

        // Orders Routes
        Route::prefix('orders')->group(function () {
            Route::get('/', [OrderController::class, 'index'])->name('orders.index'); // View all orders
            Route::get('/show/{order}', [OrderController::class, 'show'])->name('orders.show'); // View single order details
            Route::post('/toggleApproval/{order}', [OrderController::class, 'toggleApproval'])->name('orders.toggleApproval');
            Route::post('/updateStatus/{order}', [OrderController::class, 'updateStatus'])->name('orders.updateStatus');
        });


        // Products Routes (CRUD)
        Route::prefix('products')->group(function () {
            Route::get('/', [ProductController::class, 'index'])->name('products.index');
            Route::get('/create', [ProductController::class, 'create'])->name('products.create');
            Route::get('/edit/{product}', [ProductController::class, 'edit'])->name('products.edit');
            Route::post('/', [ProductController::class, 'store'])->name('products.store');
            Route::put('/{product}', [ProductController::class, 'update'])->name('products.update');
            Route::delete('/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
            Route::get('/{product}', [ProductController::class, 'show'])->name('products.show');
        });
        
        // Categories Routes (CRUD)
        Route::prefix('categories')->group(function () {
            Route::get('/', [CategoryController::class, 'index'])->name('categories.index'); // View all category
            Route::get('/create', [CategoryController::class, 'create'])->name('categories.create'); // Add category
            Route::get('/edit/{category}', [CategoryController::class, 'edit'])->name('categories.edit'); // Edit category
            Route::post('/', [CategoryController::class, 'store'])->name('categories.store'); // Create category
            Route::put('/{category}', [CategoryController::class, 'update'])->name('categories.update'); // Update category
            Route::delete('/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy'); // Delete category
        });
        // Brands Routes (CRUD)
        Route::prefix('brands')->group(function () {
            Route::get('/', [BrandController::class, 'index'])->name('brands.index'); // View all brands
            Route::get('/create', [BrandController::class, 'create'])->name('brands.create'); // Add brands
            Route::get('/edit/{brand}', [BrandController::class, 'edit'])->name('brands.edit'); // Edit brands
            Route::post('/', [BrandController::class, 'store'])->name('brands.store'); // Create brands
            Route::put('/{brand}', [BrandController::class, 'update'])->name('brands.update'); // Update brands
            Route::delete('/{brand}', [BrandController::class, 'destroy'])->name('brands.destroy'); // Delete brands
        });
        // Coupons Routes (CRUD)
        Route::prefix('coupons')->group(function () {
            Route::get('/', [CouponController::class, 'index'])->name('coupons.index'); // View all brands
            Route::get('/create', [CouponController::class, 'create'])->name('coupons.create'); // Add brands
            Route::get('/edit/{brand}', [CouponController::class, 'edit'])->name('coupons.edit'); // Edit brands
            Route::post('/', [CouponController::class, 'store'])->name('coupons.store'); // Create brands
            Route::put('/{brand}', [CouponController::class, 'update'])->name('coupons.update'); // Update brands
            Route::delete('/{brand}', [CouponController::class, 'destroy'])->name('coupons.destroy'); // Delete brands
        });

        // Reviews Routes
        Route::prefix('reviews')->group(function () {
            Route::get('/', [ReviewController::class, 'index'])->name('reviews.index'); // View all reviews
            Route::get('/{id}', [ReviewController::class, 'show'])->name('reviews.show');
            Route::post('/toggle-visibility/{id}', [ReviewController::class, 'toggleVisibility'])->name('reviews.toggleVisibility');
        });

        // Contact Routes
        Route::prefix('contacts')->group(function () {
            Route::get('/', [ContactController::class, 'index'])->name('contacts.index'); // View all reviews
            Route::get('/{id}', [ContactController::class, 'show'])->name('contacts.show');
            Route::post('/{id}/status', [ContactController::class, 'updateStatus'])->name('contacts.updateStatus');
        });

        // Discount Routes
        Route::prefix('discounts')->group(function () {
            Route::get('/', [DiscountController::class, 'index'])->name('discounts.index'); // View all reviews
            Route::get('/create', [DiscountController::class, 'create'])->name('discounts.create'); // Add brands
            Route::get('/edit/{discount}', [DiscountController::class, 'edit'])->name('discounts.edit'); // Edit brands
            Route::post('/', [DiscountController::class, 'store'])->name('discounts.store'); // Create brands
            Route::put('/{discount}', [DiscountController::class, 'update'])->name('discounts.update'); // Update brands
            Route::post('/{discount}/toggle-status', [DiscountController::class, 'toggleStatus'])->name('discounts.toggleStatus');
            Route::delete('/{discount}', [DiscountController::class, 'destroy'])->name('discounts.destroy'); // Delete brands
        });
    });
});

Route::middleware(['auth', 'auth.role'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
