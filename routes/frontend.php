<?php

use App\Models\Testimoni;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $testimoni = Testimoni::take(5)->latest()->get();
    return view('frontend.index', [
        'testimonies' => $testimoni,
    ]);
})->name('index');
