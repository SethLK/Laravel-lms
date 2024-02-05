<?php

use App\Http\Controllers\Home\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
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

Route::get('/', [HomeController::class, "index"])->name("home");

Route::get("/login", [LoginController::class, "index"])->name("login");
Route::post("/login", [LoginController::class, "login"])->name("_login_");

Route::get("/register", [RegisterController::class, "index"])->name("register");
Route::post("/register", [RegisterController::class, "register"])->name("_register_");
