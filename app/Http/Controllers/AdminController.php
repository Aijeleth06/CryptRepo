<?php

namespace App\Http\Controllers;

use App\Wallet;
use App\Coin;
use Illuminate\Http\Request;
use App\Events\CPC;
use App\User;

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
        return view('admin');
    }
    public function showLists()
    {
    	$wallets = Wallet::with('user')->paginate(1);
    	return view('view', compact('wallets'));
    }
    public function showCoinTypes()
    {
    	$coins = Coin::orderBy('id', 'asc')->paginate(1);
    	return view('cryptos')->with('coins', $coins);
    }
    public function coinModify(Coin $coin)
    {
    	$thisCoin = Coin::where('id', $coin->id)->first();
    	return view('modify', compact('coin', 'thisCoin'));
    }
    public function coinUpdate(Request $request, Coin $coin)
    {
    	$request->validate([
            'new_price' => 'required|regex:/^\d*(\.\d{1,4})?$/',
        ]);

        $coin->price = $request->new_price;
        $coin->save();

        return back()->with('message', 'Coin updated successfully!');
    }
}
