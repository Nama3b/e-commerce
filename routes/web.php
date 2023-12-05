<?php

use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LoginHomeController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\Delivery\DeliveryController;
use App\Http\Controllers\Delivery\ShippingController;
use App\Http\Controllers\HomePage\PaymentController;
use App\Http\Controllers\HomePage\UserController;
use App\Http\Controllers\Order\OrderController;
use App\Http\Controllers\HomePage\HomeController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\Post\PostController;
use App\Http\Controllers\Product\BrandController;
use App\Http\Controllers\Product\ProductCategoryController;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\Resource\BannerController;
use App\Http\Controllers\Resource\CommentController;
use App\Http\Controllers\Resource\FavoriteController;
use App\Http\Controllers\Resource\ImageController;
use App\Http\Controllers\Resource\PostSavedController;
use App\Http\Controllers\Resource\TagController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\User\AdminController;
use App\Http\Controllers\User\MemberController;
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

/**
 *  Running Routes
 */
Route::get('/config-clear', function() {
    Artisan::call('config:clear');
    return 'Configuration cache cleared!';
});
Route::get('/config-cache', function() {
    Artisan::call('config:cache');
    return 'Configuration cache cleared! Configuration cached successfully!';
});
Route::get('/cache-clear', function() {
    Artisan::call('cache:clear');
    return 'Application cache cleared!';
});
Route::get('/view-cache', function() {
    Artisan::call('view:cache');
    return 'Compiled views cleared! Blade templates cached successfully!';
});
Route::get('/view-clear', function() {
    Artisan::call('view:clear');
    return 'Compiled views cleared!';
});
Route::get('/route-cache', function() {
    Artisan::call('route:cache');
    return 'Route cache cleared! Routes cached successfully!';
});
Route::get('/route-clear', function() {
    Artisan::call('route:clear');
    return 'Route cache cleared!';
});
Route::get('/storage-link', function() {
    Artisan::call('storage:link');
    return 'The links have been created.';
});

/**
 * Verification email Routes
 */
Auth::routes(['verify' => true]);
Route::post('/email/verify', [VerificationController::class, 'show']);
Route::get('/email/verify/{id}/{hash}', [VerificationController::class, 'verify'])->name('verification.verify');
Route::post('/email/resend', [VerificationController::class, 'resend'])->name('verification.resend');
Route::get('/email/register', [VerificationController::class, 'register'])->name('verification.register')->middleware('signed');

/**
 * Password forgot Routes
 */
Route::get('/password/forgot', [ForgotPasswordController::class, 'index'])->name('password.forgot');
Route::post('/customer/verify', [ForgotPasswordController::class, 'verify'])->name('password.verify');
Route::get('/password/reset', [ForgotPasswordController::class, 'reset'])->name('password.res3t')->middleware('signed');
Route::post('/password/change', [ForgotPasswordController::class, 'change'])->name('password.change');

/**
 * Home page Routes
 */
