<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;


Route::get("/",[ProductController::class,'index'])->name('home');

Route::get('/create',[ProductController::class,'create']);

Route::post("/",[ProductController::class,'store']);

Route::get("/delete/{id}", [ProductController::class,'delete'])->name('delete');
Route::get("/edit/{id}",[ProductController::class,'edit'])->name('edit');
Route::post("/update/{id}",[ProductController::class,'update'])->name('update');
Route::get("/details/{id}",[ProductController::class,'details'])->name('details');

