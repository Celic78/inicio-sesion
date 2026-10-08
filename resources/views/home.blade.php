@extends('layouts.app')

@section('content')
<div style="padding: 4rem 2rem; max-width: 900px; margin: 0 auto; text-align: center;">
    <h1 style="font-size: 3rem; margin-bottom: 1rem;">Un refugio para las palabras y la inspiración.</h1>
    <p style="font-size: 1.2rem; margin-bottom: 2rem;">Descubre ensayos, reflexiones y pensamientos diarios de una comunidad unida por el amor a la lectura.</p>
    
    <a href="{{ route('register') }}" class="btn-primary" style="font-size: 1.1rem; padding: 0.8rem 2rem;">Empieza a Escribir Hoy</a>

    <div style="margin-top: 4rem; text-align: left;">
        <h2 style="margin-bottom: 1.5rem;">Lecturas Recientes</h2>
        @foreach($recentPosts as $post)
            <div class="post-card">
                <div class="post-header">
                    <span>Por {{ $post->user->name }}</span>
                    <span>{{ $post->created_at->format('d M, Y') }}</span>
                </div>
                <h3 class="post-title">{{ $post->title }}</h3>
                <p>{{ Str::limit($post->content, 180) }}</p>
            </div>
        @endforeach
    </div>
</div>
@endsection