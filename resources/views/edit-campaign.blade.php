@extends('layouts.layout')
@section('page-title')
Edit Campaign
@endsection
@section('content')
@if($role =='1')
{{ View::make('components.header') }}

@else
{{ View::make('components.headerr') }}
@endif
<form class="register-form" action="/update-campaign/{{ $current_campaign['id'] }}" method="POST" enctype="multipart/form-data">
    @csrf
    <h3 class="caption">Update Campaign</h3>
    <div class="form-item">
        <label for="campaign_name">Campaign Name</label>
        <input value="{{ $current_campaign['campaign_name'] }}" type="text" name="campaign_name" id="campaign_name" placeholder="name" required>
    </div>
    <div class="form-item">
        <label for="goal_amount">Goal Amount</label>
        <input type="text" name="goal_amount" id="goal_amount" value="{{ $current_campaign['goal_amount'] }}" placeholder="amount" required>
    </div>
    <div class="form-item">
        <label for="description">Description</label>
        <textarea type="description" name="description" id="description" required>
            {{ $current_campaign['description'] }}
        </textarea>
    </div>
    <div class="form-item">
        <label for="image">Profle Image</label>
        <input type="file" name="image" value="{{ $current_campaign['image'] }}" id="image">
        {{-- <input type="text" name="id" value="{{ $current_campaign['id'] }}" id="image"> --}}
    </div>

    <button type="submit" class="btn btn-blue">Upadate Campaign</button>
</form>
<footer>
    {{ View::make('components.footer') }}
</footer>
@endsection

