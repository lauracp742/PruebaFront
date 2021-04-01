<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Your best beer app</title>
</head>
<body>
    <header>
        @yield('header')
    </header>
    <div class="container">

        @yield('content')
        <!-- This is a container for content
        Yield is used to display the contents of a given section-->

    </div>


</body>
</html>
