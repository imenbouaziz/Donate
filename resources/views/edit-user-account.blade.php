@extends('layouts.layout')
@section('page-title')
Edit Account
@endsection
@section('content')
{{ View::make('components.headerr') }}

<form class="register-form" action="/update-user-profile/{{ session('user')->username }}" method="POST" enctype="multipart/form-data">
    @csrf
    <h3 class="caption">Register</h3>
    <div class="form-item">
        <label for="username">Username</label>
        <input value="{{ session('user')->username }}" type="text" name="username" id="username" placeholder="username" required>
    </div>
    <div class="form-item">
        <label for="email">Email Address</label>
        <input value="{{ session('user')->email }}" type="email" name="email" id="email" placeholder="eg. user@example.com" required>
    </div>
    {{-- <div class="form-item">
        <label for="password">Confirm your password</label>
        <input type="password" name="password" id="password" placeholder="Password" required>
    </div> --}}
    <div class="form-item">
        <label for="category">Category</label>
        <select name="category" id="category" required>
            <option value=""selected disabled>select an option</option>
            <option value="community">Community</option>
            <option value="organisation">Organisation</option>
            <option value="personal">Personal</option>
        </select>
    </div>
    <div class="form-item">
        <label for="description">Description</label>
        <textarea type="description" name="description" id="description" placeholder="Description here" required>
            {{ session('user')->description }}
        </textarea>
    </div>
    <div class="form-item">
        <label for="image">Profle Image</label>
        <input value="{{ session('user')->user_image }}" type="file" name="image" id="image">
    </div>
    <div class="form-item">
        <label for="facebook_link">Facebook link</label>
        <input value="{{ session('user')->facebook_link }}" type="facebook_link" name="facebook_link" id="facebook_link" placeholder="paste link here" required>
    </div>
    <div class="form-item">
        <label for="twitter_link">Twitter link</label>
        <input value="{{ session('user')->twitter_link }}" type="twitter_link" name="twitter_link" id="twitter_link" placeholder="paste link here" required>
    </div>
    <div class="form-item">
        <label for="instagram_link">Instagram link</label>
        <input value="{{ session('user')->instagram_link }}" type="instagram_link" name="instagram_link" id="instagram_link" placeholder="paste link here" required>
    </div>

    <button type="submit" class="btn btn-blue">Update Profile</button>
</form>

<footer>
    {{ View::make('components.footer') }}
</footer>
@endsection