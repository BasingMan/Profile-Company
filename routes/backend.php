<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backend\PortofolioController;

Route::prefix('admin')->group(function () {
    Route::get('/', function () {
        return view('backend.layouts.admin_layout');
    })->name('dashboard');
    
    //PORTOFOLIO
    Route::group(['prefix' => 'portfolio'], function () {
        Route::get('/', [PortofolioController::class, 'index'])->name('index');
        Route::get('/add', [PortofolioController::class, 'create'])->name('add');
        Route::post('/store', [PortofolioController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [PortofolioController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [PortofolioController::class, 'update'])->name('update');
        Route::get('/delete/{id}', [PortofolioController::class, 'destroy'])->name('delete');
    });


});


