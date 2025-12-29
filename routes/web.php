<?php

use App\Http\Controllers\StaffController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StripePaymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
 

Route::get('/', [StaffController::class, 'index']);


Route::get('/staff', [StaffController::class, 'show']);


Route::get('/greeting', function() {
  $name = "Inesh";
  $age = 19;
  return view('greeting', compact('name','age'));
});


Route::get('/contact', function() {
  return view('contact');
});


Route::get('/user/{name}', function($name) {
  return view('user', compact('name'));
});

// Product Routes
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');

// Cart Routes
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
Route::patch('/cart/update', [CartController::class, 'update'])->name('cart.update');
Route::delete('/cart/remove', [CartController::class, 'remove'])->name('cart.remove');

// Stripe Payment Routes
Route::get('/test-stripe-key', function () {
    return config('services.stripe.key');
});

Route::get('/pay', [StripePaymentController::class, 'index'])->name('stripe.pay');
Route::post('/checkout', [StripePaymentController::class, 'checkout'])->name('stripe.checkout');
Route::get('/success', [StripePaymentController::class, 'success'])->name('stripe.success');
Route::get('/cancel', [StripePaymentController::class, 'cancel'])->name('stripe.cancel');
