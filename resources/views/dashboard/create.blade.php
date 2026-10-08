@extends('layouts.app')

@section('content')
<div class="dashboard-layout">
    <aside class="sidebar">
        <a href="{{ route('dashboard') }}" class="sidebar-link">Volver al Feed</a>
    </aside>

    <section class="main-content">
        <h2 style="margin-bottom: 1.5rem;">Escribir Pensamiento o Nota</h2>

        <form action="{{ route('posts.store') }}" method="POST" style="max-width: 650px;">
            @csrf
            <div class="form-group">
                <label class="form-label">Título</label>
                <input type="text" name="title" class="form-input" required>
            </div>

            <div class="form-group">
                <label class="form-label">Visibilidad / Estado</label>
                <select name="status" class="form-select">
                    <option value="public">Público (Para todos)</option>
                    <option value="private">Privado (Solo para mí)</option>
                    <option value="draft">Borrador</option>
                </select>
            </div>

            <div class="form-group">
                <label class="form-label">Contenido</label>
                <textarea name="content" rows="8" class="form-textarea" required></textarea>
            </div>

            <button type="submit" class="btn-primary">Guardar / Publicar</button>
        </form>
    </section>
</div>
@endsection