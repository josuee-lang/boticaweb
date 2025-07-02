@extends('layouts.app')

@section('content')

<style>
    body {
        background-color: #f0f2f5;
    }

    .register-wrapper {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        padding: 20px;
    }

    .register-container {
        display: flex;
        width: 900px;
        max-width: 100%;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
        background-color: white;
    }

    .register-left {
        flex: 1;
        background: linear-gradient(to right, #20c997, #17a2b8);
        color: white;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        padding: 40px;
        text-align: center;
    }

    .register-left h2 {
        font-size: 2rem;
        margin-bottom: 20px;
        font-weight: bold;
    }

    .register-left p {
        font-size: 1.1rem;
    }

    .register-left img {
        max-width: 80%;
        height: auto;
        margin-bottom: 20px;
    }

    .register-right {
        flex: 1;
        padding: 40px;
        background-color: #fff;
    }

    .card {
        border: none;
        background: transparent;
    }

    .card-header {
        font-size: 1.5rem;
        font-weight: bold;
        border-bottom: none;
        margin-bottom: 20px;
        text-align: center;
    }
</style>

<div class="register-wrapper">
    <div class="register-container">

        <!-- Columna izquierda -->
        <div class="register-left">
            <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" alt="Registro">
            <h2>¡Bienvenido!</h2>
            <p>Regístrate para unirte a nuestra comunidad y acceder a todos los beneficios.</p>
        </div>

        <!-- Columna derecha con formulario -->
        <div class="register-right">
            <div class="card">
                <div class="card-header">{{ __('Registro') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        {{-- Nombre --}}
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Nombre') }}</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        {{-- Apellido Paterno --}}
                        <div class="row mb-3">
                            <label for="apellido_paterno" class="col-md-4 col-form-label text-md-end">{{ __('Apellido Paterno') }}</label>
                            <div class="col-md-6">
                                <input id="apellido_paterno" type="text" class="form-control @error('apellido_paterno') is-invalid @enderror"
                                    name="apellido_paterno" value="{{ old('apellido_paterno') }}" required>
                                @error('apellido_paterno')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        {{-- Apellido Materno --}}
                        <div class="row mb-3">
                            <label for="apellido_materno" class="col-md-4 col-form-label text-md-end">{{ __('Apellido Materno') }}</label>
                            <div class="col-md-6">
                                <input id="apellido_materno" type="text" class="form-control @error('apellido_materno') is-invalid @enderror"
                                    name="apellido_materno" value="{{ old('apellido_materno') }}" required>
                                @error('apellido_materno')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        {{-- Tipo Documento --}}
<div class="row mb-3">
    <label for="tipo_documento_id" class="col-md-4 col-form-label text-md-end">{{ __('Tipo Documento') }}</label>
    <div class="col-md-6">
        <select id="tipo_documento_id" name="tipo_documento_id" class="form-control @error('tipo_documento_id') is-invalid @enderror" required>
            <option value="">-- Seleccione --</option>
            @foreach($tiposDocumento as $tipo)
                <option value="{{ $tipo->id }}" {{ old('tipo_documento_id') == $tipo->id ? 'selected' : '' }}>
                    {{ $tipo->nombre_documento }}
                </option>
            @endforeach
        </select>
        @error('tipo_documento_id')
            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
        @enderror
    </div>
</div>

{{-- DNI (visible solo si se elige DNI o Carnet) --}}
<div class="row mb-3" id="dni-container" style="display: none;">
    <label for="DNI" class="col-md-4 col-form-label text-md-end">{{ __('Documento') }}</label>
    <div class="col-md-6">
        <input id="DNI" type="text" inputmode="numeric" pattern="[0-9]*"
               class="form-control @error('DNI') is-invalid @enderror"
               name="DNI" value="{{ old('DNI') }}">
        @error('DNI')
            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
        @enderror
    </div>
</div>



                        {{-- Teléfono --}}
                        <div class="row mb-3">
                            <label for="telefono" class="col-md-4 col-form-label text-md-end">{{ __('Teléfono') }}</label>
                            <div class="col-md-6">
                                <input id="telefono" type="text" class="form-control @error('telefono') is-invalid @enderror"
                                    name="telefono" value="{{ old('telefono') }}" required maxlength="20">
                                @error('telefono')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        {{-- Dirección --}}
                        <div class="row mb-3">
                            <label for="direccion" class="col-md-4 col-form-label text-md-end">{{ __('Dirección') }}</label>
                            <div class="col-md-6">
                                <input id="direccion" type="text" class="form-control @error('direccion') is-invalid @enderror"
                                    name="direccion" value="{{ old('direccion') }}" required maxlength="255">
                                @error('direccion')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        {{-- Email --}}
                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Correo Electrónico') }}</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required autocomplete="email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        {{-- Contraseña --}}
                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Contraseña') }}</label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                                    name="password" required autocomplete="new-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        {{-- Confirmar Contraseña --}}
                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirmar Contraseña') }}</label>
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        {{-- Botón Registrar --}}
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Registrar') }}
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>

    </div>
</div>


@endsection

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const selectTipoDoc = document.getElementById('tipo_documento_id');
        const dniContainer = document.getElementById('dni-container');
        const dniInput = document.getElementById('DNI');

        function toggleDNI() {
            const selectedText = selectTipoDoc.options[selectTipoDoc.selectedIndex]?.text?.toLowerCase();

            if (selectedText === 'dni') {
                dniContainer.style.display = 'flex';
                dniInput.maxLength = 8;
                dniInput.required = true;
            } else if (selectedText === 'carnet de extranjería') {
                dniContainer.style.display = 'flex';
                dniInput.maxLength = 15;
                dniInput.required = true;
            } else {
                dniContainer.style.display = 'none';
                dniInput.required = false;
                dniInput.value = '';
            }
        }

        // Solo permitir números
        dniInput.addEventListener('input', function () {
            this.value = this.value.replace(/[^0-9]/g, '');
        });

        toggleDNI(); // Al cargar
        selectTipoDoc.addEventListener('change', toggleDNI); // Al cambiar
    });
</script>