Route::get('/', [HomeController::class, 'index']);
Route::get('/home', [HomeController::class, 'index']);
Route::get('/login', [LoginHomeController::class, 'loginHome'])->name('loginHome');
Route::post('login', [LoginController::class, 'loginHome']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');
Route::post('signup', [RegisterController::class, 'signupHome'])->name('signup');

/**
 * Product page Routes
 */
Route::get('/product', [\App\Http\Controllers\HomePage\ProductController::class, 'products']);
Route::get('/product-by-brand/{brand}', [\App\Http\Controllers\HomePage\ProductController::class, 'productByBrand']);
Route::get('/product-by-category/{category}', [\App\Http\Controllers\HomePage\ProductController::class, 'productByCategory']);
Route::get('/product-detail/{id}', [\App\Http\Controllers\HomePage\ProductController::class, 'productDetail']);
Route::get('/search-product', [\App\Http\Controllers\HomePage\ProductController::class, 'searchProduct']);

/**
 * Post page Routes
 */
Route::get('/post', [\App\Http\Controllers\HomePage\PostController::class, 'post']);
Route::get('/post-detail/{id}', [\App\Http\Controllers\HomePage\PostController::class, 'postDetail']);
Route::get('/search-post', [\App\Http\Controllers\HomePage\PostController::class, 'searchPost']);

/**
 * Cart function Routes
 */
Route::post('/add-cart', [\App\Http\Controllers\HomePage\OrderController::class, 'addToCart']);
Route::delete('/remove-cart', [\App\Http\Controllers\HomePage\OrderController::class, 'removeFromCart']);

Route::middleware('auth:customer')->group(function () {
    /**
     * Cart function Routes
     */
    Route::get('/my-cart', [\App\Http\Controllers\HomePage\OrderController::class, 'index']);
    Route::post('/update-cart', [\App\Http\Controllers\HomePage\OrderController::class, 'updateCart']);
    Route::post('/product-selected-checkout', [\App\Http\Controllers\HomePage\OrderController::class, 'productSelectedCheckout']);

    /**
     * Checkout function Routes
     */
    Route::get('/checkout', [\App\Http\Controllers\HomePage\OrderController::class, 'checkout']);
    Route::post('/update-checkout', [\App\Http\Controllers\HomePage\OrderController::class, 'updateCheckout']);
    Route::delete('/remove-checkout', [\App\Http\Controllers\HomePage\OrderController::class, 'removeFromCheckout']);
    Route::post('/checkout-action', [\App\Http\Controllers\HomePage\OrderController::class, 'checkoutAction']);
    Route::get('/finish-payment', [\App\Http\Controllers\HomePage\OrderController::class, 'finishPayment']);

    /**
     * Order feature Routes
     */
    Route::get('/order-status', [\App\Http\Controllers\HomePage\OrderController::class, 'orderStatus']);
    Route::patch('/order/edit/{order}', [\App\Http\Controllers\HomePage\OrderController::class, 'edit']);

    /**
     * Other payment Routes
     */
    Route::post('/vnpay-payment', [PaymentController::class, 'vnpayPayment']);
    Route::post('/momo-payment', [PaymentController::class, 'momoPayment']);
    Route::post('/onepay-payment', [PaymentController::class, 'onepayPayment']);

    /**
     * Customer profile function Routes
     */
    Route::get('/customer-profile', [UserController::class, 'index']);
    Route::patch('/update-customer-profile/{id}', [UserController::class, 'updateCustomer']);

    /**
     * Favorite function Routes
     */
    Route::post('add-favorite', [FavoriteController::class, 'store']);
    Route::patch('update-favorite/{favorite}', [FavoriteController::class, 'edit']);

    /**
     * Saved post function Routes
     */
    Route::get('/saved-post', [PostSavedController::class, 'list']);
    Route::post('save-post', [PostSavedController::class, 'store']);
    Route::patch('unsave-post/{post}', [PostSavedController::class, 'edit']);
});

/**
 * Login dashboard Routes
 */
Route::prefix('dashboard')->group(function () {
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [LoginController::class, 'loginDashboard']);
});

