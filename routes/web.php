<?php

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
use App\Http\Controllers\front\HomeController;
use App\Http\Controllers\front\ItemController as FrontItemController;
use App\Http\Controllers\front\CartController;
use App\Http\Controllers\front\FavoriteController;
use App\Http\Controllers\front\OrderController as FrontOrderController;
use App\Http\Controllers\front\UserController as FrontUserController;;
use App\Http\Controllers\front\RazorpayController;
use App\Http\Controllers\front\CheckoutController;
use App\Http\Controllers\front\PrivacyPolicyController as FrontPrivacyPolicyController;
use App\Http\Controllers\front\TermsController as FrontTermsController;
use App\Http\Controllers\front\AboutController as FrontAboutController;

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\SliderController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\ItemController;
use App\Http\Controllers\admin\PaymentController;
use App\Http\Controllers\admin\AddonsController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\OrderController;
use App\Http\Controllers\admin\RattingController;
use App\Http\Controllers\admin\PromocodeController;
use App\Http\Controllers\admin\PincodeController;
use App\Http\Controllers\admin\BannerController;
use App\Http\Controllers\admin\AboutController;
use App\Http\Controllers\admin\ContactController;
use App\Http\Controllers\admin\DriverController;
use App\Http\Controllers\admin\ReportController;
use App\Http\Controllers\admin\TimeController;
use App\Http\Controllers\admin\PrivacyPolicyController;
use App\Http\Controllers\admin\TermsController;
Auth::routes();

/*Route::get('auth/facebook', 'Auth\SocialController@redirectToFacebook');
Route::get('auth/facebook/callback', 'Auth\SocialController@handleFacebookCallback');

Route::get('auth/google', 'Auth\GoogleController@redirectToGoogle');
Route::get('auth/google/callback', 'Auth\GoogleController@handleGoogleCallback');

Route::post('auth', 'HomeController@auth');*/

