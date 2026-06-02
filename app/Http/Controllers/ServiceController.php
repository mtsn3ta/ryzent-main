<?php

namespace App\Http\Controllers;

use App\Models\Service;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::query()
            ->orderBy('sort_order')
            ->latest()
            ->paginate(9);

        return view('pages.services.index', compact('services'));
    }

    public function show(string $slug)
    {
        $service = Service::query()
            ->where('slug', $slug)
            ->firstOrFail();

        return view('pages.services.show', compact('service'));
    }
}
