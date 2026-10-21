<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ContactController;
use App\Models\Post;
use App\Models\Portfolio;
use App\Models\Service;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');

Route::get('/blog', [BlogController::class, 'index'])
    ->name('blog.index');

Route::get('/blog/{slug}', [BlogController::class, 'show'])
    ->name('blog.show');

Route::get('/portfolio', [PortfolioController::class, 'index'])
    ->name('portfolio.index');

Route::get('/portfolio/{slug}', [PortfolioController::class, 'show'])
    ->name('portfolio.show');

Route::get('/services', [ServiceController::class, 'index'])
    ->name('services.index');

Route::get('/services/{slug}', [ServiceController::class, 'show'])
    ->name('services.show');

Route::post('/contact', [ContactController::class, 'store'])
    ->middleware('throttle:5,1')
    ->name('contact.store');

Route::get('/form-nestcompany', function () {
    return view('pages.form-nestcompany');
});

Route::get('/sitemap.xml', function () {
    $baseUrl = url('/');

    $xml = '<?xml version="1.0" encoding="UTF-8"?>';
    $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

    // Static pages
    $staticUrls = [
        ['loc' => $baseUrl, 'changefreq' => 'weekly', 'priority' => '1.0'],
        ['loc' => route('services.index'), 'changefreq' => 'weekly', 'priority' => '0.9'],
        ['loc' => route('portfolio.index'), 'changefreq' => 'weekly', 'priority' => '0.9'],
        ['loc' => route('blog.index'), 'changefreq' => 'daily', 'priority' => '0.8'],
    ];

    foreach ($staticUrls as $url) {
        $xml .= '<url>';
        $xml .= '<loc>' . htmlspecialchars($url['loc']) . '</loc>';
        $xml .= '<changefreq>' . $url['changefreq'] . '</changefreq>';
        $xml .= '<priority>' . $url['priority'] . '</priority>';
        $xml .= '</url>';
    }

    // Services
    foreach (Service::all() as $service) {
        $xml .= '<url>';
        $xml .= '<loc>' . htmlspecialchars(route('services.show', $service->slug)) . '</loc>';
        $xml .= '<lastmod>' . $service->updated_at->toAtomString() . '</lastmod>';
        $xml .= '<priority>0.8</priority>';
        $xml .= '</url>';
    }

    // Portfolios
    foreach (Portfolio::all() as $portfolio) {
        $xml .= '<url>';
        $xml .= '<loc>' . htmlspecialchars(route('portfolio.show', $portfolio->slug)) . '</loc>';
        $xml .= '<lastmod>' . $portfolio->updated_at->toAtomString() . '</lastmod>';
        $xml .= '<priority>0.8</priority>';
        $xml .= '</url>';
    }

    // Published Blog Posts
    foreach (Post::where('status', 'published')->get() as $post) {
        $xml .= '<url>';
        $xml .= '<loc>' . htmlspecialchars(route('blog.show', $post->slug)) . '</loc>';
        $xml .= '<lastmod>' . ($post->published_at ?? $post->updated_at)->toAtomString() . '</lastmod>';
        $xml .= '<priority>0.7</priority>';
        $xml .= '</url>';
    }

    $xml .= '</urlset>';

    return Response::make($xml, 200, ['Content-Type' => 'application/xml']);
})->name('sitemap');
