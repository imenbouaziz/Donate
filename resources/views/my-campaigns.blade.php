@extends('layouts.layout')
@section('page-title')
My Campaigns
@endsection
@section('content')
{{ View::make('components.header') }}


<div class="page-start">
    <div class="con">
        <h1 class="large-heading">All My Campaigns <span>({{ $campaigns->count() }})</span> </h1>
        <div class="all-campaigns">
            @if($campaigns->count() == 0)
            <h3>You have not created any campaigns yet</h3>
            @else 
                @foreach ($campaigns as $campaign)
                <div class="campaign-card">
                    <img src="{{ asset("public/img/$campaign->image") }}" alt="">
                    <div class="campaign-info">
                        <h1>{{ $campaign->campaign_name }}</h1>
                        <h4><span>By</span> {{ $campaign->author }}</h4>
                        <div class="donated-amount">{{ $campaign->donated_amount }}FCFA</div>
                        <input type="range" name="percentage" id="percentage" value="{{ (($campaign->donated_amount)*100)/$campaign->goal_amount }}" disabled>
                        <div class="card-flex">
                            <div class="percentage">{{ (($campaign->donated_amount)*100)/$campaign->goal_amount }}% Donated</div>
                            <div class="goal">Goal: {{ $campaign->goal_amount }}FCFA</div>
                        </div>
                        <p>{{ $campaign->description }}</p>
                        <div class="card-flex">
                            <a href="\edit-campaign\{{ $campaign->id }}" class="btn btn-blue">Edit</a>
                            <button href="" class="btn btn-red delete-btn">Delete</button>
                            <button href="" class="btn btn-red cancel-delete">Cancel</button>
                            <a href="\delete-campaign\{{ $campaign->id }}" class="btn btn-red confirm-delete">Confirm</a>
                        </div>
                    </div>
                </div>
                @endforeach
            @endif
        </div>
    </div>
</div>

<footer>
    {{ View::make('components.footer') }}
</footer>
@endsection