Route::prefix('admin')->namespace('admin')->group(function (){

    Route::get('/', function () {
        return view('auth.login');
    });

    Route::middleware(['AdminAuth'])->group(function () {
        Route::get('home', [AdminController::class, 'home']);
        Route::post('changePassword', [AdminController::class, 'changePassword']);
        Route::post('settings', [AdminController::class, 'settings']);
        Route::get('getorder', [AdminController::class, 'getorder']);
        Route::get('clearnotification', [AdminController::class, 'clearnotification']);

        Route::get('slider', [SliderController::class, 'index']);
        Route::post('slider/store', [SliderController::class, 'store']);
        Route::get('slider/list', [SliderController::class, 'list']);
        Route::post('slider/show', [SliderController::class, 'show']);
        Route::post('slider/update', [SliderController::class, 'update']);
        Route::post('slider/destroy', [SliderController::class, 'destroy']);

        Route::get('category', [CategoryController::class, 'index']);
        Route::post('category/store', [CategoryController::class, 'store']);
        Route::get('category/list', [CategoryController::class, 'list']);
        Route::post('category/show', [CategoryController::class, 'show']);
        Route::post('category/update', [CategoryController::class, 'update']);
        Route::post('category/status', [CategoryController::class, 'status']);
        Route::post('category/delete', [CategoryController::class, 'delete']);

        Route::get('item', 'ItemController@index');
        Route::post('item/store', 'ItemController@store');
        Route::get('item/list', 'ItemController@list');
        Route::post('item/show', 'ItemController@show');
        Route::post('item/update', 'ItemController@update');
        Route::get('item-images/{id}', 'ItemController@itemimages');
        Route::post('item/showimage', 'ItemController@showimage');
        Route::post('item/updateimage', 'ItemController@updateimage');
        Route::get('item/itemimages', 'ItemController@itemimages');
        Route::post('item/storeimages', 'ItemController@storeimages');
        Route::post('item/storeingredientsimages', 'ItemController@storeingredientsimages');
        Route::post('item/destroyimage', 'ItemController@destroyimage');
        Route::post('item/destroyingredients', 'ItemController@destroyingredients');
        Route::post('item/updateingredients', 'ItemController@updateingredients');
        Route::post('item/showingredients', 'ItemController@showingredients');
        Route::post('item/status', 'ItemController@status');
        Route::post('item/delete', 'ItemController@delete');

        Route::get('payment', 'PaymentController@index');
        Route::post('payment/status', 'PaymentController@status');
        Route::get('manage-payment/{id}', 'PaymentController@managepayment');
        Route::post('payment/update', 'PaymentController@update');

        Route::get('addons', 'AddonsController@index');
        Route::post('addons/getitem', 'AddonsController@getitem');
        Route::post('addons/store', 'AddonsController@store');
        Route::get('addons/list', 'AddonsController@list');
        Route::post('addons/show', 'AddonsController@show');
        Route::post('addons/update', 'AddonsController@update');
        Route::post('addons/status', 'AddonsController@status');
        Route::post('addons/delete', 'AddonsController@delete');

        Route::get('users', 'UserController@index');
        Route::post('users/store', 'UserController@store');
        Route::get('users/list', 'UserController@list');
        Route::post('users/show', 'UserController@show');
        Route::post('users/update', 'UserController@update');
        Route::post('users/status', 'UserController@status');
        Route::get('user-details/{id}', 'UserController@userdetails');

        Route::get('orders', 'OrderController@index');
        Route::get('orders/list', 'OrderController@list');
        Route::get('invoice/{id}', 'OrderController@invoice');
        Route::post('orders/destroy', 'OrderController@destroy');
        Route::post('orders/update', 'OrderController@update');
        Route::post('orders/assign', 'OrderController@assign');

        Route::get('reviews', 'RattingController@index');
        Route::get('reviews/list', 'RattingController@list');
        Route::post('reviews/destroy', 'RattingController@destroy');

        Route::get('promocode', 'PromocodeController@index');
        Route::post('promocode/store', 'PromocodeController@store');
        Route::get('promocode/list', 'PromocodeController@list');
        Route::post('promocode/show', 'PromocodeController@show');
        Route::post('promocode/update', 'PromocodeController@update');
        Route::post('promocode/status', 'PromocodeController@status');

        Route::get('pincode', 'PincodeController@index');
        Route::post('pincode/store', 'PincodeController@store');
        Route::get('pincode/list', 'PincodeController@list');
        Route::post('pincode/show', 'PincodeController@show');
        Route::post('pincode/update', 'PincodeController@update');
        Route::post('pincode/destroy', 'PincodeController@destroy');

        Route::get('banner', 'BannerController@index');
        Route::post('banner/store', 'BannerController@store');
        Route::get('banner/list', 'BannerController@list');
        Route::post('banner/show', 'BannerController@show');
        Route::post('banner/update', 'BannerController@update');
        Route::post('banner/destroy', 'BannerController@destroy');

        Route::get('settings', 'AboutController@index');
        Route::post('about/update', 'AboutController@update');

        Route::get('contact', 'ContactController@index');

        Route::get('driver', 'DriverController@index');
        Route::post('driver/store', 'DriverController@store');
        Route::get('driver/list', 'DriverController@list');
        Route::post('driver/show', 'DriverController@show');
        Route::post('driver/update', 'DriverController@update');
        Route::post('driver/status', 'DriverController@status');

        Route::get('report', 'ReportController@index');
        Route::get('report/list', 'ReportController@list');
        Route::post('report/show', 'ReportController@show');
        Route::post('report/destroy', 'ReportController@destroy');
        Route::post('report/update', 'ReportController@update');
        Route::post('report/assign', 'ReportController@assign');

        Route::get('time', 'TimeController@index');
        Route::post('time/store', 'TimeController@store');
        Route::get('time/list', 'TimeController@list');
        Route::post('time/show', 'TimeController@show');
        Route::post('time/update', 'TimeController@update');
        Route::post('time/destroy', 'TimeController@destroy');

        Route::get('privacypolicy', 'PrivacyPolicyController@index');
        Route::post('privacypolicy/update', 'PrivacyPolicyController@update');

        Route::get('termscondition', 'TermsController@index');
        Route::post('termscondition/update', 'TermsController@update');
        

       

    });

    Route::get('logout', [AdminController::class, 'logout']);
});


