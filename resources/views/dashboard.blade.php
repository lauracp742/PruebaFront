@extends('layouts.master')

@section('content')



<div class="container">
    <form action="search" method="GET">
        <div class="search-container">
            <div>
                <label hidden for="search">Search for drinks</label>
            </div>
            <input name="search" id="search" type="text" placeholder="search for a drink" />
            <button type="submit">Search</button>
        </div>
    </form>

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


                @if ($favorite = $user->favorites->firstWhere('name', $drink['strDrink']))
                        <form action="delete" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{ $favorite->id }}" />
                            <button type="submit">Unlike</button>
                        </form>
                    @else
                    <form action="/favorites" method="POST">
                        @csrf
                        <input type="hidden" name="image" value=" {{ $drink['strDrinkThumb'] }}" />
                        <input type="hidden" name="name" value=" {{ $drink['strDrink'] }}" />
                        <button type="submit">Like</button>
                    </form>
                @endif
            </div>
        @endforeach
    @endif
@endif


@include('errors')


@endsection