Route::middleware('auth:member')->prefix('dashboard')->group(function () {
    /**
     * Dashboard home Routes
     */
    Route::get('/home', function () {
        return view('dashboard-pages.main');
    });


    Route::get('admin/new', [AdminController::class, 'new']);
    Route::post('admin/profile/update', [AdminController::class, 'updateProfile'])->name('profile-update');
    Route::get('admin/change-password', [AdminController::class, 'password'])->name('change-pass');
    Route::post('admin/change-password', [AdminController::class, 'changePassword'])->name('update-pass');

    Route::get('member', [MemberController::class, 'list'])
        ->name('member')
        ->middleware(['checkManagerPermission:VIEW_MEMBER']);
    Route::get('member/detail', [MemberController::class, 'detail'])
        ->name('member.detail')
        ->middleware(['checkManagerPermission:VIEW_MEMBER']);
    Route::post('member/store', [MemberController::class, 'store'])
        ->name('member.store')
        ->middleware(['checkManagerPermission:CREAT_MEMBER']);
    Route::post('member/edit/{member}', [MemberController::class, 'edit'])
        ->name('member.edit')
        ->middleware(['checkManagerPermission:EDIT_MEMBER']);
    Route::delete('member/delete/{member}', [MemberController::class, 'delete'])
        ->name('member.delete')
        ->middleware(['checkManagerPermission:DELETE_MEMBER']);


    Route::get('role', [RoleController::class, 'list'])
        ->name('role')
        ->middleware(['checkManagerPermission:VIEW_ROLE']);
    Route::get('role/detail/{role}', [RoleController::class, 'detail'])
        ->name('role.detail')
        ->middleware(['checkManagerPermission:VIEW_ROLE']);
    Route::post('role/store', [RoleController::class, 'store'])
        ->name('role.store')
        ->middleware(['checkManagerPermission:CREATE_ROLE']);
    Route::post('role/edit/{role}', [RoleController::class, 'edit'])
        ->name('role.edit')
        ->middleware(['checkManagerPermission:EDIT_ROLE']);
    Route::delete('role/delete/{role}', [RoleController::class, 'delete'])
        ->name('role.delete')
        ->middleware(['checkManagerPermission:DELETE_ROLE']);


    Route::get('permission', [PermissionController::class, 'list'])
        ->name('permission')
        ->middleware(['checkManagerPermission:VIEW_PERMISSION']);
    Route::get('permission/detail/{permission}', [PermissionController::class, 'detail'])
        ->name('permission.show')
        ->middleware(['checkManagerPermission:SHOW_PERMISSION']);
    Route::post('permission/store', [PermissionController::class, 'store'])
        ->name('permission.store')
        ->middleware(['checkManagerPermission:CREATE_PERMISSION']);
    Route::post('permission/edit/{permission}', [PermissionController::class, 'edit'])
        ->name('permission.edit')
        ->middleware(['checkManagerPermission:EDIT_PERMISSION']);
    Route::delete('permission/delete/{permission}', [PermissionController::class, 'delete'])
        ->name('permission.delete')
        ->middleware(['checkManagerPermission:DELETE_PERMISSION']);


    Route::get('brand', [BrandController::class, 'list'])
        ->name('brand')
        ->middleware(['checkManagerPermission:VIEW_BRAND']);
    Route::post('brand/store', [BrandController::class, 'store'])
        ->name('brand.store')
        ->middleware(['checkManagerPermission:CREATE_BRAND']);
    Route::patch('brand/edit/{brand}', [BrandController::class, 'edit'])
        ->name('brand.edit')
        ->middleware(['checkManagerPermission:EDIT_BRAND']);
    Route::delete('brand/delete/{brand}', [BrandController::class, 'delete'])
        ->name('brand.delete')
        ->middleware(['checkManagerPermission:DELETE_BRAND']);


    Route::get('product_category', [ProductCategoryController::class, 'list'])
        ->name('product_category')
        ->middleware(['checkManagerPermission:VIEW_PRODUCT_CATEGORY']);
    Route::post('product_category/store', [ProductCategoryController::class, 'store'])
        ->name('product_category.store')
        ->middleware(['checkManagerPermission:CREATE_PRODUCT_CATEGORY']);
    Route::patch('product_category/edit/{product_category}', [ProductCategoryController::class, 'edit'])
        ->name('product_category.edit')
        ->middleware(['checkManagerPermission:EDIT_PRODUCT_CATEGORY']);
    Route::delete('product_category/delete/{product_category}', [ProductCategoryController::class, 'delete'])
        ->name('product_category.delete')
        ->middleware(['checkManagerPermission:DELETE_PRODUCT_CATEGORY']);


    Route::get('product', [ProductController::class, 'list'])
        ->name('product')
        ->middleware(['checkManagerPermission:VIEW_PRODUCT']);
    Route::post('product/store', [ProductController::class, 'store'])
        ->name('product.store')
        ->middleware(['checkManagerPermission:CREATE_PRODUCT']);
    Route::patch('product/edit/{product}', [ProductController::class, 'edit'])
        ->name('product.edit')
        ->middleware(['checkManagerPermission:EDIT_PRODUCT']);
    Route::delete('product/delete/{product}', [ProductController::class, 'delete'])
        ->name('product.delete')
        ->middleware(['checkManagerPermission:DELETE_PRODUCT']);


    Route::get('delivery', [DeliveryController::class, 'list'])
        ->name('delivery')
        ->middleware(['checkManagerPermission:VIEW_DELIVERY']);
    Route::post('delivery/store', [DeliveryController::class, 'store'])
        ->name('delivery.store')
        ->middleware(['checkManagerPermission:CREATE_DELIVERY']);
    Route::patch('delivery/edit/{delivery}', [DeliveryController::class, 'edit'])
        ->name('delivery.edit')
        ->middleware(['checkManagerPermission:EDIT_DELIVERY']);
    Route::delete('delivery/delete/{delivery}', [DeliveryController::class, 'delete'])
        ->name('delivery.delete')
        ->middleware(['checkManagerPermission:DELETE_DELIVERY']);


    Route::get('shipping', [ShippingController::class, 'list'])
        ->name('shipping')
        ->middleware(['checkManagerPermission:VIEW_SHIPPING']);
    Route::post('shipping/store', [ShippingController::class, 'store'])
        ->name('shipping.store')
        ->middleware(['checkManagerPermission:CREATE_SHIPPING']);
    Route::patch('shipping/edit/{shipping}', [ShippingController::class, 'edit'])
        ->name('shipping.edit')
        ->middleware(['checkManagerPermission:EDIT_SHIPPING']);
    Route::delete('shipping/delete/{shipping}', [ShippingController::class, 'delete'])
        ->name('shipping.delete')
        ->middleware(['checkManagerPermission:DELETE_SHIPPING']);


    Route::get('order', [OrderController::class, 'list'])
        ->name('order')
        ->middleware(['checkManagerPermission:VIEW_ORDER']);
    Route::patch('order/edit/{order}', [OrderController::class, 'edit'])
        ->name('order.edit')
        ->middleware(['checkManagerPermission:EDIT_ORDER']);


    Route::get('post', [PostController::class, 'list'])
        ->name('post')
        ->middleware(['checkManagerPermission:VIEW_NEWS']);
    Route::post('post/store', [PostController::class, 'store'])
        ->name('post.store')
        ->middleware(['checkManagerPermission:VIEW_POST']);
    Route::patch('post/edit/{post}', [PostController::class, 'edit'])
        ->name('post.edit')
        ->middleware(['checkManagerPermission:EDIT_POST']);
    Route::delete('post/delete/{post}', [PostController::class, 'delete'])
        ->name('post.delete')
        ->middleware(['checkManagerPermission:DELETE_POST']);


    Route::get('banner', [BannerController::class, 'list'])
        ->name('banner')
        ->middleware(['checkManagerPermission:VIEW_BANNER']);
    Route::post('banner/store', [BannerController::class, 'store'])
        ->name('banner.store')
        ->middleware(['checkManagerPermission:CREATE_BANNER']);
    Route::patch('banner/edit/{banner}', [BannerController::class, 'edit'])
        ->name('banner.edit')
        ->middleware(['checkManagerPermission:EDIT_BANNER']);
    Route::delete('banner/delete/{banner}', [BannerController::class, 'delete'])
        ->name('banner.delete')
        ->middleware(['checkManagerPermission:DELETE_BANNER']);


    Route::get('comment', [CommentController::class, 'list'])
        ->name('comment')
        ->middleware(['checkManagerPermission:VIEW_COMMENT']);
    Route::get('comment/detail/{comment}', [CommentController::class, 'detail'])
        ->name('comment.detail')
        ->middleware(['checkManagerPermission:VIEW_COMMENT']);
    Route::delete('comment/delete/{comment}', [CommentController::class, 'delete'])
        ->name('comment.delete')
        ->middleware(['checkManagerPermission:DELETE_COMMENT']);


    Route::get('favorite', [FavoriteController::class, 'list'])
        ->name('favorite')
        ->middleware(['checkManagerPermission:VIEW_FAVORITE']);


    Route::get('image', [ImageController::class, 'list'])
        ->name('image')
        ->middleware(['checkManagerPermission:VIEW_IMAGE']);
    Route::post('image/store', [ImageController::class, 'store'])
        ->name('image.store')
        ->middleware(['checkManagerPermission:CREATE_IMAGE']);
    Route::patch('image/edit/{image}', [ImageController::class, 'edit'])
        ->name('image.edit')
        ->middleware(['checkManagerPermission:EDIT_IMAGE']);
    Route::delete('image/delete/{image}', [ImageController::class, 'delete'])
        ->name('image.delete')
        ->middleware(['checkManagerPermission:DELETE_IMAGE']);


    Route::get('tag', [TagController::class, 'list'])
        ->name('tag')
        ->middleware(['checkManagerPermission:VIEW_TAG']);
    Route::post('tag/store', [TagController::class, 'store'])
        ->name('tag.store')
        ->middleware(['checkManagerPermission:CREATE_TAG']);
    Route::patch('tag/edit/{tag}', [TagController::class, 'edit'])
        ->name('tag.edit')
        ->middleware(['checkManagerPermission:EDIT_TAG']);
    Route::delete('tag/delete/{tag}', [TagController::class, 'delete'])
        ->name('tag.delete')
        ->middleware(['checkManagerPermission:DELETE_TAG']);
});
