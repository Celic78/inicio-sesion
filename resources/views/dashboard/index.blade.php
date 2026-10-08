@extends('layouts.app')

@section('content')
<div class="dashboard-layout">
    <aside class="sidebar">
        <a href="{{ route('dashboard') }}" class="sidebar-link active">Feed General</a>
        <a href="{{ route('posts.create') }}" class="sidebar-link">+ Nueva Nota</a>
    </aside>

    <section class="main-content">
        <h2 style="margin-bottom: 1.5rem;">Mis Publicaciones</h2>
        @foreach($myPosts as $post)
            <div class="post-card">
                <div class="post-header">
                    <span class="badge badge-{{ $post->status }}">{{ $post->status }}</span>
                    <div>
                        <a href="{{ route('posts.edit', $post) }}" style="margin-right: 0.5rem; text-decoration: underline;">Editar</a>
                        <form action="{{ route('posts.destroy', $post) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="background:none; border:none; color:var(--vibrant-coral); cursor:pointer;">Eliminar</button>
                        </form>
                    </div>
                </div>
                <h3 class="post-title">{{ $post->title }}</h3>
                <p>{{ $post->content }}</p>
            </div>
        @endforeach

        <h2 style="margin-top: 3rem; margin-bottom: 1.5rem;">Comunidad</h2>
        @foreach($feedPosts as $post)
            <div class="post-card">
                <div class="post-header">
                    <span>{{ $post->user->name }}</span>
                    <span>{{ $post->created_at->diffForHumans() }}</span>
                </div>
                <h3 class="post-title">{{ $post->title }}</h3>
                <p>{{ $post->content }}</p>
            </div>
        @endforeach
    </section>
</div>
@endsection