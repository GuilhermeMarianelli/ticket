<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
	
	protected $guarded = ['id'];

    //each ticket is created by a user, so it belongs the user. this is a relationship
    public function user(){
    	return $this->belongsTo('App\User');
    }

    //one ticket has many comments
    public function comments(){
    	return $this->hasMany('App\Comment','post_id');
    }
}
