@extends('layouts.layout')
@section('page-title')
Home
@endsection
@section('content')
  
<?php
if(Session::has('user')) {
    $userImage = session('user')->user_image;
}
?>

<header id="home-header">
    <div class="header-sub-1">
        <div class="logo"><a href="/">Donate</a></div>
        <nav>
            <ul>
                <li><a href="/">Home</a></li>
                <li><a href="/all-campaigns">All Campaigns</a></li>
                @if (Session::has('user'))
                <li><a href="\my-campaigns/{{ session('user')->username }}">My Campaigns</a></li>
                @endif
                @if (Session::has('user'))
                {{-- <li><a href="/user-profile/{{ session('user')->username }}">My Profile</a></li> --}}
                <li><a href="/my-donations">My Donnations</a></li>
                @endif
            </ul>
        </nav>
    </div>
    <div class="header-sub-2">
        <a class="btn btn-blue" href="/create-campaign">Create Campaign</a>
        @if (!Session::has('user'))
        <a class="btn btn-red" href="/register">Register</a>
        @else 
        <div class="user-menu">
            <button class="user-card"><img src="{{ asset("public/users/$userImage") }}" alt=""> {{ session('user')['username'] }}</button>
            <ul>
                <li><a href="/user-profile/{{ session('user')['username'] }}">Profile</a></li>
                <li><a href="\edit-user-account">Update Profile</a></li>
                <li><a href="/logout">Logout</a></li>
            </ul>
        </div>
        @endif
    </div>
</header>
<div id="hero">
    <h1>Donate And Change Lives</h1>
    <p>Create, and contribute to multiple campaigns.</p>
    <span>
        <a href="\all-campaigns" class="btn btn-blue">Act Now</a>
        @if(!Session::has('user'))
        <a href="/login" class="btn btn-red">Login</a>
        @endif
    </span>
</div>
<div class="intro">
    <div class="intro-1">
        <p>The long journey to save lives begins with a simple donation.</p>
        <a href="" class="btn-border">Donate Now</a>
    </div>
    <div class="intro-2">
        <p>Want to lunch a new campaign ?</p>
        <a href="/create-campaign" class="btn-border">Create Campaign</a>
    </div>
    <div class="intro-3"></div>
</div>
<footer>
    {{ View::make('components.footer') }}
</footer>
@endsection


