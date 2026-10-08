@extends('layouts.app')

@section('content')
<div style="padding: 3rem 2rem; max-width: 900px; margin: 0 auto;">
    <h1 style="font-size: 2rem; margin-bottom: 1rem;">Vista Previa de la Experiencia</h1>
    <p style="margin-bottom: 2rem;">Así se ve el panel donde compartirás tus notas y leerás a otros creadores al registrarte:</p>

    <div class="post-card" style="border-style: dashed;">
        <div class="post-header">
            <span>Ejemplo de Autor</span>
            <span class="badge badge-public">Público</span>
        </div>
        <h3 class="post-title">El arte de la calma y la lectura activa</h3>
        <p>Esta es una demostración de cómo se estructuran tus escritos. Puedes redactar borradores personales, publicaciones privadas o compartir con toda la comunidad.</p>
    </div>
</div>
@endsection