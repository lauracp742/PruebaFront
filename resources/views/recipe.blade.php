@extends('layouts.master')

@section('content')



<div class="recipe-img-container">
    <h1 class="title"> {{ $drink['strDrink'] }}  </h1>
    <img class="recipe-img" src=" {{ $drink['strDrinkThumb'] }}" alt="Photo of the drink" />

</div>
<div class="recipe-container">
    <div class="ingredients">
    <h2> Ingredients</h2>
    @foreach ($ingredients as $ingredient)
    <ul>
        <li>{{ $ingredient['ingredient'] }}</li>
    </ul>
        <p>{{ $ingredient['measurements'] }} </p>
        @endforeach
    </div>

    <div class="ingredients">
    <h3>Instructions</h3>
        <p>{{ $drink['strInstructions'] }}</p>
    </div>
</div>




@endsection
