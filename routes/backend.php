<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backend\PortofolioController;
use App\Http\Controllers\backend\SliderController;
use App\Http\Controllers\backend\TestimoniController;
use App\Http\Controllers\Backend\UserController;

Route::prefix('admin')->group(function () {
    Route::get('/', function () {
        return view('backend.layouts.admin_layout');
    })->name('dashboard');
    
    //PORTOFOLIO
    Route::group(['prefix' => 'portofolio'], function () {
        Route::get('/', [PortofolioController::class, 'index'])->name('porto.index');
        Route::get('/add', [PortofolioController::class, 'create'])->name('porto.add');
        Route::post('/store', [PortofolioController::class, 'store'])->name('porto.store');
        Route::get('/edit/{id}', [PortofolioController::class, 'edit'])->name('porto.edit');
        Route::post('/update/{id}', [PortofolioController::class, 'update'])->name('porto.update');
        Route::get('/delete/{id}', [PortofolioController::class, 'destroy'])->name('porto.delete');
    });

    //TESTIMONI
    Route::group(['prefix' => 'testimoni'], function() {
        Route::get('/', [TestimoniController::class, 'index'])->name('testi.index');
        Route::get('/add', [TestimoniController::class, 'create'])->name('testi.add');
        Route::post('/store', [TestimoniController::class, 'store'])->name('testi.store');
        Route::get('/edit/{id}', [TestimoniController::class, 'edit'])->name('testi.edit');
        Route::post('/update/{id}', [TestimoniController::class, 'update'])->name('testi.update');
        Route::get('/delete/{id}', [TestimoniController::class, 'destroy'])->name('testi.delete');
        Route::get('/show/{id}', [TestimoniController::class, 'show'])->name('testi.show');
    });

    //SLIDER
    Route::group(['prefix' => 'slider'], function() {
        Route::get('/', [SliderController::class, 'index'])->name('slider.index');
        Route::get('/add', [SliderController::class, 'create'])->name('slider.add');
        Route::post('/store', [SliderController::class, 'store'])->name('slider.store');
        Route::get('/edit/{id}', [SliderController::class, 'edit'])->name('slider.edit');
        Route::post('/update/{id}', [SliderController::class, 'update'])->name('slider.update');
        Route::get('/delete/{id}', [SliderController::class, 'destroy'])->name('slider.delete');
    });

    //USER
    Route::group(['prefix' => 'user'], function(){
        Route::get('/', [UserController::class, 'index'])->name('user.index');
        Route::get('/add', [UserController::class, 'create'])->name('user.add');
        Route::post('/store', [UserController::class, 'store'])->name('user.store');
        Route::get('/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
        Route::post('//update/{id}', [UserController::class, 'update'])->name('user.update');
        Route::get('/delete/{id}',[UserController::class, 'destroy'])->name('user.delete');
    });

});


