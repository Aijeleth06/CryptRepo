<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    protected $fillable = ['user_id', 'coin_id', 'wallet_address', 'user_coins'];

    public function client()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    /**
     * Get the status of the order.
     */
    public function price()
    {
        return $this->belongsTo('App\Coin');
    }
}
