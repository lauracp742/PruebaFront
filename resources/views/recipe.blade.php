@extends('layouts.master')

@section('content')



<div class="drink">
    <h2> {{ $drink['strDrink'] }}  </h2>
    <img src=" {{ $drink['strDrinkThumb'] }}" alt="Photo of the drink" />

</div>


@foreach ($ingredients as $ingredient)
<div>
    <p>{{ $ingredient['ingredient'] }}</p>
    <p>{{ $ingredient['measurements'] }} </p>
</div>
@endforeach





@endsection
