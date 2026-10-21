<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::query()
            ->whereHas('posts', fn ($q) => $q->where('status', 'published'))
            ->get();

        $posts = Post::query()
            ->with('category')
            ->where('status', 'published')
            ->when($request->filled('category'), function ($query) use ($request) {
                $query->whereHas('category', fn ($q) => $q->where('slug', $request->query('category')));
            })
            ->when($request->filled('q'), function ($query) use ($request) {
                $query->where(function ($q) use ($request) {
                    $q->where('title', 'like', '%' . $request->query('q') . '%')
                      ->orWhere('excerpt', 'like', '%' . $request->query('q') . '%');
                });
            })
            ->latest('published_at')
            ->paginate(9)
            ->withQueryString();

        return view('pages.blog.index', compact('posts', 'categories'));
    }

    public function show(string $slug)
    {
        $post = Post::query()
            ->with(['category', 'tags'])
            ->where('slug', $slug)
            ->where('status', 'published')
            ->firstOrFail();

        $relatedPosts = Post::query()
            ->with('category')
            ->where('status', 'published')
            ->where('id', '!=', $post->id)
            ->when($post->category_id, fn ($q) => $q->where('category_id', $post->category_id))
            ->latest('published_at')
            ->take(3)
            ->get();

        return view('pages.blog.show', compact('post', 'relatedPosts'));
    }
}
