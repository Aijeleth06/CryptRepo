@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Account lists</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    @component('components.who')

                    @endcomponent
<table class="table table-striped"> 
	<thead>
		<tr>
			<th>ID</th>
			<th>Name</th>
			<th>Email</th>
			<th>Wallet</th>
			<th>Coins</th>
		</tr>
	</thead>
	<tbody>
					@if(count($wallets) > 0)
                    	@foreach($wallets as $wallet)
                    	<tr>
                    	<td>{{$wallet->id}}</td>
                    	<td>{{$wallet->user->first_name}} {{$wallet->user->last_name}}</td>
                    	<td>{{$wallet->user->email}}</td>
                    	<td>{{$wallet->wallet_address}}</td>
                    	<td>{{$wallet->user_coins}}</td>
                    	<tr>
                    	@endforeach
                    	{{$wallets->links()}}
                   	@else
                   		<p>No users yet.</p>
                    @endif
	</tbody>
</table>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
