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

Route::get('/', "IndexController@index")->name("welcome");
Route::get("login", "AuthCustomerController@index")->name("loginCustomer");
Route::post("login", "AuthCustomerController@processLogin")->name("processLoginCustomer");
Route::get("logout", "AuthCustomerController@logout")->middleware("auth:customer")->name("logoutCustomer");

Route::prefix("register")->middleware("guest:customer")->group(function () {
    Route::get("", "CustomerController@register")->name("register");
    Route::post("", "CustomerController@processRegister")->name("processRegister");
});


Route::prefix("admin")->group(function () {
    Route::get("login", "AuthController@index")->name("loginAdmin");
    Route::post("login", "AuthController@processLogin")->name("processLoginAdmin");
    Route::get("logout", "AuthController@logout")->middleware("auth:admin")->name("logoutAdmin");
    Route::middleware("auth:admin")->group(function () {
        Route::get("/", "AdminController@index")->name("admin");
        Route::get("get_customers", "AdminController@getCustomers")->name("getCustomers");
        Route::get("/{id}", "AdminController@detailCustomer")->name("detailCustomer");
        Route::get("approve/{id}", "AdminController@approve");
        Route::get("revoke/{id}", "AdminController@revoke");
    });
});
