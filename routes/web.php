<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DepartmentDetailsController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\PrivacyController;
use App\Http\Controllers\ServiceDetailsController;
use App\Http\Controllers\ServiceController;

use App\Http\Controllers\HomeBeController;
use App\Http\Controllers\WidgetController;
use App\Http\Controllers\FormController;


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
Route::resource( '/', App\Http\Controllers\HomeController::class);
Route::get('/home',[HomeController::class, 'index'])->name('fe.index');

// Route::get('/index', function () {return view('fe.index');});
Route::resource( '/about', App\Http\Controllers\AboutController::class);
Route::get('/about', function () {return view('fe.about');});
Route::resource( '/contact', App\Http\Controllers\ContactController::class);
Route::get('/contact', function () {return view('fe.contact');});
Route::resource( '/department-details', App\Http\Controllers\DepartmentDetailsController::class);
Route::get('/department-details', function () {return view('fe.department-details');});
Route::resource( '/departments', App\Http\Controllers\DepartmentsController::class);
Route::get('/departments', function () {return view('fe.departments');});
Route::resource( '/appointment', App\Http\Controllers\AppointmentController::class);
Route::get('/doctors', function () {return view('fe.doctors');});
Route::resource( '/doctors', App\Http\Controllers\DoctorsController::class);
Route::get('/faq', function () {return view('fe.faq');});
Route::resource( '/faq', App\Http\Controllers\FaqController::class);
Route::get('/gallery', function () {return view('fe.gallery');});
Route::resource( '/gallery', App\Http\Controllers\GalleryController::class);
Route::get('/privacy', function () {return view('fe.privacy');});
Route::resource( '/privacy', App\Http\Controllers\PrivacyController::class);
Route::get('/service-details', function () {return view('fe.service-details');});
Route::resource( '/service-details', App\Http\Controllers\ServiceDetailsController::class);
Route::get('/services', function () {return view('fe.services');});
Route::resource( '/services', App\Http\Controllers\ServiceController::class);

Route::get('/be', [HomeBeController::class, 'index']);
Route::get('/widget', function () {return view('be.widget');});
Route::resource( '/widget', App\Http\Controllers\WidgetController::class);
Route::get('/form-view', function () {return view('be.form');});
Route::resource('/form', App\Http\Controllers\FormController::class);