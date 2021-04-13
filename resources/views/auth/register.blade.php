@extends('layouts.master')

@section('content')

<section class="login-form">
    <div class="form-container">
        <h1>Register</h1>
        <form action="/register" method="post">
            @csrf
            <div>
                <label for="name">Name</label>
            </div>
            <div>
                <input name="name" id="name" type="name" placeholder="First name"/>
            <div>
                    <label for="email">Email</label>
             </div>
             <div>
                <input name="email" id="email" type="email" placeholder="example@example.com"/>
            </div>
            <div>
                <label for="password">Password</label>
            </div>
            <div>
                <input name="password" id="password" type="password" placeholder="Enter a unique password" />
            </div>

            <button type="submit">Register</button>
        </form>


        @include('errors')

    </div>
</section>

@endsection
