@extends('layouts.app')

@section('content')
<div class="dashboard-layout">
    <aside class="sidebar">
        <a href="{{ route('dashboard') }}" class="sidebar-link">Volver al Feed</a>
    </aside>

    <section class="main-content">
        <h2 style="margin-bottom: 1.5rem;">Editar Nota</h2>

        <form action="{{ route('posts.update', $post) }}" method="POST" style="max-width: 650px;">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label class="form-label">Título</label>
                <input type="text" name="title" class="form-input" value="{{ $post->title }}" required>
            </div>

            <div class="form-group">
                <label class="form-label">Visibilidad / Estado</label>
                <select name="status" class="form-select">
                    <option value="public" {{ $post->status == 'public' ? 'selected' : '' }}>Público (Para todos)</option>
                    <option value="private" {{ $post->status == 'private' ? 'selected' : '' }}>Privado (Solo para mí)</option>
                    <option value="draft" {{ $post->status == 'draft' ? 'selected' : '' }}>Borrador</option>
                </select>
            </div>

            <div class="form-group">
                <label class="form-label">Contenido</label>
                <textarea name="content" rows="8" class="form-textarea" required>{{ $post->content }}</textarea>
            </div>

            <button type="submit" class="btn-primary">Actualizar</button>
        </form>
    </section>
</div>
@endsection