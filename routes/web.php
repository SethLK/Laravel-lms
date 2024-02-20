<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Home\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Course\CourseController;
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

Route::post("/logout", [LoginController::class, "logout"])->name("_logout_");

Route::get("/admin/panel", [AdminController::class, "index"])->middleware("admin")->name("admin_panel");
Route::get("/promote/{user_id}", [AdminController::class, "promote"])->name("_promote_");
Route::get("/delete/{user_id}", [AdminController::class, "delete_user"])->name("_delete_");

//dashboard
Route::get("/dashboard", [CourseController::class, "index"])->name("dashboard");
Route::post("/create/course", [CourseController::class, "create"])->name("create.course");

//course
Route::get("/course/{course_id}", [CourseController::class, "show_by_course_id"])->name("showById");

//edit course
Route::get("/edit/{course_id}", [CourseController::class, "edit"])->name("Edit_Course");
Route::patch("/update/{course_id}", [CourseController::class, "update_"])->name("update_Course");
Route::delete('/delete/{course_id}', [CourseController::class, 'delete'])->name('delete_course');
