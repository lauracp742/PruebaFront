@extends('layouts.master')

@section('content')

<section class="register-form">
    <div class="form-container">
        <h1>Register</h1>
        <form action="/register" method="post">
            @csrf
            <div>
                <label for="name">Name</label>
                <input name="name" id="name" type="name" />
            </div>
            <div>
                <label for="email">Email</label>
                <input name="email" id="email" type="email" />
            </div>
            <div>
                <label for="password">Password</label>
                <input name="password" id="password" type="password" />
            </div>

            <button type="submit">Register</button>
        </form>

        @error('email')
        <div class="">
            {{ $message }}
        </div>
        @enderror

    </div>
</section>

@endsection
