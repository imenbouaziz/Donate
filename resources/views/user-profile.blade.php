@extends('layouts.layout')
@section('page-title')
Login
@endsection
@section('content')
@if($role =='1')
{{ View::make('components.header') }}

@else
{{ View::make('components.headerr') }}
@endif
<div class="page-start">
    <div class="con">
        <div class="profile-info-section">
            <img src="{{ asset("public/users/$userDetails->user_image") }}" alt="">
            <div class="profile-info-content">
                <div class="category">{{ $userDetails->category }}</div>
                <div class="name">{{ $userDetails->username }}</div>
                <p class="phone"><span>Phone:</span>(+123) 123-456-789</p>
                <p class="email"><span>Email:</span>{{ $userDetails->email }}</p>
                <p>{{ $userDetails->description }}</p>
                <div class="social-links">
                    <a target="_blank" href="{{ $userDetails->facebook_link }}" class="link"></a>
                    <a target="_blank" href="{{ $userDetails->twitter_link }}" class="link"></a>
                    <a target="_blank" href="{{ $userDetails->instagram_link }}" class="link"></a>
                </div>
            </div>
        </div>
    </div>
</div>

<footer>
    {{ View::make('components.footer') }}
</footer>
@endsection