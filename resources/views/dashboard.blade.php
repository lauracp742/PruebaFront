@extends('layouts.master')

@section('content')

<p>Hello, {{ $user->name }}! Do you want to <a href="logout">logout</a>?</p>


<form action="search" method="get">
    <div>
        <label for="search">Search for drinks</label>
        <input name="search" id="search" type="text" />
    </div>
</form>
@include('errors')

@endsection
