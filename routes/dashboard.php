<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ActivityLogController;
use App\Http\Controllers\Dashboard\AjaxController;
use App\Http\Controllers\Dashboard\AuthController;
use App\Http\Controllers\Dashboard\CityController;
use App\Http\Controllers\Dashboard\HomeController;
use App\Http\Controllers\Dashboard\PageController;
use App\Http\Controllers\Dashboard\RoleController;
use App\Http\Controllers\Dashboard\SizeController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\Dashboard\BrandController;
use App\Http\Controllers\Dashboard\ColorController;
use App\Http\Controllers\Dashboard\OrderController;
use App\Http\Controllers\Dashboard\CouponController;
use App\Http\Controllers\Dashboard\RegionController;
use App\Http\Controllers\Dashboard\ReviewController;
use App\Http\Controllers\Dashboard\AddressController;
use App\Http\Controllers\Dashboard\ContactController;
use App\Http\Controllers\Dashboard\PaymentController;
use App\Http\Controllers\Dashboard\ProductController;
use App\Http\Controllers\Dashboard\ProfileController;
use App\Http\Controllers\Dashboard\SettingController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\FavoriteController;
use App\Http\Controllers\Dashboard\DeliveryTimeController;
use App\Http\Controllers\Dashboard\NotificationController;

