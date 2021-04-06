@extends('layouts.master')

@section('content')

<div>

     @forelse ($user->favorites as $favorite)
    <div class="drink">
        <p>{{ $favorite->name }}</p>
        <img src="{{ $favorite->image }}" />
    </div>
    @endforelse
</div>

@include('errors')


@endsection
