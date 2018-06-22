@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Account Information</div>

                <div class="panel-body">
                    @if (session('error_ac'))
                        <div class="alert alert-danger">
                            {{ session('error_ac') }}
                        </div>
                    @endif
                        @if (session('success_ac'))
                            <div class="alert alert-success">
                                {{ session('success_ac') }}
                            </div>
                        @endif

                    <div class="row">
                        <div class="col-lg-12">
                            <form method="post" action="{{ route('account.edit.submit') }}" class="form-horizontal">
                                {{ csrf_field() }}

                                <div class="form-group"><label class="col-sm-2 control-label">Address</label>
                                    <div class="col-sm-10"><input type="text" name="address" value="{{ old('address') }}" placeholder="Your Address" class="form-control"></div>
                                </div>

                                <div class="form-group"><label class="col-sm-2 control-label">Date of Birth</label>
                                    <div class="col-sm-10"><input type="date" id="birthdate" name="birthdate"  value="{{ old('birthdate') }}" placeholder="Your Birthdate" class="form-control"></div>
                                </div>

                                <div class="form-group"><label class="col-sm-2 control-label">Phone Number</label>
                                    <div class="col-sm-10"><input type="text" name="number" placeholder="Your Phone No." value="{{ old('number') }}" class="form-control"></div>
                                </div>

                                <div class="hr-line-dashed"></div>

                                <div class="hr-line-dashed"></div>

                                <div class="hr-line-dashed"></div>

                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-2">
                                        <button class="btn btn-success" type="submit">Update Account</button>
                                    </div>
                                </div>
                            </form>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
	<div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Change Password</div>

                <div class="panel-body">
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
                            <form method="post" action="{{ route('password.change.submit') }}" class="form-horizontal">
                                {{ csrf_field() }}

                                <div class="form-group{{ $errors->has('current-password') ? ' has-error' : '' }}"><label class="col-sm-2 control-label">Current Password</label>
                                    <div class="col-sm-10"><input id="current-password" type="password" name="current-password" placeholder="Your Current Password" class="form-control" required></div>
                                    @if ($errors->has('current-password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('current-password') }}</strong>
                                    </span>
                                @endif
                                </div>
                                <div class="form-group"><label class="col-sm-2 control-label">New Password</label>
                                    <div class="col-sm-10"><input id="new-password"  type="password" name="new-password" placeholder="Your New Password" class="form-control" required></div>
                                    @if ($errors->has('new-password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('new-password') }}</strong>
                                    </span>
                                @endif
                                </div>
                                <div class="form-group"><label class="col-sm-2 control-label">Confirm New Password</label>
                                    <div class="col-sm-10"><input id="new-password-confirm" type="password" name="new-password_confirmation" placeholder="Your Address" class="form-control" required></div>
                                </div>

                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-2">
                                        <button class="btn btn-success" type="submit">Change Password</button>
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
@endsection
