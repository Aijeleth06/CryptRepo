@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Crypto Tokens</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

<table class="table table-striped"> 
	<thead>
		<tr>
			<th>No.</th>
			<th>Coin Name</th>
			<th>Price</th>
			<th>Volume</th>
			<th>Circulating Supply</th>
		</tr>
	</thead>
	<tbody>
					@if(count($coins) > 0)
                    	@foreach($coins as $coin)
                    	<tr>
                    	<td>{{$coin->id}}</td>
                    	<td>{{$coin->name}}</td>
                    	<td><a href="{{ route('admin.edit.coin', $coin) }}">{{$coin->price}}</td>
                    	<td>{{$coin->volume}}</td>
                    	<td>{{$coin->circulatingsupply}}</td>
                    	<tr>
                    	@endforeach
                    	{{$coins->links()}}
                   	@else
                   		<p>No coin yet.</p>
                    @endif
	</tbody>
</table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
