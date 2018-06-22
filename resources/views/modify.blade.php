@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Crypto Tokens</div>

                <div class="panel-body">
                    @if (session('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif

<form class="form-horizontal" id="update-order-status-form" method="post" action="{{ route('admin.update.coin', $coin) }}">

                        {{ csrf_field() }}
                        {!! method_field('patch') !!}

                        <fieldset>

                            <div class="form-group m-b-lg">
                                <label class="control-label col-lg-3">Coin ID</label>
                                <div class="col-lg-8">
                                     <div class="line-up-form">{{ $coin->id }}</div>
                                </div> <!-- /controls -->
                            </div> <!-- /form-group -->

                            <div class="form-group m-b-lg">
                                <label class="control-label col-lg-3">Name</label>
                                <div class="col-lg-8">
                                     <div class="line-up-form">{{ $coin->name }}</div>
                                </div> <!-- /controls -->
                            </div> <!-- /form-group -->

                            <div class="form-group">
                                <label for="status_id" class="control-label col-lg-3">Price</label>
                                <div class="controls col-lg-8">

                                    <input id="crypt"  type="text" name="new_price" placeholder="New Price" value="{{ $coin->price }}" class="form-control" required>

                                </div> <!-- /controls -->
                            </div> <!-- /form-group -->



                            <div class="form-group">
                                <div class="col-lg-3"></div>
                                <div class="controls col-lg-8">
                                    <div class="form-actions">
                                        <button type="submit" id="update-coin" class="btn btn-success">Update Coin</button>
                                    </div> <!-- /form-actions -->
                                </div>
                            </div>

                        </fieldset>

                    </form>





                    {{-- <a class="btn btn-primary" href="{{ route('admin.orders') }}">Back to Admin Dashboard</a> --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
