@extends('layouts.master')

@section('content')

<div>

     @forelse ($user->favorites as $favorite)
    <div class="drink">
        <p>{{ $favorite->name }}</p>
        <img src="{{ $favorite->image }}" />
    </div>

    @empty
    <p>You don't have any favorites yet</p>
    @endforelse
</div>

@include('errors')


@endsection
