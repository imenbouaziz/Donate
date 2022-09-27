@extends('layouts.layout')
@section('page-title')
My Donations
@endsection
@section('content')
@if($role =='1')
{{ View::make('components.header') }}

@else
{{ View::make('components.headerr') }}
@endif
<?php 
    use App\Models\Campaign;
    use App\Models\Donation; 
 

    $totalDonationAmount = 0;
    foreach($donations as $donation) {
        $totalDonationAmount += $donation->amount;
    }
?>
<body>
<div class="page-start">
    <div class="con">
        <div class="info-card">
            <div class="sub-info">
                <p>Number of donations:</p><span>{{ $donations->count() }}</span>
            </div>
            <div class="sub-info">
                <p>Total donation amount:</p><span>{{ $totalDonationAmount }}DZD</span>
            </div>
        </div>
        <table>
            <thead>
                <tr>
                    <th>Amount</th>
                    <th>Receiver campaign</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($donations as $donation)
                <tr>
                   
                    <td>{{ $donation->amount }}</td>
                    <td>{{ $donation->invoice_to}}</td>
                    <td>{{ $donation->created_at }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    </div>
</body>
<footer>
    {{ View::make('components.footer') }}
</footer>

@endsection

