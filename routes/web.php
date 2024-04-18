<?php
use App\Http\Controllers\HelloWorldController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\RproductController;
use App\Http\Controllers\StripeController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/produitsr/{cat}', [ProduitController::class, 'getProdByCat']);

Route::get('/espaceclient', [ProduitController::class, 'espaceclient'])->middleware('useruser');

Route::get('/hello', HelloWorldController::class);

Route::get('/produits/create', [RproductController::class, 'create'])->name('create');

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/espaceadmin', [ProduitController::class, 'espaceadmin'])->middleware('adminuser');

Route::get('/product_detail/{id}', [HomeController::class, 'product_detail'])->name('product_detail');

Route::middleware(['adminuser'])->group(function () {
    Route::get('/produits/{id}', [RproductController::class, 'show'])->name('show');
    Route::get('/produits/{id}/edit', [RproductController::class, 'edit'])->name('edit');
    Route::post('/produits', [RproductController::class, 'store'])->name('store');
    Route::put('/produits/{id}', [RproductController::class, 'update'])->name('update');
    Route::delete('/produits/{id}', [RproductController::class, 'destroy'])->name('destroy');

            // web.php


            Route::get('/email', [ProduitController::class,'email']);
            Route::post('/send/email', [ProduitController::class, 'sendEmail'])->name('send.email');

});

Route::get('cart/{id}', [RproductController::class,'addToCart']);
Route::get('cart', [RproductController::class,'cart'])->name('cart');
Route::patch('update-cart', [RproductController::class,'updatec']);

Route::delete('remove-from-cart', [RproductController::class,'removec']);

Route::get('/catalogue', [RproductController::class,'cataloguepdf'])->middleware('useruser');

Route::post('/session',[StripeController::class,'session']);
Route::get('/success', [StripeController::class,'success'])->name('success');
Route::get('/cancel', [StripeController::class,'cancel'])->name('cancel');