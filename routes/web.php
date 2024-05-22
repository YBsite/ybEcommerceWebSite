<?php

use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FixturesController;
use App\Http\Controllers\InterviewController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShippingInfoController;
use App\Http\Controllers\SubCategoryController;
use App\Models\Product;
use App\Models\ShippingInfo;
use Illuminate\Support\Facades\Route;


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


Route::get('/',[PagesController::class,'index'])->name('home');
Route::get('/download-pdf', [PagesController::class ,'downloadPDF'])->name('download.pdf');

Route::resource('/interviews',InterviewController::class);

Route::get('/login',[AdminAuthController::class,'showLogin'])->name('login');
Route::post('/login', [AdminAuthController::class, 'login']);
Route::get('/blogger/login',[PagesController::class,'showLogin'])->name('blogger.login');
Route::get('/blogger/register',[PagesController::class,'showRegister'])->name('register');
Route::post('/blogger/register',[PagesController::class,'register'])->name('register');
Route::resource('/dashboard/products',ProductController::class)->middleware(['auth','role:admin']);
Route::resource('/dashboard/categories',CategoryController::class)->middleware(['auth','role:admin']);
Route::resource('/dashboard/subcategories',SubCategoryController::class)->middleware(['auth','role:admin']);
Route::get('/single-product/{id}/{slug}',[PagesController::class,'singleProduct'])->name('viewpro')->middleware('auth.blogger');
Route::get('/single-categorie/{id}',[PagesController::class,'singlecategorie'])->name('viewcat');
Route::get('/all-products',[PagesController::class,'allProducts'])->name('products.all');


Route::resource('carts', CartController::class)->only(['index', 'store', 'destroy'])->middleware('auth.blogger');
Route::get('/shipping/{id}',[ShippingInfoController::class,'index'])->middleware('auth.blogger');
Route::post('/shipping/store', [ShippingInfoController::class, 'store'])->name('shipping.store')->middleware('auth.blogger');
Route::get('/checkout',[ShippingInfoController::class,'checkoutPage'])->name('checkout')->middleware('auth.blogger');


Route::post('/blogger/login', [PagesController::class, 'bloggerLogin']);

Route::get('/dashboard',[AdminAuthController::class,'DashboardPage'])->middleware(['auth','role:admin'])->name('dashboard');
Route::post('/add-user', [AdminAuthController::class, 'addUser'])->middleware(['auth','role:admin'])->name('user.add');
Route::delete('/users/{id}', [AdminAuthController::class, 'destroy'])->middleware(['auth','role:admin'])->name('users.destroy');
Route::get('/about',[PagesController::class,'About']);
Route::post('/place-order', [ShippingInfoController::class,'PlaceOrder'])->name('place.order')->middleware('auth');
Route::get('/history',[ShippingInfoController::class,'History'])->name('history')->middleware('auth.blogger');
Route::get('/showStatus/{id}',[ShippingInfoController::class,'showStatus'])->middleware('auth.blogger');



Route::get('/register', [AdminAuthController::class, 'create'])->name('register.create');
Route::post('/register', [AdminAuthController::class , 'store'])->name('register.store');

Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');
Route::post('/orders/{id}/approve', [ProductController::class, 'approve'])->name('orders.approve');
Route::post('/orders/{id}/decline', [ProductController::class, 'decline'])->name('orders.decline');




