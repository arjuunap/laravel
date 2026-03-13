<?php

use App\Http\Controllers\MyappController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {return view('welcome');});
Route::get("/", [MyappController::class,"sample"])->name("index");


// Route::get("/home/{name}",function($name){
//     return "Student Name : " . $name;
// });


Route::get("/about",[MyappController::class,"about"])->name("about");
Route::get("/contact",[MyappController::class,"contact"])->name("contact");
Route::get("/product/{id}",[MyappController::class,"product"])->name("product");


