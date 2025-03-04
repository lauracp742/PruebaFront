<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/login.css">
    <link rel="stylesheet" href="/css/search-field.css">
    <link rel="stylesheet" href="/css/recipe.css">
    <title>Tu Bebida Favorita</title>
</head>
<body>
    <header>
       <nav>
           <ul>
                <li>
                    <a href="{{route('dashboard')}} "> Inicio </a>
                </li>

                @if (Auth::check())
                <li>
                    <a href={{route("favorites")}}>Favoritos</a>
                </li>

                <li>
                    <a href={{route("logout")}}> Logout </a>
                </li>

                @endif
            </ul>
       </nav>


    </header>
    <section>

        @yield('content')
        <!-- This is a container for content
        Yield is used to display the contents of a given section-->

    </section>


</body>
</html>
