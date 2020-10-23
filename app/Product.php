<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $fillable = [
        'quantity',
    ]; // Quantity of Product Can Update

    public function cart()
    {
    	return $this->hasMany('App\Cart');
    }

    public function orderdetail()
    {
    	return $this->hasMany('App\Order_detail');
    }

    public function category()
    {
        return $this->belongsTo('App\Category','id');
    }

    public function discus()
    {
        return $this->hasMany('App\Discus');
    }
}
