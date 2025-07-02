@extends('layouts.app')

@section('content')
<style>
    .login-container {
        display: flex;
        min-height: 80vh;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
        overflow: hidden;
    }

    .login-left,
    .login-right {
        flex: 1;
        padding: 50px;
    }

    .login-left {
        background: #fff;
    }

    .login-right {
        background: linear-gradient(to right, #20c997, #17a2b8);
        color: #fff;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        text-align: center;
    }

    .login-right h2 {
        font-weight: bold;
        margin-bottom: 20px;
    }

    .login-right p {
        margin-bottom: 30px;
        font-size: 1.1rem;
    }

    .login-right a.btn {
        background: #fff;
        color: #17a2b8;
        font-weight: bold;
        border-radius: 25px;
        padding: 10px 30px;
    }

    .social-buttons {
        display: flex;
        justify-content: center;
        gap: 10px;
        margin-bottom: 20px;
    }

    .social-buttons a {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
        color: #fff;
    }

    .btn-facebook {
        background: #3b5998;
    }

    .btn-google {
        background: #db4a39;
    }

    .btn-linkedin {
        background: #0077b5;
    }

    .divider {
        text-align: center;
        margin: 20px 0;
        position: relative;
    }

    .divider::before,
    .divider::after {
        content: '';
        height: 1px;
        background: #ccc;
        position: absolute;
        top: 50%;
        width: 40%;
    }

    .divider::before {
        left: 0;
    }

    .divider::after {
        right: 0;
    }

    .divider span {
        background: #fff;
        padding: 0 10px;
        color: #666;
    }


    .social-buttons a {
        display: inline-flex;
        justify-content: center;
        align-items: center;
        text-decoration: none;
        box-shadow: none;
        border: none;
        outline: none;
        vertical-align: middle;
    }

    .social-buttons a i {
        font-size: 18px;
        line-height: 1;
        vertical-align: middle;
        margin: 0;
        padding: 0;
    }

    input[type="checkbox"] {
        width: 20px;
        height: 20px;
        accent-color: black;
        border: 2px solid black;
        margin-top: 2px;
        /* Sube o baja el checkbox */
        margin-right: 10px;
        /* Espacio entre checkbox y texto */
        padding: 2px;
        /* Espaciado interno (compatibilidad limitada) */
        cursor: pointer;
    }
</style>

<div class="container my-5">
    <div class="login-container mx-auto">
        <!-- Left side: login -->
        <div class="login-left">
            <h1 class="text-center mb-4">Iniciar sesión en su cuenta</h1>
            <p class="text-center mb-4">iniciar sesión usando redes sociales</p>

            <div class="social-buttons">
                <a href="#" class="btn-facebook"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="btn-google"><i class="fab fa-google"></i></a>
                <a href="#" class="btn-linkedin"><i class="fab fa-linkedin-in"></i></a>
            </div>

            <div class="divider"><span>O</span></div>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="mb-3">
                    <input id="email" type="email" placeholder="Correo electrónico"
                        class="form-control @error('email') is-invalid @enderror"
                        name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                    <span class="invalid-feedback d-block">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <input id="password" type="password" placeholder="Contraseña"
                        class="form-control @error('password') is-invalid @enderror"
                        name="password" required autocomplete="current-password">
                    @error('password')
                    <span class="invalid-feedback d-block">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="mb-3 form-check">
                    <input class="form-check-input" type="checkbox" name="remember"
                        id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="form-check-label" for="remember">
                        {{ __('Mantener sesión iniciada') }}
                    </label>
                </div>

                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-success">
                        {{ __('Iniciar sesión') }}
                    </button>

                    @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('¿Olvidaste tu contraseña?') }}
                    </a>
                    @endif
                </div>
            </form>
        </div>

        <!-- Right side: sign up info -->
        <div class="login-right">
            <img src="{{ asset('imagenes/recepcion.avif') }}" alt="Welcome Image" style="width: 400px; margin-bottom: 20px;">

            <h2>¿Eres nuevo aquí?</h2>
            <p>¡Regístrate y descubre una gran cantidad de nuevas oportunidades!</p>
            <a href="{{ route('register') }}" class="btn">Registrarse</a>
        </div>
    </div>
</div>
@endsection