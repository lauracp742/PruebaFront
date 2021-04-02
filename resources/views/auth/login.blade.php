@extends('layouts.master')


@section('content')
    {{-- This is the body content, within the container --}}
    <section class="login-form">
        <div class="form-container">
            <h1>Login</h1>

            <form action="/login" method="post">
            @csrf

                <div>
                    <label for="email">Email</label>
                    <input name="email" id="email" type="email" />
                </div>
                <div>
                    <label for="password">Password</label>
                    <input name="password" id="password" type="password" />
                </div>

                <button type="submit">Login</button>

            </form>

        <a href="/register"> Not a user? Register here </a>
        </div>
    </section>
@error('email')
<div class="">
    {{ $message }}
</div>
@enderror



 @endsection
 {{-- This ends the body --}}
