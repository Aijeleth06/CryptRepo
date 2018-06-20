<?php

namespace App\Http\Controllers;

use App\Wallet;
use App\Coin;
use Illuminate\Http\Request;
use App\Events\CPC;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $wallets = Wallet::with(['client', 'price'])->get();
        return view('admin', compact('wallets'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Wallet $wallet)
    {
        return view('show', compact('wallet'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Wallet $wallet)
    {
        $statuses = Coin::all();
        $currentStatus = $wallet->coin_id;

        return view('admin.edit', compact('wallet', 'statuses', 'currentStatus'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Wallet $wallet)
    {
        $request->validate([
            'coin_id' => 'required|numeric',
        ]);

        $wallet->coin_id = $request->coin_id;
        $wallet->save();

        event(new CPC($wallet));

        return back()->with('message', 'Coin was updated successfully!');
    }
}
