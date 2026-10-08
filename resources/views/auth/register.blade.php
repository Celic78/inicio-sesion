@extends('layouts.app')

@section('content')
<div class="split-container">
    <div class="split-left">
        <div class="quote-box">
            "La lectura es para la mente lo que el ejercicio es para el cuerpo."
            <br>
            <span style="font-size: 1rem; font-weight: 400; margin-top: 1rem; display: block;">— Joseph Addison</span>
        </div>
    </div>
    <div class="split-right">
        <div class="auth-card">
            <h2 class="auth-title">Crear Cuenta</h2>

            <form action="{{ route('register') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label class="form-label">Nombre Completo</label>
                    <input type="text" name="name" class="form-input" required value="{{ old('name') }}">
                </div>
                <div class="form-group">
                    <label class="form-label">Correo Electrónico</label>
                    <input type="email" name="email" class="form-input" required value="{{ old('email') }}">
                </div>
                <div class="form-group">
                    <label class="form-label">Contraseña</label>
                    <input type="password" name="password" class="form-input" required>
                </div>
                <div class="form-group">
                    <label class="form-label">Confirmar Contraseña</label>
                    <input type="password" name="password_confirmation" class="form-input" required>
                </div>
                <button type="submit" class="btn-primary" style="width: 100%; margin-top: 1rem;">Comenzar</button>
            </form>
        </div>
    </div>
</div>
@endsection