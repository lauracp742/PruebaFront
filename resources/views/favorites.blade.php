@extends('layouts.master')

@section('content')
<h1 class="title">Tus tragos favoritos</h1>
<div class="container">
    @forelse ($user->favorites as $favorite)
        <div class="drink">
            <a href=" {{ route('recipe', $favorite->drink_id) }}" aria-label="link to recipe">
                <img src="{{ $favorite->image }}" />
            </a>
            <h2>{{ $favorite->name }}</h2>
            <form action="delete" method="post">
                @csrf
                <input type="hidden" name="id" value="{{ $favorite->id }}" />
                <button type="submit" class="unlike-btn" style="background-color: #f57e65; font-size: medium;">Eliminar de favoritos</button>
            </form>
        </div>
    @empty
        <p class="favorite-error">Vaya! Aun no tienes bebidas favoritas.</p>
    @endforelse
</div>

@include('errors')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.5.1/dist/sweetalert2.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.5.1/dist/sweetalert2.min.css" rel="stylesheet">

<script>
    // Detectar cuando se haga click en los botones de eliminar de favoritos
    const removeFavoriteButtons = document.querySelectorAll('.unlike-btn');

    removeFavoriteButtons.forEach(button => {
        button.addEventListener('click', function(event) {
            event.preventDefault(); // Evitar el envío del formulario de inmediato
            // Mostrar una alerta de confirmación con SweetAlert
            Swal.fire({
                icon: 'warning',
                title: '¿Estás seguro?',
                text: '¿Quieres eliminar este cóctel de tus favoritos?',
                showCancelButton: true, // Mostrar botón de cancelación
                confirmButtonText: 'Sí, eliminar',
                cancelButtonText: 'Cancelar',
                reverseButtons: true // Opcional, para invertir el orden de los botones
            }).then((result) => {
                if (result.isConfirmed) {
                    // Si el usuario confirma, enviamos el formulario
                    this.closest('form').submit();
                }
            });
        });
    });
</script>

@endsection
