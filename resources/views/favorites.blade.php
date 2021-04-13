@extends('layouts.master')

@section('content')
<h1 class="title">Your favorite drinks</h1>
<div class="container">


     @forelse ($user->favorites as $favorite)

    <div class="drink">
        <a href=" {{ route('recipe', $favorite->drink_id) }}" aria-label="link to recipe">
        <img src="{{ $favorite->image }}" />
        </a>
        <h2>{{ $favorite->name }}</h2>
        <form action="delete" method="post">
            @csrf
            <input type="hidden" name="id" value="{{ $favorite->id }}" />
            <button type="submit" class="unlike-btn">Remove from favorites</button>
        </form>
    </div>

    @empty
    <p class="favorite-error">Oh no! You don't have any favorites yet.</p>
    @endforelse
</div>

@include('errors')


@endsection
