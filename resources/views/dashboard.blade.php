@extends('layouts.master')

@section('content')



<div class="container">

<form action="search" method="GET">
    <div>
        <label for="search">Search for drinks</label>
        <input name="search" id="search" type="text" />
        <button type="submit">Search</button>
    </div>
</form>

{{-- @dd($response) --}}



@if($response ?? '')
    @if($response['drinks'] === null )
        @error('search')
        <div class="">
            {{ $message }}
        </div>
        @enderror
    @else
    @foreach($response['drinks'] as $drink)
     <div class="drink">
        <h2> {{ $drink['strDrink'] }}  </h2>
        <img src=" {{ $drink['strDrinkThumb'] }}" />
        <form action="/favorites" method="POST">
            @csrf
            <input type="hidden" name="image" value=" {{ $drink['strDrinkThumb'] }}" />
            <input type="hidden" name="name" value=" {{ $drink['strDrink'] }}" />
            <button type="submit">Like</button>
        </form>

    </div>

    @endforeach
@endif
@endif


@include('errors')





@endsection
