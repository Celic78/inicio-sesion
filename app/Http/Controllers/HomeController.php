<?php

namespace App\Http\Controllers;

use App\Models\Post;

class HomeController extends Controller
{
    public function index()
    {
        $recentPosts = Post::where('status', 'public')->with('user')->latest()->take(3)->get();
        return view('home', compact('recentPosts'));
    }

    public function about()
    {
        return view('about');
    }

    public function simulation()
    {
        return view('simulation');
    }
}