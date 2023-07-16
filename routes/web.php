<?php


use App\Http\Controllers\Messages;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TopicsController;
use App\Http\Controllers\UpdateController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\IssueReportsController;
use App\Http\Controllers\InvoceManagerController;
use App\Http\Controllers\SubscriptionsController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\Profile\ProfileController;
use App\Http\Controllers\TechnicalReportingController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

Route::get('/test', function () {
    return 'Hello, Successful';
});

Route::post('/test', function () {
    return 'Hello, Successful';
});


Route::get('/', function () {
    return view('dashboard');
});

Route::get('/login', function () {
    return view('login');
});


// Route::get("/settings",function () {
//     return view('settings');
// });

Route::get("/subscriptions",function () {
    return view('subscriptions');
});

Route::get("/account",function () {
    return view('account');
});

Route::get("/updates",function () {
    return view('updates');
});

Route::get("/issuereporting",function () {
    return view('issuereporting');
});

Route::get("/technicalreporting",function () {
    return view('technicalreporting');
});

Route::get("/topics",function () {
    return view('topics');
});

Route::get("/products",function () {
    return view('products');
});

Route::get("/productscategory",function () {
    return view('productsCategory');
});

Route::get("/messages",function () {
    return view('messages');
});

Route::get("/invoicesmanager",function () {
    return view('invoicesManager');
});

// Protected routes that require authentication
Route::group(['middleware' => 'auth'], function () {
    // Your protected routes go here
    Route::get('/settings', [SettingController::class,"show"])->name("show_setting");
    Route::post('/settings', [SettingController::class,"update"])->name("update_setting");
    Route::post('/updateCustomerSarfasl', [SettingController::class,"updateCustomerSarfasl"])->name("updateCustomerSarfasl_setting");


    Route::get('/updates', [UpdateController::class,"index"])->name("index_updates");
    Route::get('/updates/updateAllProductFromHolooToWC', [UpdateController::class,"updateAllProductFromHolooToWC"])->name("updateAllProductFromHolooToWC");
    Route::get('/updates/wcAddAllHolooProductsCategory', [UpdateController::class,"wcAddAllHolooProductsCategory"])->name("wcAddAllHolooProductsCategory");
    Route::get('/updates/getProductCategory', [UpdateController::class,"getProductCategory"])->name("getProductCategory");


    Route::get('/productscategory', [ProductCategoryController::class,"show"])->name("show_productscategory");
    Route::post('/productscategory', [ProductCategoryController::class,"update"])->name("update_productscategory");


    Route::get('/topics', [TopicsController::class,"show"])->name("show_topics");
    Route::post('/topics', [TopicsController::class,"update"])->name("update_topics");


    Route::get('/technicalreporting', [TechnicalReportingController::class,"index"])->name("technicalreporting.index");
    Route::get('/technicalreporting/sendWebhook/{id}', [TechnicalReportingController::class,"sendWebhook"])->name("technicalreporting.sendWebhook");


    Route::get('/subscriptions', [SubscriptionsController::class,"show"])->name("subscriptions.show");


    Route::get('/issuereporting', [IssueReportsController::class,"show"])->name("issuereporting.show");


    Route::get('/account', [ProfileController::class,"show"])->name("profile.show");
    Route::post('/profile', [ProfileController::class,"update"])->name("profile.update");


    Route::get('/products/{id}', [ProductController::class,"getHoloProductList"])->name("products.getHoloProductList");
    Route::post('/products/batch', [ProductController::class,"addProducts"])->name("products.addProducts");
    Route::get('/products', [ProductController::class,"index"])->name("products.index");
    Route::post('/products', [ProductController::class,"addProduct"])->name("products.addProduct");


    Route::get('/invoices/{date}', [InvoceManagerController::class,"index"])->name("invoicesmanager.index");
    Route::post('/invoices/batch', [InvoceManagerController::class,"addInvoices"])->name("invoicesmanager.addInvoices");
    Route::post('/invoices', [InvoceManagerController::class,"addInvoice"])->name("invoicesmanager.addInvoice");
    Route::post('/invoicesActive', [InvoceManagerController::class,"invoicesActive"])->name("invoicesmanager.invoicesActive");
    Route::get('/invoicesmanager', [InvoceManagerController::class,"show"])->name("invoicesmanager.show");

    Route::get('/messages', [Messages::class,"show"])->name("messages.show");
    Route::get('/message', [Messages::class,"index"])->name("message.index");

    Route::get('/', [DashboardController::class,"show"])->name("home");
});

Route::get('/updateapp', function()
{
    \Artisan::call('dump-autoload');
    echo 'dump-autoload complete';
});

Route::get('/login', [LoginController::class,"show"])->name("show_login");
Route::post('/login', [LoginController::class,"login"])->name("login");
Route::get('/logout', [LoginController::class,"logout"])->name("logout");


