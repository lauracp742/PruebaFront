@extends('layouts.master')

@section('content')




<form action="search" method="GET">
    <div>
        <label for="search">Search for drinks</label>
        <input name="search" id="search" type="text" />
        <button type="submit">Search</button>
    </div>
</form>

{{-- @dd($response) --}}
@if($response ?? '')
<div class="container">
    @foreach($response['drinks'] as $drink)
     <div class="drink">
        <h2> {{ $drink['strDrink'] }}  </h2>
        <img src=" {{ $drink['strDrinkThumb'] }}" />
        <button>Like</button>
    </div>
    @endforeach
</div>
@endif

@include('errors')

@endsection
