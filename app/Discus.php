<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Discus extends Model
{


	protected $fillable = [
        'product_id', 'user_id', 'discus',
    ];


    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function product()
    {
    	return $this->belongsTo('App\Product');
    }

    public function reply()
    {
    	return $this->hasMany('App\Reply');
    }
}
