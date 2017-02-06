@extends('layout')

@php
    $errors->setFormat('<div class="alert alert-danger">:message</div>');
@endphp

@section('content')
<div class="window-container">
    <header>
        <h2 class="window-title">{{ $title }}</h2>
    </header>
    <form action="{{ action('AuthController@store') }}" class="form" method="post">
        {{ csrf_field() }}
        {!! $errors->first('server') !!}
        <div>
            <label for="username" class="form-label">Username</label>
            <input type="text" value="{{ old('username') }}" name="username" id="username" class="form-control" placeholder="Example: johndoe" required>
            {!! $errors->first('username') !!}
        </div>
        <div>
            <label for="email" class="form-label">Email address</label>
            <input type="email" value="{{ old('email') }}" name="email" id="email" class="form-control" placeholder="Example: johndoe@example.com" required>
            {!! $errors->first('username') !!}
        </div>
        <div>
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" id="password" class="form-control" required>
            {!! $errors->first('password') !!}
        </div>
        <div>
            <label for="password_confirmation" class="form-label">Repeat password_confirmation</label>
            <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Repeat your password" class="form-control" required>
            {!! $errors->first('password_confirmation') !!}
        </div>
        <?php // TODO: ReCaptcha ?>
        <footer>
            <div style="text-align: right;">
                <button type="submit" class="btn">Register</button>
            </div>
        </footer>
    </form>
</div>
@endsection
