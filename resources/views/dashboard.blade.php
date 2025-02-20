@extends('layouts.master')

@section('content')
<div class="search-form-font">
    <form class="search-form" action="search" method="GET">
        <div class="search-container">
            <div>
                <label hidden for="search">Buscar Bebida</label>
            </div>
            <input name="search" id="search" type="text" placeholder="Buscar Bebida" />
            <button type="submit">Buscar</button>
        </div>
    </form>
</div>

@include('errors')

<div class="container">
    @if($response ?? '')
        @if(is_array($response['drinks']) && count($response['drinks']) > 0)
            @foreach($response['drinks'] as $drink)
                <div class="drink">
                    <a href=" {{ route('recipe', $drink['idDrink']) }}" aria-label="link to recipe">
                        <img src=" {{ $drink['strDrinkThumb'] }}" alt="Photo of the drink" /> 
                    </a>
                    <h2>{{ $drink['strDrink'] }}</h2>

                    @if ($favorite = $user->favorites->firstWhere('name', $drink['strDrink']))
                        <form action="delete" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{ $favorite->id }}" />
                            <button type="submit" class="unlike-btn" style="background-color: #f57e65; font-size: medium;">Eliminar de favoritos</button>
                        </form>
                    @else
                        <form action="/favorites" method="POST">
                            @csrf
                            <input type="hidden" name="image" value="{{ $drink['strDrinkThumb'] }}" />
                            <input type="hidden" name="name" value="{{ $drink['strDrink'] }}" />
                            <input type="hidden" name="drink_id" value="{{ $drink['idDrink'] }}" />
                            <button class="add-favorite-btn" type="submit" style="background-color: rgb(192 245 190); font-size: medium;">Agregar a favoritos</button>
                        </form>
                    @endif
                </div>
            @endforeach
        @else
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.5.1/dist/sweetalert2.min.js"></script>
            <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.5.1/dist/sweetalert2.min.css" rel="stylesheet">
            <script>
                // Mostrar una alerta con SweetAlert2 si no se encuentran bebidas
                Swal.fire({
                    icon: 'info',
                    title: 'No hay resultados',
                    text: 'Lo siento, debes ingresar un valor para buscar.',
                    confirmButtonText: 'Aceptar'
                });
            </script>
        @endif
    @endif
</div>



<style>
.cocktail-section {
    padding: 40px 20px;
    background-color: #fafafa;
    text-align: center;
}

.cocktail-section h2 {
    font-size: 24px;
    font-weight: bold;
    color: #333;
    margin-bottom: 30px;
}

.cocktail-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(250px, 1fr)); /* Hace que las tarjetas se ajusten bien en pantallas pequeñas */
    gap: 20px;
    padding: 0 20px;
}

.cocktail-card {
    background-color: white;
    border-radius: 10px;
    padding: 15px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    text-align: center;
}

.cocktail-card img {
    width: 100%;
    border-radius: 10px;
    margin-bottom: 15px;
    object-fit: cover;
    height: 200px; /* Fija la altura de la imagen para uniformidad */
    transition: transform 0.3s ease;
}

.cocktail-card h3 {
    font-size: 18px;
    font-weight: 600;
    color: #333;
    margin-bottom: 10px;
}

.cocktail-card a {
    display: inline-block;
    color: #007bff;
    text-decoration: none;
    font-weight: bold;
    margin-top: 10px;
    transition: color 0.3s ease;
}

.cocktail-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
}

.cocktail-card a:hover {
    color: #0056b3;
}
</style>


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.5.1/dist/sweetalert2.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.5.1/dist/sweetalert2.min.css" rel="stylesheet">

<script>
    // Detectar cuando se haga click en los botones de agregar a favoritos
    const favoriteButtons = document.querySelectorAll('.add-favorite-btn');

    favoriteButtons.forEach(button => {
        button.addEventListener('click', function(event) {
            event.preventDefault(); // Evitar el envío del formulario de inmediato
            // Mostrar la alerta de SweetAlert
            Swal.fire({
                icon: 'success',
                title: '¡Cóctel agregado!',
                text: 'El cóctel ha sido guardado en tus favoritos.',
                confirmButtonText: 'Aceptar'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Retrasar el envío del formulario
                    setTimeout(() => {
                        this.closest('form').submit(); // Ahora podemos enviar el formulario
                    }, 500); // Retraso de 500ms
                }
            });
        });
    });

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
