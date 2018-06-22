<?php

namespace App\Http\Controllers;

use Auth;
use Hash;
use Illuminate\Http\Request;
use App\Coin;
use App\Wallet;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	//$coins = Coin::orderBy('id','asc')->take(1)->get();
    	$walletID = Auth::user()->id;
    	$userWallet = Wallet::where('user_id', $walletID)->first();
        return view('home')->with('mywallet', $userWallet);
    }

    public function editAccount()
    {
    	return view('account');
    }
    public function accountEdit(Request $request)
    {
    	$account = Auth::user();
    	$account->address = $request->get('address');
        $date=date_create($request->get('birthdate'));
        $format = date_format($date,"Y-m-d");
    	$account->birth_date = $format;
    	$account->phone_no = $request->get('number');
    	$account->save();
    	return redirect()->back()->with("success_ac","Your account has been successfully updated !");
    }
    public function passwordChange(Request $request)
    {
 
        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error","Your current password does not matches with the password you provided. Please try again.");
        }
 
        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
            //Current password and new password are same
            return redirect()->back()->with("error","New Password cannot be same as your current password. Please choose a different password.");
        }
 
        $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:6|confirmed',
        ]);
 
        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();
 
        return redirect()->back()->with("success","Password changed successfully !");
 
    }
    public function fundTransfer()
    {
    	return view('transfer');
    }
    public function transferFund(Request $request)
    {
    	$this->validate($request, [
    		'address' => 'required|string|min:34|max:34',
    		'amount' => 'required|numeric'
    	]);
    	$mywallet = Auth::user()->id;
    	$mywalletad = Wallet::where('user_id', $mywallet)->first();

    	$thisAddress = $request->get('address');
    	$thisWallet = Wallet::where('wallet_address', $thisAddress)->first();

    	if(strcmp($request->get('address'), $mywalletad->wallet_address) == 0){
            //Current password and new password are same
            return redirect()->back()->with("error","You cannot transfer funds to your own wallet.");
        }
    	if($mywalletad->user_coins >= $request->get('amount')){

	    	$thisTotal = $request->get('amount')+$thisWallet->user_coins;
	    	$thisWallet->user_coins = $thisTotal;
	    	$thisWallet->save();
	    	$mywalletad->user_coins = $mywalletad->user_coins - $request->get('amount');
	    	$mywalletad->save();

    	}else{
    		return redirect()->back()->with("error","Insufficient Funds");
    	}

    	return redirect()->back()->with("success","Funds transfered successfully !");
    }
}
