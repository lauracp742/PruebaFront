<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/login.css">
    <title>Your best beer app</title>
</head>
<body>
    <header>
       <nav>
           <ul>
        </ul>
        <li><a href="dashboard"> Home </a></li>

        @if (Auth::check())
        <li><a href="favorites">Your Favorites</a></li>

        <li><a href="logout"> Logout </a></li>


       </nav>
       <form action="search" method="GET">
        <div>
            <label for="search">Search for drinks</label>
            <input name="search" id="search" type="text" />
            <button type="submit">Search</button>
        </div>
        @endif
    </form>
    </header>
    <main>

        @yield('content')
        <!-- This is a container for content
        Yield is used to display the contents of a given section-->

    </main>


</body>
</html>
