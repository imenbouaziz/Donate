@extends('layouts.layout')
@section('page-title')
Create Campaign
@endsection
@section('content')
{{ View::make('components.header') }}

<form class="register-form" action="/create-campaign" method="POST" enctype="multipart/form-data">
    @csrf
    <h3 class="caption">Creatt Campaign</h3>
    <div class="form-item">
        <label for="name">Campaign Name</label>
        <input type="text" name="name" id="name" placeholder="name" required>
    </div>
    <div class="form-item">
        <label for="goal_amount">Goal Amount</label>
        <input type="text" name="goal_amount" id="goal_amount" placeholder="amount" required>
    </div>
    <div class="form-item">
        <label for="description">Description</label>
        <textarea type="description" name="description" id="description" placeholder="" required>
        </textarea>
    </div>
    <div class="form-item">
        <label for="image">Profle Image</label>
        <input type="file" name="image" id="image">
    </div>

    <button type="submit" class="btn btn-blue">Create Your Campaign</button>
</form>
<footer>
    {{ View::make('components.footer') }}
</footer>
@endsection