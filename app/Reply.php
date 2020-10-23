<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    //

    protected $fillable = [
        'discus_id', 'user_id', 'content_reply',
    ];

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function discus()
    {
    	return $this->belongsTo('App\Discus');
    }
}
