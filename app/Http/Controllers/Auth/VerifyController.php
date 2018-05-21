<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VerifyController extends Controller
{
    public function verify($token)
    {
    	
    	User::where('token', $token)->firstOrFail()

    		->update(['token' => null]);

    	return redirect()
    		->route('home')

    		->with('success', 'Account verified');

    }
}
