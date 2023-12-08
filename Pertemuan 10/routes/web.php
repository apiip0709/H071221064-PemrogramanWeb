<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ApplyController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ForgetPasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JobPostController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PerusahaanController;
use App\Http\Controllers\ProfController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegistController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\UserController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/admin', [AdminController::class, 'admin'])->middleware('auth');
// Admin Access
Route::group(['middleware' => ['auth', 'RoleMiddleware:Admin']], function () {
    Route::get('/admin', [AdminController::class, 'admin'])->name('admin');
    Route::resource('/admin/user', UserController::class);
    Route::resource('/admin/profile', ProfileController::class);
    Route::resource('/admin/jobpost', JobPostController::class);

    Route::get('/admin/apply', [AdminController::class, 'adminApply']);
});

// Penyedia Access
Route::group(['middleware' => ['auth', 'RoleMiddleware:Penyedia']], function () {
    Route::get('/penyedia', [AdminController::class, 'penyedia'])->name('penyedia');
    Route::resource('/penyedia/jobpost', JobController::class);
    Route::resource('/penyedia/company', PerusahaanController::class);
});

// Pelamar Access
Route::group(['middleware' => ['auth', 'RoleMiddleware:Pelamar']], function () {
    Route::get('/pelamar', [AdminController::class, 'pelamar'])->name('pelamar');
    Route::resource('/pelamar/profile', ProfController::class);
    Route::resource('/pelamar/skill', SkillController::class);
});

// Home 
Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');

// Jobs Route
Route::group(['middleware' => ['auth']], function () {
    Route::get('/jobs', [HomeController::class, 'jobs'])->name('jobs');
    Route::get('/jobs/search', [HomeController::class, 'search'])->name('searchJobs');
    Route::get('/jobs/{id}', [HomeController::class, 'show'])->name('showJobs');

    Route::resource('/jobs/{id}/apply', ApplyController::class);
});

// Send Email
Route::get('/test-view', [ContactController::class, 'test_view']);
Route::post('/post-message', [ContactController::class, 'post_message']);

// login account
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/autentikasi', [LoginController::class, 'autentikasi'])->name('autentikasi');
Route::post('/keluar', [LoginController::class, 'keluar'])->name('keluar');

// regist account
Route::get('/regist', [RegistController::class, 'index'])->name('regist');
Route::post('/regist', [RegistController::class, 'store'])->name('regist.store');

// Forget Password
Route::get('/forget-password', [ForgetPasswordController::class, 'index'])->name('forget-password');
Route::post('request-process', [ForgetPasswordController::class, 'forgetPasswordRequest'])->name('forgetPassword.request.post');
Route::get('/change-password/{token}', [ForgetPasswordController::class, 'indexResetPasswordForm'])->name('forgetPassword.link.get');
Route::post('change-process', [ForgetPasswordController::class, 'resetPasswordForm'])->name('forgetPassword.link.post');
