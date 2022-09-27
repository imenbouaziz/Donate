@extends('layouts.layout')
@section('page-title')
confirm-donation
@endsection
@section('content')

@if($role =='1')
{{ View::make('components.header') }}

@else
{{ View::make('components.headerr') }}
@endif
<div class="page-start">
    <div class="con">
        <div class="success-card">
            <h1>Successfull Donation</h1>
            <div class="donation-info">
                <ul>
                @if($role =='1')
                    <a href="\" class="btn btn-blue">confirm</a>
                    @else
                    <a href="\home" class="btn btn-blue">confirm</a>
                    @endif

                </ul>
            </div>

        </div>
    </div>
</div>
