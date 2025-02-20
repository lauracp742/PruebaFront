@extends('layouts.master')

@include('errors')

@section('content')
    {{-- This is the body content, within the container --}}
    <section class="login-form">
        <div class="form-container">
            <h1>Login</h1>

            <form action="login" method="post">
                @csrf

                <div>
                    <label for="email">Correo</label>
                </div>
                <div>
                    <input name="email" id="email" type="email" placeholder="correo@correo.com" />
                </div>
                <div>
                    <label for="password">Contraseña</label>
                </div>
                <div>
                    <input name="password" id="password" type="password" placeholder="Por favor ingresa tu contraseña"/>
                </div>

                <button type="submit">Login</button>
            </form>

            <a href="/register">No tines una cuenta, registrate aqui.</a>

        </div>
    </section>

    @error('email')
        <div class="">
            {{ $message }}
        </div>
    @enderror

    {{-- Si hay un mensaje de error 'error' en la sesión, muestra la alerta de SweetAlert --}}
    @if (session('error'))
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.5.1/dist/sweetalert2.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.5.1/dist/sweetalert2.min.css" rel="stylesheet">
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Contraseña incorrecta',
                text: '{{ session('error') }}',
            });
        </script>
    @endif
@endsection
