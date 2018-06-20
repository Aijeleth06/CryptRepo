@if (Auth::guard('web')->check())
    <p class="text-success">

        

        You are Logged In as a <strong>USER</strong>. Your account is: {{ auth()->user()->verified() ? 'Verified' : 'Not Verified' }}
    </p>

@else
    <p class="text-danger">
        You are Logged Out as a <strong>USER</strong>
    </p>
@endif
@if (Auth::guard('admin')->check())
    <p class="text-success">

        @if ($wallets->count() == 0)
                    <p>No available coin yet.</p>
                    <a class="btn btn-success" href="#">Create Token</a>

                @else

                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Client Full Name</th>
                                    <th>Email</th>
                                    <th>Wallet Address</th>
                                    <th>Account</th>
                                    <th>Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($wallets as $wallet)
                                    <tr>
                                        <td>{{ $wallet->id }}</td>
                                        <td>{{ $wallet->client->first_name }}</td>
                                        <td>{{ $wallet->client->email }}</td>
                                        <td>{{ $wallet->wallet_address }}</td>
                                        <td>{{ $wallet->user_coins }}</td>
                                        <td><a href="#">{{ $wallet->price->name }}</a></td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div> <!-- end table-responsive -->

                @endif
        
        You are Logged In as a <strong>ADMIN</strong>
    </p>

@else
    <p class="text-danger">
        You are Logged Out as a <strong>ADMIN</strong>
    </p>
@endif
