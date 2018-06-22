@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">Account Balance</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p class="text-success">EzerCoin {{$mywallet->user_coins}}</p>
                    <p class="text-success">EzerCoin Wallet Address {{$mywallet->wallet_address}}</p>
                </div>
            </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">USER Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    @component('components.who')

                    @endcomponent
                     <p class="text-success">Your account is: {{ auth()->user()->verified() ? 'Verified' : 'Not Verified' }}</p> 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
