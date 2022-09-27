@extends('layouts.layout')
@section('page-title')
Campaigns
@endsection
@section('content')
@if($role =='1')
{{ View::make('components.header') }}

@else
{{ View::make('components.headerr') }}
@endif


<div class="page-start">
    <div class="con">
        <h1 class="large-heading">All Campaigns <span>({{ $campaigns->count() }})</span></h1>
        <div class="all-campaigns">
            @if($campaigns->count() == 0)
            <h3>No Campaigns Have been created yet</h3>
            @else
                @foreach ($campaigns as $campaign)
                    <div class="campaign-card">
                        <img src="{{ asset("public/img/$campaign->image") }}" alt="">
                        <div class="campaign-info">
                            <h1>{{ $campaign->campaign_name }}</h1>
                            <h4><span>By</span> <a href="/user-profile/{{ $campaign->author }}">{{ $campaign->author }}</a> </h4>
                            <div class="donated-amount">{{ $campaign->donated_amount }}DZD</div>
                            <input type="range" name="percentage" id="percentage" value="{{ (($campaign->donated_amount)*100)/$campaign->goal_amount }}" disabled>
                            <div class="card-flex">
                                <div class="percentage">{{ (($campaign->donated_amount)*100)/$campaign->goal_amount }}% Donated</div>
                                <div class="goal">Goal: {{ $campaign->goal_amount }}DZD</div>
                            </div>
                            <p>{{ $campaign->description }}</p>
                            <a href="\donate\{{ $campaign->id }}" class="btn btn-blue">Donate Now</a>
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







