<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password','image',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


   public function cart()
   {
        return $this->hasMany('App\Cart');
   }

   public function order()
   {
        return $this->hasMany('App\Order');
   }

   // Every Users have Much Payments
   public function payment()
   {
        return $this->hasMany('App\Payments');
   }

   public function discus()
   {
        return $this->hasMany('App\Discus');
   }

   public function reply()
   {
        return $this->hasMany('App\Reply');
   }
   
}