Route::namespace('front')->group(function () {
    Route::get('/', [HomeController::class, 'index']);
    Route::get('/405', [HomeController::class, 'notallow']);
    Route::post('/home/contact', [HomeController::class, 'contact']);
    Route::post('/home/checkpincode', [HomeController::class, 'checkpincode']);

    Route::get('/product', [FrontItemController::class, 'index']);
    Route::get('/product-details/{id}', [FrontItemController::class, 'productdetails']);
    Route::get('/product/{id}', [FrontItemController::class, 'show']);
    Route::post('/product/favorite', [FrontItemController::class, 'favorite']);
    Route::post('/product/unfavorite', [FrontItemController::class, 'unfavorite']);
    Route::post('/product/addtocart', [FrontItemController::class, 'addtocart']);
    Route::get("/search", [FrontItemController::class, 'search']);

    Route::get('/cart', [CartController::class, 'index']);
    Route::post('/cart/qtyupdate', [CartController::class, 'qtyupdate']);
    Route::post('/cart/applypromocode', [CartController::class, 'applypromocode']);
    Route::post('/cart/deletecartitem', [CartController::class, 'deletecartitem']);
    Route::post('/cart/removepromocode', [CartController::class, 'removepromocode']);
    Route::get('/cart/isopenclose', [CartController::class, 'isopenclose']);

    Route::get('/favorite', [FavoriteController::class, 'index']);

    Route::get('/orders', [FrontOrderController::class, 'index']);
    Route::post('/orders/cashondelivery', [FrontOrderController::class, 'cashondelivery']);
    Route::post('/orders/walletorder', [FrontOrderController::class, 'walletorder']);
    Route::post('/order/ordercancel', [FrontOrderController::class, 'ordercancel']);
    Route::get('/order-details/{id}', [FrontOrderController::class, 'orderdetails']);

    Route::get('/signin', [FrontUserController::class, 'index']);
    Route::post('/signin/login', [FrontUserController::class, 'login']);
    Route::get('/logout', [FrontUserController::class, 'logout']);
    Route::get('/signup', [FrontUserController::class, 'signup']);
    Route::post('/signup/signup', [FrontUserController::class, 'register']);

    Route::get('/wallet', [FrontUserController::class, 'wallet']);

    Route::get('/forgot-password', [FrontUserController::class, 'forgot_password']);
    Route::post('/forgot-password/forgot-password', [FrontUserController::class, 'forgotpassword']);
    Route::post('/home/changePassword', [FrontUserController::class, 'changePassword']);
    Route::post('/home/addreview', [FrontUserController::class, 'addreview']);
    Route::get('/email-verify', [FrontUserController::class, 'email_verify']);
    Route::get('/resend-email', [FrontUserController::class, 'resend_email']);
    Route::post('/email-verification', [FrontUserController::class, 'email_verification']);
/*
    Route::get('/paywithrazorpay', [RazorpayController::class, 'payWithRazorpay'])->name('paywithrazorpay');
    Route::post('/payment', [RazorpayController::class, 'payment'])->name('payment');
*/
    Route::post('stripe-payment/charge', [CheckoutController::class, 'charge']);

    Route::get('/privacypolicy', [FrontPrivacyPolicyController::class, 'index']);
    Route::get('/privacy', [FrontPrivacyPolicyController::class, 'privacy']);

    Route::get('/termscondition', [FrontTermsController::class, 'index']);
    Route::get('/terms', [FrontTermsController::class, 'terms']);

    Route::get('/aboutus', [FrontAboutController::class, 'index']);
    Route::get('/about', [FrontAboutController::class, 'about']);
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
