<?php

namespace App\Http\Controllers;

use App\Models\Post;

class BlogController extends Controller
{
    public function index()
    {
        $posts = Post::query()
            ->latest()
            ->paginate(9);

        return view('pages.blog.index', compact('posts'));
    }

    public function show(string $slug)
    {
        $post = Post::query()
            ->where('slug', $slug)
            ->firstOrFail();

        return view('pages.blog.show', compact('post'));
    }
}
