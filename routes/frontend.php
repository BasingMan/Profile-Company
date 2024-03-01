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

Route::get('/blog', function (){
    return view('frontend.pages.blog.index');
})->name('blog');

Route::get('/blog/details', function (){
    return view('frontend.partials.section.Blog-details');
})->name('blog.details');