<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
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

Route::get('/', [HomeController::class, 'index']);


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/redirect', [HomeController::class, 'redirect']);


Route::middleware('auth')->group(function () {

Route::get('/addProducts', [AdminController::class, 'addProducts']);
Route::get('/viewProducts', [AdminController::class, 'viewProducts'])->name('viewProducts');
Route::delete('/delete/{id}', [AdminController::class, 'destroy'])->name('delete');
Route::post('/add_product', [AdminController::class, 'store'])->name('add_product');

Route::get('/edit_product/{id}', [AdminController::class, 'edit']);

Route::patch('/update_product/{id}', [AdminController::class, 'update']);
Route::get('/preview_product/{id}', [HomeController::class, 'preview']);
Route::get('/show_cart', [HomeController::class,'show_cart']);
Route::post('/add_cart/{id}', [HomeController::class, 'add_cart']);
Route::delete('/delete_cart/{id}', [HomeController::class, 'delete_cart']);
Route::get('/cash_order', [HomeController::class,'cash_order']);
Route::get('/orders', [AdminController::class,'orders']);
Route::post('stripe/{totalPrice}', [HomeController::class,'stripePost'])->name('stripe.post');
Route::get('/stripe/{totalPrice}', [HomeController::class,'stripe']);
Route::post('/delivered/{id}', [AdminController::class,'delivered']);
Route::get('/print_pdf/{id}', [AdminController::class,'print_pdf']);
Route::get('/shop', [HomeController::class, 'shop']);
Route::get('/user_orders', [HomeController::class, 'user_orders']);
Route::delete('/delete_orders/{id}', [HomeController::class, 'delete_orders']);
});


require __DIR__.'/auth.php';
