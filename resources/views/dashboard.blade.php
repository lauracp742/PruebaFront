@extends('layouts.master')

@section('content')

<form class="search-form" action="search" method="GET">
    <div class="search-container">
        <div>
            <label hidden for="search">Search for drinks</label>
        </div>
        <input name="search" id="search" type="text" placeholder="Search for a drink" />
        <button type="submit">Search</button>
    </div>
</form>

@include('errors')
<div class="container">



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
                <a href=" {{ route('recipe', $drink['idDrink']) }}" aria-label="link to recipe">
                    <img src=" {{ $drink['strDrinkThumb'] }}" alt="Photo of the drink" /> </a>
                <h2> {{ $drink['strDrink'] }}  </h2>



                @if ($favorite = $user->favorites->firstWhere('name', $drink['strDrink']))
                        <form action="delete" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{ $favorite->id }}" />
                            <button type="submit" class="unlike-btn">Remove from favorites</button>
                        </form>
                    @else
                    <form action="/favorites" method="POST">
                        @csrf
                        <input type="hidden" name="image" value=" {{ $drink['strDrinkThumb'] }}" />
                        <input type="hidden" name="name" value=" {{ $drink['strDrink'] }}" />
                        <input type="hidden" name="drink" value=" {{ $drink['idDrink'] }}" />
                        <button type="submit">Add to favorites</button>
                    </form>
                @endif
            </div>
        @endforeach
    @endif
@endif





@endsection
