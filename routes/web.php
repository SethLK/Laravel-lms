<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Course\CourseController;
use App\Http\Controllers\Page\PageController;
use App\Http\Controllers\Page\ImageController;
use App\Http\Controllers\Enroll\EnrollController;

Route::get('/', [HomeController::class, "index"])->name("home");

Route::middleware("auth")->group(function () {
    // Authentication Routes
    Route::post("/logout", [LoginController::class, "logout"])->name("_logout_");

    // Dashboard
    Route::get("/dashboard", [CourseController::class, "index"])->name("dashboard");

    // Course Routes
    Route::post("/create/course", [CourseController::class, "create"])->name("create.course");
    Route::get("/edit/{course_id}", [CourseController::class, "edit"])->name("Edit_Course");
    Route::put("/update/{course_id}", [CourseController::class, "update_"])->name("update_Course");
    Route::delete('/delete/{course_id}', [CourseController::class, 'delete'])->name('delete_course');

    // Page Routes
    Route::post("/course/{course_id}", [PageController::class, 'create'])->name("page.course");
    Route::get("/course/{course_id}/page/{page_id}", [PageController::class, 'viewPage'])->name("view.page");
    Route::get("/edit/course/{course_id}/page/{page_id}", [PageController::class, 'viewPage_edit'])->name("view.edit");
    Route::put("/update/course/{course_id}/page/{page_id}", [PageController::class, "updatePage"])->name("update_page");
    Route::delete("/delete/course/{course_id}/page/{page_id}", [PageController::class, 'delete'])->name("delete_page");

    // Image Upload Route
    Route::post("/image/upload", [ImageController::class, 'storeImage'])->name("image.upload");

    // Enroll Route
    Route::post("/enroll/{course_id}", [EnrollController::class, 'enroll'])->name('enroll');
});

Route::middleware("admin")->group(function () {
    // Admin Routes
    Route::get("/admin/panel", [AdminController::class, "index"])->name("admin_panel");
    Route::get("/promote/{user_id}", [AdminController::class, "promote"])->name("_promote_");
    Route::get("/delete/{user_id}", [AdminController::class, "delete_user"])->name("_delete_");
});

// Authentication Routes
Route::get("/login", [LoginController::class, "index"])->name("login");
Route::post("/login", [LoginController::class, "login"])->name("_login_");
Route::get("/register", [RegisterController::class, "index"])->name("register");
Route::post("/register", [RegisterController::class, "register"])->name("_register_");

// Course Routes
Route::get("/course/{course_id}", [CourseController::class, "show_by_course_id"])->name("showById");

// Fallback Route
Route::fallback(function () {
    return view('errors.404');
});
