<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\BrandController;
use App\Http\Controllers\admin\CouponController;
use App\Http\Controllers\admin\OrderController;
use App\Http\Controllers\admin\ReviewController;
use App\Http\Controllers\admin\ContactController;
use App\Http\Controllers\admin\DiscountController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\ecommerce\CartController;
use App\Http\Controllers\ecommerce\EcommerceController;
use App\Http\Controllers\ecommerce\FaqController;
use App\Http\Controllers\ecommerce\PrivacyPolicyController;
use App\Http\Controllers\ecommerce\ProductDetailsController;
use App\Http\Controllers\ecommerce\WishlistController;
use App\Http\Controllers\ecommerce\ShopController;
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

Route::middleware(['auth', 'auth.role', 'verified'])->group(function () {
        // E-Commerce Routes
        // Route::get('/', function () {
        //     return view('ecommerce.home');
        // })->name('home');

        Route::prefix('')->group(function () {

        // Route::get('/', [EcommerceController::class, 'index'])->name('ecommerce');
        // Route::get('/categories/{id}', [EcommerceController::class, 'show'])->name('categoriesShow.ecommerce');


        // // Contact Routes
        // Route::prefix('contact-us')->group(function () {
        //     Route::get('/', [App\Http\Controllers\ecommerce\ContactController::class, 'index'])->name('contact-us.ecommerce'); // View all reviews
        //     Route::post('/', [App\Http\Controllers\ecommerce\ContactController::class, 'store'])->name('contact-us.store');
        // });

        // // About-Us Routes
        // Route::prefix('about-us')->group(function () {
        //     Route::get('/', [EcommerceController::class, 'about'])->name('about-us.ecommerce'); // View all reviews
        // });

        // Products Details Routes
        // Route::prefix('products-details')->group(function () {
        //     Route::get('/{product}', [EcommerceController::class, 'productsDetails'])->name('products-details.ecommerce'); // View all reviews
        // });
        // Route::prefix('product-details')->group(function () {
        //     Route::get('/', [ProductDetailsController::class, 'index'])->name('product-details.ecommerce'); // View all reviews
        // });

        // // Cart Routes
        // Route::prefix('cart')->group(function () {
        //     Route::get('/', [CartController::class, 'index'])->name('cart.ecommerce'); // View all reviews
        // });

        // // Wishlist Routes
        // Route::prefix('wishlist')->group(function () {
        //     Route::get('/', [WishlistController::class, 'index'])->name('wishlist.ecommerce'); // View all reviews
        // });

        // // Checkout Routes
        // Route::prefix('checkout')->group(function () {
        //     Route::get('/', [CartController::class, 'checkout'])->name('checkout.ecommerce'); // View all reviews
        // });

        // // Shop Routes
        // Route::prefix('shop')->group(function () {
        //     Route::get('/', [ShopController::class, 'index'])->name('shop.ecommerce'); // View all reviews
        // });

        // Profile Routes
        Route::prefix('profile')->group(function () {
            Route::get('/', [ProfileController::class, 'edit'])->name('profile.edit.ecommerce');
            Route::patch('/', [ProfileController::class, 'update'])->name('profile.update.ecommerce');
            Route::delete('/', [ProfileController::class, 'destroy'])->name('profile.destroy.ecommerce');
        });
    });

    // Admin Dashboard Routes
    Route::prefix('dashboard')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

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
            Route::get('/{review}', [ReviewController::class, 'show'])->name('reviews.show');
            Route::post('/toggle-visibility/{id}', [ReviewController::class, 'toggleVisibility'])->name('reviews.toggleVisibility');
        });

        // Contact Routes
        Route::prefix('contacts')->group(function () {
            Route::get('/', [ContactController::class, 'index'])->name('contacts.index'); // View all reviews
            Route::get('/{contact}', [ContactController::class, 'show'])->name('contacts.show');
            Route::post('/{contact}/status', [ContactController::class, 'updateStatus'])->name('contacts.updateStatus');
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

        // Admin Profile Routes
        Route::prefix('profile')->group(function () {
            Route::get('/', [ProfileController::class, 'edit'])->name('profile.edit');
            Route::patch('/', [ProfileController::class, 'update'])->name('profile.update');
            Route::delete('/', [ProfileController::class, 'destroy'])->name('profile.destroy');
        });
    });
});

Route::prefix('')->group(function () {

    Route::get('/', [EcommerceController::class, 'index'])->name('ecommerce');
    Route::get('/categories/{id}', [EcommerceController::class, 'show'])->name('categoriesShow.ecommerce');
    Route::get('/product/{id}/details', [EcommerceController::class, 'getProductDetails'])->name('product.details');

    // Contact Routes
    Route::prefix('contact-us')->group(function () {
        Route::get('/', [App\Http\Controllers\ecommerce\ContactController::class, 'index'])->name('contact-us.ecommerce');
        Route::post('/', [App\Http\Controllers\ecommerce\ContactController::class, 'store'])->name('contact-us.store');
    });

    // About-Us Routes
    Route::prefix('about-us')->group(function () {
        Route::get('/', [EcommerceController::class, 'about'])->name('about-us.ecommerce');
    });

    // Product Details Routes
    Route::prefix('product-details')->group(function () {
        Route::get('/{id}', [ProductDetailsController::class, 'index'])->name('product-details.ecommerce');
        Route::post('/reviews', [ProductDetailsController::class, 'store'])->name('reviews.store'); // Corrected route
    });

    // Cart Routes
    Route::prefix('cart')->group(function () {
        Route::get('/', [CartController::class, 'index'])->name('cart.ecommerce');
        Route::get('/add/{product_id}', [CartController::class, 'add'])->name('cart.add');
        Route::get('/remove/{product_id}', [CartController::class, 'remove'])->name('cart.remove');
        Route::delete('/{cart}', [CartController::class, 'destroy'])->name('cart.destroy');
    });

    // Wishlist Routes
    Route::prefix('wishlist')->group(function () {
        Route::get('/', [WishlistController::class, 'index'])->name('wishlist.ecommerce');
        Route::get('/add/{product_id}', [WishlistController::class, 'add'])->name('wishlist.add');
        Route::get('/remove/{product_id}', [WishlistController::class, 'remove'])->name('wishlist.remove'); // New route
        Route::delete('/{id}', [WishlistController::class, 'destroy'])->name('wishlist.destroy');
    });

    // Checkout Routes
    Route::prefix('checkout')->group(function () {
        Route::get('/', [CartController::class, 'checkout'])->name('checkout.ecommerce');
    });

    // Shop Routes
    Route::prefix('shop')->group(function () {
        Route::get('/', [ShopController::class, 'index'])->name('shop.ecommerce');
    });

    // Faq Routes
    Route::prefix('faq')->group(function () {
        Route::get('/', [FaqController::class, 'index'])->name('faq.ecommerce');
    });

    // privacy policy Routes
    Route::prefix('privacy-policy')->group(function () {
        Route::get('/', [PrivacyPolicyController::class, 'index'])->name('privacy-policy.ecommerce');
    });
});

require __DIR__ . '/auth.php';
