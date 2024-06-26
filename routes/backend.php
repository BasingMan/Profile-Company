<?php

use App\Http\Controllers\backend\ArtikelController;
use App\Http\Controllers\LogoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backend\PortofolioController;
use App\Http\Controllers\backend\SliderController;
use App\Http\Controllers\backend\TestimoniController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\backend\ServiceController;
use App\Http\Controllers\ParameterController;
use Illuminate\Support\Facades\Auth;

Route::prefix('admin')->group(function () {
    Route::redirect('/', '/admin/login');
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');
    
    // LOGIN
    Route::group(['middleware' => 'guest'], function () {
        Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
        Route::post('/login', [AuthController::class, 'login'])->name('login.post');
    });
    
    // LOGOUT
    Route::group(['middleware' => 'auth'], function () {
        Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    });

    // ADMIN ROUTES
    Route::group(['middleware' => 'auth.admin'], function () {

        Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');

        // Group routes for Portofolio module
        Route::prefix('portofolio')->group(function () {
            Route::get('/', [PortofolioController::class, 'index'])->name('porto.index');
            Route::get('/add', [PortofolioController::class, 'create'])->name('porto.add');
            Route::post('/store', [PortofolioController::class, 'store'])->name('porto.store');
            Route::get('/edit/{id}', [PortofolioController::class, 'edit'])->name('porto.edit');
            Route::post('/update/{id}', [PortofolioController::class, 'update'])->name('porto.update');
            Route::get('/delete/{id}', [PortofolioController::class, 'destroy'])->name('porto.delete');
        });

        // Group routes for Testimoni module
        Route::prefix('testimoni')->group(function () {
            Route::get('/', [TestimoniController::class, 'index'])->name('testi.index');
            Route::get('/add', [TestimoniController::class, 'create'])->name('testi.add');
            Route::post('/store', [TestimoniController::class, 'store'])->name('testi.store');
            Route::get('/edit/{id}', [TestimoniController::class, 'edit'])->name('testi.edit');
            Route::post('/update/{id}', [TestimoniController::class, 'update'])->name('testi.update');
            Route::get('/delete/{id}', [TestimoniController::class, 'destroy'])->name('testi.delete');
            Route::get('/show/{id}', [TestimoniController::class, 'show'])->name('testi.show');
        });

        // Group routes for Slider module
        Route::prefix('banner')->group(function () {
            Route::get('/', [SliderController::class, 'index'])->name('slider.index');
            Route::get('/add', [SliderController::class, 'create'])->name('slider.add');
            Route::post('/store', [SliderController::class, 'store'])->name('slider.store');
            Route::get('/edit/{id}', [SliderController::class, 'edit'])->name('slider.edit');
            Route::post('/update/{id}', [SliderController::class, 'update'])->name('slider.update');
            Route::get('/delete/{id}', [SliderController::class, 'destroy'])->name('slider.delete');
            Route::get('/show/{id}', [SliderController::class, 'show'])->name('slider.show');
        });

        // Group routes for User module
        Route::prefix('user')->group(function () {
            Route::get('/', [UserController::class, 'index'])->name('user.index');
            Route::get('/add', [UserController::class, 'create'])->name('user.add');
            Route::post('/store', [UserController::class, 'store'])->name('user.store');
            Route::get('/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
            Route::post('/update/{id}', [UserController::class, 'update'])->name('user.update');
            Route::get('/delete/{id}', [UserController::class, 'destroy'])->name('user.delete');
        });

        // Group routes for Article module
        Route::prefix('article')->group(function () {
            Route::get('/', [ArtikelController::class, 'index'])->name('art.index');
            Route::get('/add', [ArtikelController::class, 'create'])->name('art.add');
            Route::post('/store', [ArtikelController::class, 'store'])->name('art.store');
            Route::get('/edit/{id}', [ArtikelController::class, 'edit'])->name('art.edit');
            Route::post('/update/{id}', [ArtikelController::class, 'update'])->name('art.update');
            Route::get('/delete/{id}', [ArtikelController::class, 'destroy'])->name('art.delete');
            Route::get('/show/{id}', [ArtikelController::class, 'show'])->name('art.show');
        });

        //Group routes for Pengaturan module
        Route::prefix('pengaturan')->group(function () {
            Route::get('/', [ParameterController::class, 'index'])->name('pengaturan.index');
            Route::Put('/', [ParameterController::class, 'update'])->name('pengaturan.update');
        });

        Route::prefix('logo')->group(function() {
            Route::get('/', [LogoController::class, 'index'])->name('logo.index');
            Route::post('/', [LogoController::class, 'update'])->name('logo.update');
        });

        //Group routes for service module
        Route::prefix('service')->group(function (){
            Route::get('/', [ServiceController::class, 'index'])->name('ser.index');
            Route::get('/add', [ServiceController::class, 'create'])->name('ser.add');
            Route::post('/store', [ServiceController::class, 'store'])->name('ser.store');
            Route::get('/edit/{id}', [ServiceController::class, 'edit'])->name('ser.edit');
            Route::post('/update/{id}', [ServiceController::class, 'update'])->name('ser.update');
            Route::get('/delete/{id}', [ServiceController::class, 'destroy'])->name('ser.delete');
        });
    });
});



Route::get('/admin/login', function () {
    if (Auth::check()) {
        return redirect()->route('backend.dashboard');
    } else {
        return view('backend.pages.login.login');
    }
})->name('admin.login');