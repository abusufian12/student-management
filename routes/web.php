<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SchoolTypeController;
use App\Http\Controllers\SchoolListController;
use App\Http\Controllers\StudentInfoController;
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

Route::get('/', function () {
    // return view('welcome');
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/school_type', [SchoolTypeController::class, 'index'])->name('school_type.index');
    Route::get('/school_type/create', [SchoolTypeController::class, 'create'])->name('school_type.create');
    Route::post('/school_type/store', [SchoolTypeController::class, 'store'])->name('school_type.store');
    Route::get('/school_type/edit/{id}', [SchoolTypeController::class, 'edit'])->name('school_type.edit');
    Route::post('/school_type/update/{id}', [SchoolTypeController::class, 'update'])->name('school_type.update');

    Route::get('/school_list', [SchoolListController::class, 'index'])->name('school_list.index');
    Route::get('school_list/school_search', [SchoolListController::class, 'search'])->name('school_list.search');
    Route::get('/school_list/create', [SchoolListController::class, 'create'])->name('school_list.create');
    Route::post('/school_list/store', [SchoolListController::class, 'store'])->name('school_list.store');
    Route::get('/school_list/edit/{id}', [SchoolListController::class, 'edit'])->name('school_list.edit');
    Route::post('/school_list/update/{id}', [SchoolListController::class, 'update'])->name('school_list.update');

    Route::get('/student_info', [StudentInfoController::class, 'index'])->name('student_info.index');
    Route::get('student_info/student_search', [StudentInfoController::class, 'search'])->name('student_info.search');
    Route::get('/student_info/create', [StudentInfoController::class, 'create'])->name('student_info.create');
    Route::post('/student_info/store', [StudentInfoController::class, 'store'])->name('student_info.store');
    Route::get('/student_info/edit/{id}', [StudentInfoController::class, 'edit'])->name('student_info.edit');
    Route::post('/student_info/update/{id}', [StudentInfoController::class, 'update'])->name('student_info.update');
    Route::post('/student_info/upload_resume', [StudentInfoController::class, 'uploadResume'])->name('student_info.upload_resume');
// Route::get('/school_type', function (){
    //     return view('dashboard');
    // });

});

require __DIR__.'/auth.php';
