<?php

use App\Models\Testimoni;
use App\Models\Portofolio;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $testimoni = Testimoni::take(5)->latest()->get();
    $portofolio = Portofolio::take(5)->latest()->get();
    return view('frontend.index', [
        'testimonies' => $testimoni,
        'portofolios' => $portofolio,
    ]);
})->name('index');
