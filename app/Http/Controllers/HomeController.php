<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Portfolio;
use App\Models\Post;

class HomeController extends Controller
{
    public function __invoke()
    {
        $services = Service::query()
            ->where('is_featured', true)
            ->orderBy('sort_order')
            ->take(6)
            ->get();

        $portfolios = Portfolio::query()
            ->where('is_featured', true)
            ->orderBy('sort_order')
            ->take(6)
            ->get();

        $posts = Post::query()
            ->latest()
            ->take(3)
            ->get();

        return view('pages.home', compact(
            'services',
            'portfolios',
            'posts'
        ));
    }
}
