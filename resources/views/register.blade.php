@extends('layouts.layout')
@section('page-title')
Register
@endsection
@section('content')
{{ View::make('components.header') }}
<form class="register-form" action="/create-user" method="POST" enctype="multipart/form-data">
    @csrf
    <h3 class="caption">Register</h3>
    <div class="form-item">
        <label for="username">Username</label>
        <input type="text" name="username" id="username" placeholder="username" required>
    </div>
    <div class="form-item">
        <label for="email">Email Address</label>
        <input type="email" name="email" id="email" placeholder="eg. user@example.com" required>
    </div>
    <div class="form-item">
        <label for="password">Password</label>
        <input type="password" name="password" id="password" placeholder="Password" required>
    </div>
    <div class="form-item">
        <label for="category">Category</label>
        <select name="category" id="category" required>
            <option value="" selected disabled>select an option</option>
            <option value="community">Community</option>
            <option value="organisation">Organisation</option>
            <option value="personal">Personal</option>
        </select>
    </div>
    <div class="form-item">
        <label for="description">Description</label>
        <textarea type="description" name="description" id="description" placeholder="Description here" required>
        </textarea>
    </div>
    <div class="form-item">
        <label for="image">Profle Image</label>
        <input type="file" name="image" id="image">
    </div>
    <div class="form-item">
        <label for="facebook_link">Facebook link</label>
        <input type="facebook_link" name="facebook_link" id="facebook_link" placeholder="paste link here" optional>
    </div>
    <div class="form-item">
        <label for="twitter_link">Twitter link</label>
        <input type="twitter_link" name="twitter_link" id="twitter_link" placeholder="paste link here" optional>
    </div>
    <div class="form-item">
        <label for="instagram_link">Instagram link</label>
        <input type="instagram_link" name="instagram_link" id="instagram_link" placeholder="paste link here" optional>
    </div>

    <button type="submit" class="btn btn-blue">Register</button>
</form>

@endsection