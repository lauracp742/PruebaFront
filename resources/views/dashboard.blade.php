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



                    @forelse ($user->favorites as $favorite)

                    @if ($drink['strDrink'] === $favorite->name)
                    <form action="delete" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{ $favorite->id }}" />
                        <button type="submit">Unlike</button>
                    </form>
                    @endif
                    @empty
                    <form action="/favorites" method="POST">
                        @csrf
                        <input type="hidden" name="image" value=" {{ $drink['strDrinkThumb'] }}" />
                        <input type="hidden" name="name" value=" {{ $drink['strDrink'] }}" />
                        <button type="submit">Like</button>
                    </form>

                    @endforelse


            </div>
            @endforeach
        @endif
    @endif


@include('errors')


@endsection
