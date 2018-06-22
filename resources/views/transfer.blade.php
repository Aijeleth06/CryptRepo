@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Transfer Funds</div>

                <div class="panel-body">
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                    <div class="row">
                        <div class="col-lg-12">
                            <form method="post" action="{{ route('transfer.submit') }}" class="form-horizontal">
                                {{ csrf_field() }}

                                <div class="form-group"><label class="col-sm-2 control-label">Wallet Address</label>
                                    <div class="col-sm-10"><input type="text" name="address" placeholder="Your Address" class="form-control" value="{{ old('address') }}" required></div>
                                </div>

                                <div class="form-group"><label class="col-sm-2 control-label">Coin Amount</label>
                                    <div class="col-sm-10"><input type="number" name="amount" placeholder="Enter amount" class="form-control" value="{{ old('amount') }}" required></div>
                                </div>

                                <div class="hr-line-dashed"></div>

                                <div class="hr-line-dashed"></div>

                                <div class="hr-line-dashed"></div>

                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-2">
                                        <button class="btn btn-success" type="submit">Send Funds</button>
                                    </div>
                                </div>
                            </form>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">  
        $('#datepicker').datepicker({ 
            autoclose: true,   
            format: 'dd-mm-yyyy'  
         });  
    </script>
@endsection
