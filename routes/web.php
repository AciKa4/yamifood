<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\FrontController;
use \App\Http\Controllers\LoginController;
use \App\Http\Controllers\RegisterController;
use \App\Http\Controllers\LogoutController;
use \App\Http\Controllers\BackController;
use \App\Http\Middleware\CheckLogin;
use \App\Http\Controllers\ContactController;
use \App\Http\Controllers\CartController;
use \App\Http\Controllers\OrderController;
use \App\Http\Middleware\isAdmin;
use \App\Http\Controllers\ProductController;
use \App\Http\Controllers\UserController;
use \App\Http\Controllers\UserActionController;
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

Route::get('/',[FrontController::class,'home'])->name('home');

Route::get("/contact",[ContactController::class,'index'])->name('contact');

Route::post("/contact",[ContactController::class,'store'])->name('contact.send');

Route::get("/products",[FrontController::class,'products'])->name('products.home');
Route::get("/product/{id}",[FrontController::class,'product'])->name("product.show");

Route::get("/about",[FrontController::class,'about'])->name('about');

Route::get("/author",[FrontController::class,'author'])->name('author');

Route::get("/register",[RegisterController::class,"index"])->name('register');
Route::post("/register",[RegisterController::class,"store"])->name('doRegister');

Route::get("/login",[LoginController::class,"login"])->name('login');
Route::post("/login",[LoginController::class,"store"])->name("doLogin");

Route::post("/products/filter",[FrontController::class,'getFilter'])->name('products.getFiltered');

Route::middleware([CheckLogin::class])->group(function(){
    Route::get("/logout",[LogoutController::class,"logout"])->name("logout");
    Route::get("/cart",[CartController::class,'cart'])->name('cart');
    Route::post("/cart",[CartController::class,'store']);
    Route::delete("/cart",[CartController::class,'destroy']);
    Route::put("/cart",[CartController::class,'changeQuantity']);

    Route::post("/order",[OrderController::class,'store']);
});

Route::group(['middleware' => 'isAdmin'],function(){
    Route::get("/admin/main",[BackController::class,"home"])->name("admin.home");

    Route::resource("/admin/products",ProductController::class);
    Route::post("/admin/products/filter",[ProductController::class,"filter"]);

    Route::get("/admin/users",[UserController::class,'index'])->name("users.index");
    Route::get("/admin/usersaction",[UserActionController::class,'index'])->name("users.action");
    Route::get("/admin/useraction/filter",[UserActionController::class,'filter'])->name("users.action.filter");

    Route::get("/admin/orders",[OrderController::class,'index'])->name("orders.index");
});

Route::get('/docs', function() {
    return response()->file(public_path() . '/docs.pdf');
});




