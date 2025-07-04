<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminProductController;
use App\Http\Controllers\Admin\AdminOrderController;
use App\Http\Controllers\Admin\StockController;
use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Delivery\DeliveryDashboardController;
use App\Http\Controllers\Delivery\Auth\DeliveryAuthController;
use App\Http\Controllers\FrontOrderController; // If needed
use App\Http\Controllers\Auth\LoginController;

// Public and General Routes
Route::get('/', [ProductController::class, 'welcome'])->name('welcome');
Route::get('/cart', [CartController::class, 'show'])->name('cart.show');
Route::post('/place-order', [OrderController::class, 'placeOrder'])->name('place.order');

Route::post('/add-to-cart/{product}', [CartController::class, 'add'])->name('cart.add');
Route::post('/remove-from-cart/{productId}', [CartController::class, 'remove'])->name('cart.remove');

// Login routes (general user)
Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store'])->name('login.store');
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

// Shop and Products
Route::get('/shop', [ProductController::class, 'index'])->name('shop');
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/product/{id}', [ProductController::class, 'show'])->name('products.show');

// Categories
Route::get('/categories/{id}', [CategoryController::class, 'show'])->name('categories.show');
Route::get('/category/{id}', [CategoryController::class, 'showProducts'])->name('categories.products'); // Clarify if needed

// Cart
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
Route::put('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');
Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');

// Checkout
Route::get('/checkout', [CheckoutController::class, 'show'])->name('checkout');
Route::post('/checkout', [CheckoutController::class, 'placeOrder'])->name('checkout.place');

// Authentication routes for user registration and login
Route::get('/register', [RegisteredUserController::class, 'create'])->name('register'); // Use create() method in controller
Route::post('/register', [RegisteredUserController::class, 'store']);
Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store'])->name('login.store');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout'); // You might want to unify logout routes

// Dashboards (protected)
Route::middleware('auth')->group(function () {
    Route::get('/user/dashboard', [UserDashboardController::class, 'dashboard'])->name('user.dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::put('/profile/update', [UserController::class, 'update'])->name('user.update');
    Route::post('/place-order', [OrderController::class, 'placeOrder'])->name('place.order');
});
Route::prefix('admin')->name('admin.')->group(function () {
 // Guest routes for admin
    Route::middleware('guest:admin')->group(function () {
        Route::get('login', [AdminAuthController::class, 'showLoginForm'])->name('login');
        Route::post('login', [AdminAuthController::class, 'login'])->name('login.post');

        Route::get('register', [AdminAuthController::class, 'showRegisterForm'])->name('register');
        Route::post('register', [AdminAuthController::class, 'register'])->name('register.post');
    });

// Admin Protected Routes
Route::middleware(['auth:admin'])->group(function () {
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    // Orders
    Route::get('/orders', [AdminOrderController::class, 'index'])->name('orders.index');
    Route::get('/orders/{order}', [AdminOrderController::class, 'show'])->name('orders.show');

    // User details
    Route::get('/user/{id}/details', [AdminDashboardController::class, 'userDetails'])->name('user.details');

    // Categories
    Route::post('/categories', [AdminCategoryController::class, 'store'])->name('categories.store');
    Route::delete('/categories/{id}', [AdminCategoryController::class, 'destroy'])->name('categories.destroy');

    // Products
    Route::post('/products', [AdminProductController::class, 'store'])->name('products.store');
    Route::put('/products/{id}', [AdminProductController::class, 'update'])->name('products.update');
    Route::delete('/products/{id}', [AdminProductController::class, 'destroy'])->name('products.destroy');

    // Stock alerts
    Route::get('/stock/alerts', [StockController::class, 'alerts'])->name('stock.alerts');

    // Logout
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');
});
});

// Delivery Authentication Routes



Route::prefix('delivery')->name('delivery.')->group(function () {
    Route::middleware('guest:delivery')->group(function () {
        Route::get('register', [DeliveryAuthController::class, 'showRegisterForm'])->name('register');
        Route::post('register', [DeliveryAuthController::class, 'register'])->name('register.post');

        Route::get('login', [DeliveryAuthController::class, 'showLoginForm'])->name('login');
        Route::post('login', [DeliveryAuthController::class, 'login'])->name('login.post');
    });

    Route::middleware('auth:delivery')->group(function () {
        Route::get('dashboard', [DeliveryDashboardController::class, 'index'])->name('dashboard');
        Route::get('orders', [DeliveryDashboardController::class, 'orders'])->name('orders');

        Route::post('logout', [DeliveryAuthController::class, 'logout'])->name('logout');
    });
});






// Utility routes
Route::get('/db-test', function () {
    try {
        \Illuminate\Support\Facades\DB::connection()->getPdo();
        return 'Database connection is OK!';
    } catch (\Exception $e) {
        return 'Database connection failed: ' . $e->getMessage();
    }
});

require __DIR__ . '/auth.php';
