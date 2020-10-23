<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    protected $fillable = [
        'status',
    ];

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function orderDetail()
    {
    	return $this->hasMany('App\Order_detail');
    }

    // every order only have one payment
    public function payment()
    {
        return $this->hasOne('App\Payments');
    }
}
