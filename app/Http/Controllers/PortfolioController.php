<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;

class PortfolioController extends Controller
{
    public function index()
    {
        $portfolios = Portfolio::query()
            ->latest()
            ->paginate(9);

        return view('pages.portfolio.index', compact('portfolios'));
    }

    public function show(string $slug)
    {
        $portfolio = Portfolio::query()
            ->where('slug', $slug)
            ->firstOrFail();

        return view('pages.portfolio.show', compact('portfolio'));
    }
}
