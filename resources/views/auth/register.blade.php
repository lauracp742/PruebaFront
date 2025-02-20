@extends('layouts.master')

@section('content')
<div class="box" style="
    display: flex;
    justify-content: center;
    padding: 3rem;
">
<div class="form-container">
    <h1>Registro</h1>

    <form action="/register" method="POST">
        @csrf

        <!-- Campo de Nombre -->
        <div class="input-group">
            <label for="name">Nombre</label>
            <input name="name" id="name" type="text" placeholder="Nombre completo" value="{{ old('name') }}" />
        </div>

        <!-- Campo de Correo Electrónico -->
        <div class="input-group">
            <label for="email">Correo Electrónico</label>
            <input name="email" id="email" type="email" placeholder="example@example.com" value="{{ old('email') }}" />
        </div>

        <!-- Campo de Contraseña -->
        <div class="input-group">
            <label for="password">Contraseña</label>
            <input name="password" id="password" type="password" placeholder="Ingresa una contraseña" />
        </div>

        <!-- Botón de Enviar -->
        <div class="button-group">
            <button type="submit">Registrar</button>
        </div>

    </form>

    <a href="/login">Inicia seción</a>

    @include('errors')

    <!-- SweetAlert para errores de email duplicado -->
    @if ($errors->has('email'))
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            Swal.fire({
                icon: 'error',
                title: '¡Email ya registrado!',
                text: 'El correo electrónico que intentas registrar ya está asociado a una cuenta.',
            });
        </script>
    @endif
</div>
</div>
@endsection

@section('styles')
<style>
  
    .box{
        padding: ;
        display: flex;
        justify-content: center;
    }
    .form-container {
        width: 100%;
        max-width: 400px;
        padding: 20px;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        box-sizing: border-box;
    }

    h1 {
        text-align: center;
        font-size: 24px;
        color: #333;
        margin-bottom: 20px;
    }

    /* Estilo para los grupos de entrada */
    .input-group {
        margin-bottom: 15px;
    }

    .input-group label {
        display: block;
        font-size: 14px;
        margin-bottom: 5px;
        color: #333;
    }

    .input-group input {
        width: 100%;
        padding: 10px;
        border-radius: 5px;
        font-size: 14px;
        box-sizing: border-box;
    }

    .input-group input:focus {
        border-color: #007bff;
        outline: none;
        border: none;
    }

    /* Estilo para el botón */
    .button-group {
        text-align: center;
    }

    .button-group button {
        width: 100%;
        padding: 10px;
        background-color: #007bff;
        color: white;
        border: none;
        border-radius: 5px;
        font-size: 16px;
        cursor: pointer;
    }

    .button-group button:hover {
        background-color: #0056b3;
    }

    /* Estilo responsive para pantallas pequeñas */
    @media (max-width: 480px) {
        .form-container {
            padding: 15px;
        }

        h1 {
            font-size: 20px;
        }

        .input-group input {
            font-size: 16px;
        }

        .button-group button {
            font-size: 18px;
        }
    }

</style>
@endsection
