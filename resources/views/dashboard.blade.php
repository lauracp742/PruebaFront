@extends('layouts.master')

@section('content')

<p>Hello, {{ $user->name }}! Do you want to <a href="logout">logout</a>?</p>


<form action="search" method="GET">
    <div>
        <label for="search">Search for drinks</label>
        <input name="search" id="search" type="text" />
        <button type="submit">Search</button>
    </div>
</form>

{{-- @dd($response) --}}

 @foreach($response['drinks'] as $drink)
<h2> {{ $drink['strDrink'] }}  </h2>
<img src=" {{ $drink['strDrinkThumb'] }}" />
@endforeach
@include('errors')

@endsection
