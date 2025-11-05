<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TugasController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\checklogin;
use App\Models\Tugas;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::middleware('isLogin')->group(function(){
    // Login
    Route::get('login', [AuthController::class, 
    'login'])->name('login');
    Route::post('login', [AuthController::class, 
    'loginProses'])->name('loginProses');
});




// Logout
Route::get('logout', [AuthController::class, 
'logout'])->name('logout');

// Route CheckLogin
Route::middleware('checklogin')->group(function(){
    
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 
    'index'])->name('dashboard');

    // Route Tugas
    Route::get('tugas', [TugasController::class, 
        'index'])->name('tugas');

     // Routes Pdf Tugas
        Route::get('tugas/pdf', [TugasController::class, 
        'pdf'])->name('tugasPdf');
        });
    

    // Route isAdmin
    Route::middleware('isAdmin')->group(function(){
        // User
        Route::get('user', [UserController::class, 
        'index'])->name('user');
        // Route baru dibuat untuk menampilkan data
        Route::get('user/create', [UserController::class, 
        'create'])->name('userCreate');
        // Route ini untuk mengirimkan datanya
        Route::post('user/store', [UserController::class, 
        'store'])->name('userStore');
        // Route Edit
        Route::get('user/edit/{id}', [UserController::class, 
        'edit'])->name('userEdit');
        // Route Update
        Route::post('user/update/{id}', [UserController::class, 
        'update'])->name('userUpdate');
        // Route Delete/Hapus
        Route::delete('user/destroy/{id}', [UserController::class, 
        'destroy'])->name('userDestroy');
        // Route Excel
        Route::get('user/excel', [UserController::class, 
        'excel'])->name('userExcel');
        //Route PDF 
        Route::get('user/pdf', [UserController::class, 
        'pdf'])->name('userPdf');
    
        // Tugas
        
        // Create data
        Route::get('tugas/create', [TugasController::class, 
        'create'])->name('tugasCreate');
        // Mengirim data
        Route::post('tugas/store', [TugasController::class, 
        'store'])->name('tugasStore');
        // Route Edit Tugas
        Route::get('tugas/edit/{id}', [TugasController::class, 
        'edit'])->name('tugasEdit');
        // Route Tugas Untuk mengirim data
        Route::post('tugas/update/{id}', [TugasController::class, 
        'update'])->name('tugasUpdate');
        // Route Tugas Untuk Delete
        Route::delete('tugas/destroy/{id}', [TugasController::class, 
        'destroy'])->name('tugasDestroy');
        // Route Excel
        Route::get('tugas/excel', [TugasController::class, 
        'tugas'])->name('tugasExcel');
        
    

});