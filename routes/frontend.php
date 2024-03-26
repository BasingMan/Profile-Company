<?php

use App\Models\Parameter;
use App\Models\Testimoni;
use App\Models\Portofolio;
use App\Models\Artikel;
use App\Models\Slider;
use App\Models\Service;
use App\Models\Logo;
use App\Http\Controllers\MailController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $testimoni = Testimoni::take(5)->latest()->get();
    $portofolio = Portofolio::take(5)->latest()->get();
    $articles = Artikel::take(3)->latest()->get();
    $sliders = Slider::all();
    $services = Service::all();
    $logos = Logo::first();
    $parameters = Parameter::whereIn('key', [
        'website_name', 'url', 'address', 'email', 'phone', 'about_us',
        'twitter', 'facebook', 'instagram', 'skype', 'linkedin'
    ])->get()->keyBy('key')->map->value;

    //dd($sliders);
    
    return view('frontend.index', [
        'testimonies' => $testimoni,
        'portofolios' => $portofolio,
        'parameter' => $parameters,
        'articles' => $articles,
        'sliders' => $sliders,
        'services' => $services,
        'logos' => $logos,
    ]);
})->name('index');

Route::post('/mail', [MailController::class, 'main'])->name('mail.main');

Route::get('/blog', function (Illuminate\Http\Request $request) {
    $query = $request->query('query');

    $articlesQuery = Artikel::latest();

    if (!empty($query)) {
        $articlesQuery->where('header', 'like', "%$query%")
                      ->orWhere('text_prev', 'like', "%$query%");
    }

    $articles = $articlesQuery->paginate(4);

    $logos = Logo::first();

    $parameters = Parameter::whereIn('key', [
        'website_name', 'url', 'address', 'email', 'phone', 'about_us',
        'twitter', 'facebook', 'instagram', 'skype', 'linkedin'
    ])->get()->keyBy('key')->map->value;

    return view('frontend.pages.blog.index', [
        'articles' => $articles,
        'query' => $query,
        'parameter' => $parameters,
        'logos' => $logos,
    ]);
    
})->name('blog');


Route::get('/blog/{id}', function ($id) {
    $logos = Logo::first();

    $parameters = Parameter::whereIn('key', [
        'website_name', 'url', 'address', 'email', 'phone', 'about_us',
        'twitter', 'facebook', 'instagram', 'skype', 'linkedin'
    ])->get()->keyBy('key')->map->value;
    
    $articles = Artikel::where('id', $id)->first();

    if (!$articles) {
        abort(404);
    }

    $recentArticles = Artikel::where('id', '!=', $id)->latest()->limit(3)->get();

    return view('frontend.partials.section.Blog-details', [
        'articles' => $articles,
        'parameter' => $parameters,
        'recentArticles' => $recentArticles,
        'logos' => $logos,
    ]);
})->name('blog.details');