Route::get('login', [AuthController::class, 'viewLogin'])->name('login.view')->withoutMiddleware(['admin', 'check.permission']);
Route::post('login', [AuthController::class, 'login'])->name('login.login')->withoutMiddleware(['admin', 'check.permission']);
Route::get('/unauthorized', function () {
    return view('admin.unauthorized');
})->name('unauthorized')->withoutMiddleware(['admin']);

Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');
Route::resource('roles', RoleController::class);
Route::group(['prefix' => 'profile'], function () {
    Route::get('index', [ProfileController::class, 'index'])->name('profile.index');
    Route::post('update', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('change_password', [ProfileController::class, 'changePassword'])->name('profile.security');
    Route::post('update_password', [ProfileController::class, 'updatePassword'])->name('profile.update.password');
    Route::get('change_lang/{lang}', [ProfileController::class, 'changeLang'])->name('profile.change.lang');
    Route::get('change_theme/{theme}', [ProfileController::class, 'changeTheme'])->name('profile.change.theme');
    Route::get('delete_account', [ProfileController::class, 'deleteAccount'])->name('profile.delete.account');
});
Route::fallback(function () {
    return view('admin.404');
});
Route::resource('categories', CategoryController::class);
Route::delete('categories/forceDelete/{category}', [CategoryController::class, 'forceDelete'])->name('categories.forceDelete');
Route::get('categories/restore/{category}', [CategoryController::class, 'restore'])->name('categories.restore');

Route::resource('sizes', SizeController::class);
Route::delete('sizes/forceDelete/{size}', [SizeController::class, 'forceDelete'])->name('sizes.forceDelete');
Route::get('sizes/restore/{size}', [SizeController::class, 'restore'])->name('sizes.restore');

Route::resource('cities', CityController::class);
Route::delete('cities/forceDelete/{city}', [CityController::class, 'forceDelete'])->name('cities.forceDelete');
Route::get('cities/restore/{city}', [CityController::class, 'restore'])->name('cities.restore');

Route::resource('regions', RegionController::class);
Route::delete('regions/forceDelete/{size}', [RegionController::class, 'forceDelete'])->name('regions.forceDelete');
Route::get('regions/restore/{size}', [RegionController::class, 'restore'])->name('regions.restore');

Route::resource('pages', PageController::class);
Route::delete('pages/forceDelete/{page}', [PageController::class, 'forceDelete'])->name('pages.forceDelete');
Route::get('pages/restore/{page}', [PageController::class, 'restore'])->name('pages.restore');

Route::resource('users', UserController::class);
Route::delete('users/forceDelete/{user}', [UserController::class, 'forceDelete'])->name('users.forceDelete');
Route::get('users/restore/{user}', [UserController::class, 'restore'])->name('users.restore');

Route::resource('brands', BrandController::class);
Route::delete('brands/forceDelete/{brand}', [BrandController::class, 'forceDelete'])->name('brands.forceDelete');
Route::get('brands/restore/{brand}', [BrandController::class, 'restore'])->name('brands.restore');

Route::resource('contacts', ContactController::class)->except('create', 'store', 'destroy');
Route::post("messages/send/{contact}", [ContactController::class, "sendMessage"])->name("contacts.sendMessage");

Route::resource('products', ProductController::class);

Route::resource('settings', SettingController::class)->only('index', 'update');

Route::resource('payments', PaymentController::class);
Route::delete('payments/forceDelete/{payment}', [PaymentController::class, 'forceDelete'])->name('payments.forceDelete');
Route::get('payments/restore/{payment}', [PaymentController::class, 'restore'])->name('payments.restore');

Route::resource("reviews", ReviewController::class);
Route::delete('reviews/forceDelete/{review}', [ReviewController::class, 'forceDelete'])->name('reviews.forceDelete');
Route::get('reviews/restore/{review}', [ReviewController::class, 'restore'])->name('reviews.restore');

Route::resource('activity_logs', ActivityLogController::class);

Route::get("favorites", [FavoriteController::class, "index"])->name("favorites.index");

Route::resource("coupons", CouponController::class);
Route::delete('coupons/forceDelete/{coupon}', [CouponController::class, 'forceDelete'])->name('coupons.forceDelete');
Route::get('coupons/restore/{coupon}', [CouponController::class, 'restore'])->name('coupons.restore');

Route::resource("colors", ColorController::class);

Route::resource("delivery_times", DeliveryTimeController::class);
Route::delete('delivery_times/forceDelete/{delivery_time}', [DeliveryTimeController::class, 'forceDelete'])->name('delivery_times.forceDelete');
Route::get('delivery_times/restore/{delivery_time}', [DeliveryTimeController::class, 'restore'])->name('delivery_times.restore');

Route::resource("addresses", AddressController::class);
Route::delete('addresses/forceDelete/{address}', [AddressController::class, 'forceDelete'])->name('addresses.forceDelete');
Route::get('addresses/restore/{address}', [AddressController::class, 'restore'])->name('addresses.restore');

Route::resource("orders", OrderController::class)->only('index', 'show');

Route::resource('notifications', NotificationController::class)->only(['index', 'create', 'store', 'show']);
Route::get('notifications/mark_as_read/{id}', [NotificationController::class, 'markAsRead']);

Route::get('categories/active/{category}', [AjaxController::class, 'categoryActive'])->name('categories.active');
Route::get('sizes/active/{size}', [AjaxController::class, 'sizeActive'])->name('sizes.active');
Route::get('cities/active/{city}', [AjaxController::class, 'cityActive'])->name('cities.active');
Route::get('regions/active/{region}', [AjaxController::class, 'regionActive'])->name('regions.active');
Route::get('pages/active/{page}', [AjaxController::class, 'pageActive'])->name('pages.active');
Route::get('reviews/active/{review}', [AjaxController::class, 'reviewActive'])->name('reviews.active');
Route::get('brands/active/{brand}', [AjaxController::class, 'brandActive'])->name('brands.active');
Route::get('contacts/active/{contact}', [AjaxController::class, 'contactActive'])->name('contacts.active');
Route::get('payments/active/{payment}', [AjaxController::class, 'paymentActive'])->name('payments.active');
Route::get('users/active/{user}', [AjaxController::class, 'userActive'])->name('users.active');
Route::get('colors/active/{color}', [AjaxController::class, 'colorActive'])->name('colors.active');

Route::get('contacts/seen/{contact}', [AjaxController::class, 'seen'])->name('contacts.seen');

Route::get('products/active/{product}', [AjaxController::class, 'productActive'])->name('products.active');

Route::get('coupons/active/{coupon}', [AjaxController::class, 'couponActive'])->name('coupons.active');
Route::get('delivery_times/active/{delivery_time}', [AjaxController::class, 'deliveryTimeActive'])->name('delivery_times.active');

Route::get('products/feature/{product}', [AjaxController::class, 'feature'])->name('products.feature');
Route::get('products/returned/{product}', [AjaxController::class, 'returned'])->name('products.is_returned');
    Route::post('orders/change_status/{order}', [AjaxController::class, 'changeStatus'])->name('orders.change_status');