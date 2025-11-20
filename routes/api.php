<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CartController;
use App\Http\Controllers\Api\HomeController;
use App\Http\Controllers\Api\PageController;
use App\Http\Controllers\Api\ReasonController;
use App\Http\Controllers\Api\RegionController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\FavoriteController;
use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\CityController;
use App\Http\Controllers\Api\DeliveryTimeController;
use App\Http\Controllers\Api\NotificationController;
use App\Http\Controllers\Api\CouponController;
use App\Http\Controllers\Api\Auth\PasswordController;

Route::group(['middleware' => ['userLangApi', 'site-open']], function () {
  Route::get('home', [HomeController::class, 'index']);
  Route::apiResource('categories', CategoryController::class)->only(['index', 'show']);
  Route::apiResource('products', ProductController::class)->only(['index', 'show']);
  Route::apiResource('cities', CityController::class)->only(['index', 'show']);
  Route::apiResource('regions', RegionController::class)->only(['index', 'show']);
  Route::apiResource('reasons', ReasonController::class)->only(['index', 'show']);
  Route::apiResource('delivery_times', DeliveryTimeController::class)->only(['index', 'show']);
  Route::apiResource('pages', PageController::class)->only(['index', 'show']);
  Route::apiResource('coupons', CouponController::class)->only(['index', 'show']);

  //auth
  Route::group(['prefix' => 'auth'], function () {
    Route::group(['prefix' => 'register'], function () {
      Route::post('check', [AuthController::class, 'check_register']);
      Route::post('/', [AuthController::class, 'register']);
    });
    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout'])->middleware('auth-api');
    Route::post('forget/password', [PasswordController::class, 'ForgetPassword']);
    Route::post('rest/password', [PasswordController::class, 'RestPassword']);
  });
  //end auth
  Route::group(['middleware' => ['auth-api']], function () {
    //favorites
    Route::get('favorites', [FavoriteController::class, 'index']);
    Route::post('favorites', [FavoriteController::class, 'toggle']);
    //end favorites
    //cart
    Route::apiResource('cart_items', CartController::class)->except(('update'));
    //end cart
    //notification
    Route::resource('notifications', NotificationController::class)->only(['index', 'destroy']);
    Route::put('notifications/read/{id}', [NotificationController::class, 'read']);
    Route::put('notifications/read-all', [NotificationController::class, 'readAll']);

    //read and read all should be in one func 

    //end notification
    //profile
    Route::group(['prefix' => 'profile'], function () {
      Route::get('/', [ProfileController::class, 'index']);
      Route::put('/', [ProfileController::class, 'update']);
      Route::group(['prefix' => 'change'], function () {
        Route::post('address', [ProfileController::class, 'changeAddress']);
        Route::post('password', [ProfileController::class, 'changePassword']);
        Route::post('image', [ProfileController::class, 'changeImage']);
        Route::post('available', [ProfileController::class, 'changeAvailable']);
        Route::post('theme', [ProfileController::class, 'changeTheme']);
        Route::post('lang', [ProfileController::class, 'changeLang']);
      });
    });

    //can be in one func 

    //end profile
  });
});
