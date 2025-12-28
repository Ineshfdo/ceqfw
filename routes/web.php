<?php

use App\Http\Controllers\StaffController;
use Illuminate\Support\Facades\Route;
 


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