@extends('layouts.master')

@include('errors')

@section('content')
    {{-- This is the body content, within the container --}}
    <section class="login-form">
        <div class="form-container">
            <h1>Login</h1>

            <form action="login" method="post">
            @csrf

                <div>
                    <label for="email">Email</label>
                </div>
                <div>
                    <input name="email" id="email" type="email" placeholder="example@example.com" />
                </div>
                <div>
                    <label for="password">Password</label>
                </div>
                <div>
                    <input name="password" id="password" type="password" placeholder="Please enter your password"/>
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
