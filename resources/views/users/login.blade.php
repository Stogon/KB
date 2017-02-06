@extends('layout')

@php
    $errors->setFormat('<div class="alert alert-danger">:message</div>');
@endphp

@section('content')
<div class="window-container">
    <header>
        <h2 class="window-title">{{ $title }}</h2>
    </header>
    <form action="{{ action('AuthController@authenticate') }}" class="form" method="post">
        {{ csrf_field() }}
        {!! $errors->first('account') !!}
        <div>
            <label for="username" class="form-label">Username</label>
            <input type="text" value="{{ old('username') }}" name="username" id="username" class="form-control" placeholder="Example: johndoe, johndoe@example.com or DOMAIN\johndoe" required>
            {!! $errors->first('username') !!}
        </div>
        <div>
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" id="password" class="form-control" required>
            {!! $errors->first('password') !!}
        </div>
        <div style="margin: 6px 0;">
            <label for="remember">Remember me: </label>
            <input type="checkbox" name="remember" id="remember" {{ !empty(old('remember')) ? 'checked="checked"' : null }}>
        </div>
        <footer class="row">
            <div class="col-xs-6">
                <a href="#">Password lost ?</a>
            </div>
            <div class="col-xs-6" style="text-align: right;">
                <button type="submit" class="btn">Login</button>
            </div>
        </footer>
    </form>
</div>
@endsection
