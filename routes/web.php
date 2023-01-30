<?php
use App\Models\User;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\UsersController;

// use App\Http\Controllers\uController;


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

// *****Auth*****
// Registration
Route::get('registration', 'Auth\registerController@create')->name('registration');
Route::post('registration','Auth\registerController@store')->name('registration.confirm');
// Login
Route::get('login','Auth\loginController@index')->name('login');
Route::post('login','Auth\loginController@authenticate')->name('login.confirm');



// Middleware authentication
Route::group(['middleware' => 'auth'], function() {


Route::get('/','DashboardController@index');
Route::get('dashboard','DashboardController@index');
//User Routes
Route::resource('users','UsersController');
//Groups Routes
Route::resource('groups','UsersGroupController',['except'=>['show'] ] );
// Logout
Route::get('logout','Auth\loginController@logout')->name('logout');
// Categories Route
Route::resource('categories','Product_Cat_Controller')->except(['show']);
// Products Route
Route::resource('products','ProductsController');
// Products Stocks Route
Route::get('stocks','ProductsStocksController@index')->name('stocks');

// Users Others Route
// Purchases Route
Route::get('users/{id}/purchases','UsersPurchasesController@index')->name('user.purchases');
Route::post('users/{id}/purchases/invoice','UsersPurchasesController@store')->name('user.purchases.invoice.store');
Route::get('users/{id}/purchases/invoice/{invoice_id}', 'UsersPurchasesController@invoiceShow')->name('user.purchases.invoice.invoiceShow');
Route::delete('users/{id}/purchases/invoice/{invoice_id}/','UsersPurchasesController@destroy')->name('user.purchases.invoice.destroy');

// PurchaseInvoiceItem
Route::post('users/{id}/purchases/invoice/{invoice_id}','UsersPurchasesController@createInvoiceItem')->name('user.purchases.invoice.createInvoiceItem');
Route::delete('users/{id}/purchases/invoice/{invoice_id}/{item_id}','UsersPurchasesController@destroyItem')->name('user.purchases.invoice.destroyItem');
// Invoice to Purchases Route ... (Payment Route Same)
// Route::post('users/{id}/payment/{invoice_id?}','UsersPurchasesController@store')->name('user.payments.store');


// Payment Route
Route::get('users/{id}/payment', 'UsersPaymentsController@index')->name('user.payments');
Route::post('users/{id}/payment/{invoice_id?}', 'UsersPaymentsController@store')->name('user.payments.store');
Route::delete('users/{id}/payment/{payment_id}', 'UsersPaymentsController@destroy')->name('user.payments.destroy');

// Receipts Route
Route::get('users/{id}/receipts','UsersReceiptsController@index')->name('user.receipts');
Route::post('users/{id}/receipts','UsersReceiptsController@store')->name('user.receipts.store');
Route::delete('users/{id}/receipts/{receipt_id}','UsersReceiptsController@destroy')->name('user.receipts.destroy');

// Sales Route
Route::get('users/{id}/sales','UsersSalesController@index')->name('user.sales');
Route::post('users/{id}/sales/invoice','UsersSalesController@createInvoice')->name('user.sales.invoice.store');
Route::get('users/{id}/sales/invoice/{invoice_id}', 'UsersSalesController@show')->name('user.sales.invoice.show');
Route::delete('users/{id}/sales/invoice/{invoice_id}/','UsersSalesController@destroy')->name('user.sales.invoice.destroy');

// SalesInvoiceItem
Route::post('users/{id}/sales/invoice/{invoice_id}','UsersSalesController@createInvoiceItem')->name('user.sales.invoice.addItem');
Route::delete('users/{id}/sales/invoice/{invoice_id}/{item_id}','UsersSalesController@destroyItem')->name('user.sales.invoice.destroyItem');
// Invoice to Receipts Route ... (Receipt Route Same)
Route::post('users/{id}/receipts/{invoice_id?}','UsersReceiptsController@store')->name('user.receipts.store');

// Reports Route
// Single User Reports
Route::get('users/{id}/reports','UsersReportsController@index')->name('users.reports');

// All Users Reports
Route::get('reports', function () { return redirect('dashboard'); });

Route::get('reports/dailyReports','Reports\DailyReportsController@index')   ->name('reports.dailyReports');
Route::get('reports/sales','Reports\SalesReportController@index')           ->name('reports.sales');
Route::get('reports/purchases','Reports\PurchaseReportsController@index')   ->name('reports.purchases');
Route::get('reports/payments','Reports\PaymentsReportsController@index')    ->name('reports.payments');
Route::get('reports/receipts','Reports\ReceiptsReportsController@index')    ->name('reports.receipts');




});
