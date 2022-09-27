<?php
    if(Session::has('user')) {
        $userImage = session('user')->user_image;
    }
?>
<header class="scroll">
    <div class="header-sub-1">
        <div class="logo"><a href="/home">Donate</a></div>
        <nav>
            <ul>
                <li><a href="/home">Home</a></li>
                <li><a href="\all-campaigns">All Campaigns</a></li>
                @if (Session::has('user'))
                
                <li><a href="/my-donations">My Donnations</a></li>
                @endif
            </ul>
        </nav>
    </div>
    <div class="header-sub-2">
        
        <a class="btn btn-blue" href="\all-campaigns">Act now</a>
        @if (!Session::has('user'))
        @if(!Session::has('user'))
            @if(!Route::has('/register'))
            <a class="btn btn-red" href="/login">Login</a>
            @elseif (Route::has('/login'))
            <a class="btn btn-red" href="/login">Login</a>
            @else
            <a class="btn btn-red" href="/register">Register</a>
            @endif
        @endif
        @else 
        <div class="user-menu">
            <button class="user-card"><img src="{{ asset("public/users/$userImage") }}" alt=""> {{ session('user')['username'] }}</button>
            <ul>
                <li><a href="/user-profile/{{ session('user')['username'] }}">Profile</a></li>
                <li><a href="/edit-user-account">Update Profile</a></li>
                <li><a href="/logout">Logout</a></li>
            </ul>
        </div>
        @endif
    </div>
</header>