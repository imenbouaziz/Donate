@extends('layouts.layout')
@section('page-title')
Make Donation
@endsection
@section('content')
@if($role =='1')
{{ View::make('components.header') }}

@else
{{ View::make('components.headerr') }}
@endif

<form class="register-form" action="{{url('/create-donation/'.$id)}} " method="POST">
    {{-- <div class="error-card">{{ $error }}</div> --}}
    @csrf
    <h3 class="caption">You are making a donation to {{ $current_campaign['campaign_name'] }}</h3>
    <div class="form-item">
        <label for="amount">Enter AmountT To Donate</label>
        <input type="amount" name="amount" id="amount" placeholder="amount" required>

        <label for="email">Enter note </label>
        <input type="text" name="email" id="email" placeholder="email" required>

        <label for="invoice_to">Enter receiver</label>
        <input type="text" name="invoice_to" id="invoice_to" placeholder="invoice_to" required>

        <label for="phone">Enter phone </label>
        <input type="text" name="phone" id="phone" placeholder="phone" required>

        <label for="address">Enter address </label>
        <input type="text" name="address" id="address" placeholder="address" required>

        <label for="note">Enter note </label>
        <input type="text" name="note" id="note" placeholder="note" required>
    </div>
    <button type="submit" class="btn btn-blue">Donate</button>

</form>

<footer>
    {{ View::make('components.footer') }}
</footer>
@endsection



