@extends('layouts.master')

@section('content')

<div>
    @foreach ($user->favorites as $favorite)
    <div class="drink">
        <p>{{ $favorite->name }}</p>
        <img src="{{ $favorite->image }}" />
    </div>
    @endforeach
</div>

@include('errors')


@endsection
