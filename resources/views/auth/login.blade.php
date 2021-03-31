{{-- @extends('layouts.master')
@section('content')

@yield('content')
@error('email')
<div class="">
    {{ $message }}
</div>
@enderror --}}

<section class="post-forms">
     <div class="post-container">

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

{{-- @endsection --}}
