<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    // User Have much payments
    public function user()
    {
    	return $this->belongsTo('App\User');
    }
    // Order Only Have One Payment
    public function order()
    {
    	return $this->belongsTo('App\Order');
    }
}
