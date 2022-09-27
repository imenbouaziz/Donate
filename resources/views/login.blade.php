@extends('layouts.layout')
@section('page-title')
Login
@endsection
@section('content')
{{ View::make('components.header') }}

<form class="register-form" action="/login-user" method="POST">
    {{-- <div class="error-card">{{ $error }}</div> --}}
    @csrf
    <h3 class="caption">Login</h3>
    <div class="form-item">
        <label for="email">Email Address</label>
        <input value="{{ Session::get('') }}" type="email" name="email" value="{{ old('email') }}" id="email" placeholder="eg. user@example.com" required>
    </div>
    <div class="form-item">
        <label for="password">Password</label>
        <input type="password" name="password" id="password" placeholder="Password" required>
    </div>
    <button type="submit" class="btn btn-blue">Login</button>

    <p>Dont have an acount yet <a href="/register"> Register here</a></p>
</form>
@endsection