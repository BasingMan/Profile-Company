<?php

use App\Models\Parameter;
use App\Models\Testimoni;
use App\Models\Portofolio;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $testimoni = Testimoni::take(5)->latest()->get();
    $portofolio = Portofolio::take(5)->latest()->get();
    $parameters = Parameter::whereIn('key', [
        'website_name', 'url', 'address', 'email', 'phone', 'about_us',
        'twitter', 'facebook', 'instagram', 'skype', 'linkedin'
    ])->get()->keyBy('key')->map->value;
    return view('frontend.index', [
        'testimonies' => $testimoni,
        'portofolios' => $portofolio,
        'parameter' => $parameters,
    ]);
})->name('index');
