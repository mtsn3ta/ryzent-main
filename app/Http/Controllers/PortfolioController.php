<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function index(Request $request)
    {
        $selectedCategory = $request->query('category');

        $portfolios = Portfolio::query()
            ->when($selectedCategory, function ($query, $category) {
                $query->where('category', $category);
            })
            ->orderBy('sort_order')
            ->latest()
            ->paginate(9)
            ->withQueryString();

        $categories = Portfolio::query()
            ->select('category')
            ->whereNotNull('category')
            ->distinct()
            ->pluck('category');

        return view('pages.portfolio.index', compact('portfolios', 'categories', 'selectedCategory'));
    }

    public function show(string $slug)
    {
        $portfolio = Portfolio::query()
            ->where('slug', $slug)
            ->firstOrFail();

        $relatedPortfolios = Portfolio::query()
            ->where('id', '!=', $portfolio->id)
            ->when($portfolio->category, fn ($q) => $q->where('category', $portfolio->category))
            ->orderBy('sort_order')
            ->latest()
            ->take(3)
            ->get();

        return view('pages.portfolio.show', compact('portfolio', 'relatedPortfolios'));
    }
}
