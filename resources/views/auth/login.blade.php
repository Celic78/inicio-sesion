@extends('layouts.app')

@section('content')
<div class="split-container">
    <div class="split-left">
        <div class="quote-box">
            "Un libro es un jardín que se lleva en el bolsillo."
            <br>
            <span style="font-size: 1rem; font-weight: 400; margin-top: 1rem; display: block;">— Proverbio Árabe</span>
        </div>
    </div>
    <div class="split-right">
        <div class="auth-card">
            <h2 class="auth-title">Inicio de Sesión</h2>

            @if($errors->any())
                <div style="color: var(--vibrant-coral); margin-bottom: 1rem; font-size: 0.9rem;">
                    {{ $errors->first() }}
                </div>
            @endif

            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label class="form-label">Correo Electrónico</label>
                    <input type="email" name="email" class="form-input" required value="{{ old('email') }}">
                </div>
                <div class="form-group">
                    <label class="form-label">Contraseña</label>
                    <input type="password" name="password" class="form-input" required>
                </div>
                <button type="submit" class="btn-primary" style="width: 100%; margin-top: 1rem;">Entrar</button>
            </form>

            <div style="margin-top: 1.5rem; text-align: center;">
                <a href="{{ route('register') }}" class="btn-theme" style="display: inline-block; width: 100%;">Registrarse</a>
            </div>
        </div>
    </div>
</div>
@endsection