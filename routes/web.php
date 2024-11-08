<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CatController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\TrainerController;
use App\Http\Controllers\Front\MessageController;
use App\Http\Controllers\Admin\HomeController as Admin;
use App\Http\Controllers\Front\HomeController as Front;
use App\Http\Controllers\Front\CourseController as FrontCourse;

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

Route::get('/', [Front::class, 'index'])->name('front.home');
Route::get('/category/{id}', [FrontCourse::class, 'category'])->name('front.category');
Route::get('/category/{id}/course/{c_id}', [FrontCourse::class, 'show'])->name('front.course');
Route::get('/contact', [\App\Http\Controllers\Front\SettingeController::class, 'index'])->name('front.contact');

Route::post('/message/newsletter', [MessageController::class, 'newsletter'])->name('front.message.newsletter');
Route::post('/message/contact', [MessageController::class, 'contact'])->name('front.message.contact');
Route::post('/message/enroll', [MessageController::class, 'enroll'])->name('front.message.enroll');


Route::get('/dashboard/login', [AuthController::class, 'login'])->name('admin.auth.login');
Route::post('/dashboard/do_login', [AuthController::class, 'do_login'])->name('admin.auth.do_login');

Route::middleware('AdminAuth:admin')->group(function(){

    Route::get('/dashboard', [Admin::class, 'index'])->name('admin.home');
    Route::get('/dashboard/logout', [AuthController::class, 'logout'])->name('admin.auth.logout');

    Route::get('/dashboard/cats', [CatController::class, 'index'])->name('admin.cats.index');
    Route::get('/dashboard/cats/create', [CatController::class, 'create'])->name('admin.cats.create');
    Route::post('/dashboard/cats/store', [CatController::class, 'store'])->name('admin.cats.store');
    Route::get('/dashboard/cats/edit/{id}', [CatController::class, 'edit'])->name('admin.cats.edit');
    Route::post('/dashboard/cats/update', [CatController::class, 'update'])->name('admin.cats.update');
    Route::get('/dashboard/cats/delete/{id}', [CatController::class, 'delete'])->name('admin.cats.delete');


    Route::get('/dashboard/trainers', [TrainerController::class, 'index'])->name('admin.trainers.index');
    Route::get('/dashboard/trainers/create', [TrainerController::class, 'create'])->name('admin.trainers.create');
    Route::post('/dashboard/trainers/store', [TrainerController::class, 'store'])->name('admin.trainers.store');
    Route::get('/dashboard/trainers/edit/{id}', [TrainerController::class, 'edit'])->name('admin.trainers.edit');
    Route::post('/dashboard/trainers/update', [TrainerController::class, 'update'])->name('admin.trainers.update');
    Route::get('/dashboard/trainers/delete/{id}', [TrainerController::class, 'delete'])->name('admin.trainers.delete');

    Route::get('/dashboard/courses', [CourseController::class, 'index'])->name('admin.courses.index');
    Route::get('/dashboard/courses/create', [CourseController::class, 'create'])->name('admin.courses.create');
    Route::post('/dashboard/courses/store', [CourseController::class, 'store'])->name('admin.courses.store');
    Route::get('/dashboard/courses/edit/{id}', [CourseController::class, 'edit'])->name('admin.courses.edit');
    Route::post('/dashboard/courses/update', [CourseController::class, 'update'])->name('admin.courses.update');
    Route::get('/dashboard/courses/delete/{id}', [CourseController::class, 'delete'])->name('admin.courses.delete');

    Route::get('/dashboard/students', [StudentController::class, 'index'])->name('admin.students.index');
    Route::get('/dashboard/students/create', [StudentController::class, 'create'])->name('admin.students.create');
    Route::post('/dashboard/students/store', [StudentController::class, 'store'])->name('admin.students.store');
    Route::get('/dashboard/students/edit/{id}', [StudentController::class, 'edit'])->name('admin.students.edit');
    Route::post('/dashboard/students/update', [StudentController::class, 'update'])->name('admin.students.update');
    Route::get('/dashboard/students/delete/{id}', [StudentController::class, 'delete'])->name('admin.students.delete');
    Route::get('/dashboard/students/showCourses/{id}', [StudentController::class, 'showCourse'])->name('admin.students.showCourses');
    Route::get('/dashboard/{id}/approve/{c_id}', [StudentController::class, 'reject'])->name('admin.students.reject');
    Route::get('/dashboard/{id}/reject/{c_id}', [StudentController::class, 'approve'])->name('admin.students.approve');

});

