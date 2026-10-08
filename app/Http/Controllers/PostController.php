<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        $feedPosts = Post::where('status', 'public')
            ->with('user')
            ->latest()
            ->get();

        $myPosts = Post::where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('dashboard.index', compact('feedPosts', 'myPosts'));
    }

    public function create()
    {
        return view('dashboard.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'status' => 'required|in:draft,private,public',
        ]);

        Post::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'content' => $request->content,
            'status' => $request->status,
        ]);

        return redirect()->route('dashboard')->with('success', 'Publicación guardada exitosamente.');
    }

    public function edit(Post $post)
    {
        if ($post->user_id !== Auth::id()) {
            abort(403);
        }
        return view('dashboard.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        if ($post->user_id !== Auth::id()) {
            abort(403);
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'status' => 'required|in:draft,private,public',
        ]);

        $post->update($request->only('title', 'content', 'status'));

        return redirect()->route('dashboard')->with('success', 'Publicación actualizada.');
    }

    public function destroy(Post $post)
    {
        if ($post->user_id !== Auth::id()) {
            abort(403);
        }

        $post->delete();

        return redirect()->route('dashboard')->with('success', 'Publicación eliminada.');
    }
}