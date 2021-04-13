@extends('layouts.master')

@section('content')

<div>


     @forelse ($user->favorites as $favorite)
    <div class="drink">
        <p>{{ $favorite->name }}</p>
        <a href=" {{ route('recipe', $favorite->drink_id) }}" aria-label="link to recipe">
        <img src="{{ $favorite->image }}" />
        </a>
    </div>

    @empty
    <p>You don't have any favorites yet</p>
    @endforelse
</div>

@include('errors')


@endsection
