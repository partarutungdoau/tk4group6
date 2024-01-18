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
Route::group(['middleware' => ['isLogin']], function(){

});

//AUTHENTICATION
Route::get('/login', 'AuthenticationController@loginPage');
Route::get('/register','AuthenticationController@registerPage');
Route::post('/attemp-login','AuthenticationController@attemplogin')->name('login-process');
Route::post('/attemp-register','AuthenticationController@attempregister');
Route::get('/logout','AuthenticationController@logout');
Route::get('/reset-password','AuthenticationController@resetpasswordPage');
Route::get('/new-password','AuthenticationController@newpasswordPage');



Route::group(['middleware' => ['isAdmin']], function(){
//DASHBOARD
Route::get('/', 'DashboardController@index');
Route::get('/summary', 'DashboardController@summary');
//USER
Route::get('/user','UserController@index');
Route::post('/user','UserController@create')->name('createuser');
Route::get('/listuser','UserController@list');
Route::get('/user/{id}','UserController@detail');
Route::post('/user/{id}','UserController@edit');
Route::delete('/user/{id}','UserController@delete');
Route::post('/massdeleteuser','UserController@deletemulti')->name('massdeleteuser');

//DISCOUNT
Route::get('/discount','DiscountController@index');
Route::post('/discount','DiscountController@create')->name('creatediscount');
Route::get('/listdiscount','DiscountController@list');
Route::get('/discount/{id}','DiscountController@detail');
Route::post('/discount/{id}','DiscountController@edit');
Route::delete('/discount/{id}','DiscountController@delete');
Route::post('/massdeletediscount','DiscountController@deletemulti')->name('massdeletediscount');

//PURCHASE ORDER
Route::get('/purchase-order','PurchaseOrderController@index');
Route::post('/purchase-order','PurchaseOrderController@create')->name('createpurchaseorder');
Route::get('/listpurchase','PurchaseOrderController@list');
Route::post('/purchase/update/{id}','PurchaseOrderController@status');
Route::delete('/purchase/{id}','PurchaseOrderController@delete');

//FINANCE 
Route::get('/finance','FinanceManagerController@index');
Route::get('/listfinance','FinanceManagerController@listdata');

//HISTORY
Route::get('/sales-history','HistoryController@sales');
Route::get('/listsales','HistoryController@list_sales');
Route::get('/restock-history','HistoryController@restock');
Route::get('/listrestock','HistoryController@list_restock');
Route::get('/capital-history','HistoryController@capital');
Route::post('/capital-history','HistoryController@start_capital')->name('startcapital');
Route::get('/listcapital','HistoryController@list_capital');
Route::get('/other-history','HistoryController@other');
Route::get('/listother','HistoryController@list_other');

//CATEGORY
Route::get('/category','CategoryController@index');
Route::get('/listcategory','CategoryController@list');
Route::post('/category','CategoryController@create')->name('createcategory');
Route::post('/category/{id}','CategoryController@edit');
Route::delete('/category/{id}','CategoryController@delete');
Route::get('/optcategory','CategoryController@optcategory');
Route::post('/massdeletecategory','CategoryController@deletemulti')->name('massdeletecategory');

//INVENTORY
Route::get('/inventory','InventoryController@index');
Route::get('/listinventory','InventoryController@list');
Route::get('/inventory/{id}','InventoryController@detail');
Route::post('/inventory','InventoryController@create')->name('createinventory');
Route::post('/substract','InventoryController@createsubstract')->name('createsubstract');
Route::post('/inventory/{id}','InventoryController@edit');
Route::delete('/inventory/{id}','InventoryController@delete');
Route::post('/massdeleteinventory','InventoryController@deletemulti')->name('massdeleteinventory');
Route::get('/optproduct','InventoryController@optproduct');

//SUPPLIER
Route::get('/supplier','SupplierController@index');
Route::get('/listsupplier','SupplierController@list');
Route::post('/supplier','SupplierController@create')->name('createsupplier');
Route::get('/supplier/{id}','SupplierController@detail');
Route::post('/supplier/{id}','SupplierController@edit');
Route::delete('/supplier/{id}','SupplierController@delete');
Route::get('/optsupplier','SupplierController@optsupplier');
Route::post('/massdeletesupplier','SupplierController@deletemulti')->name('massdeletesupplier');

});



Route::group(['middleware' => ['isStaff']], function(){

//PRODUCT
Route::get('/product','ProductController@index');
Route::get('/listproduct','ProductController@list');

//CASHIER
Route::get('/cashier','CashierController@index');
Route::get('/listitem','CashierController@listitem');
Route::get('/listcart','CashierController@listcart');
Route::delete('/deletecart/{id}','CashierController@deletecart');
Route::delete('/discard','CashierController@discard');
Route::get('/updateqty/{id}','CashierController@updateqty');
Route::post('/cashier','CashierController@addcart')->name('addcart');
Route::post('/massdeletecart','CashierController@deletemulti')->name('massdeletecart');
Route::post('/checkout/{id}','CashierController@checkout')->name('checkout');
});







