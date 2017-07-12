<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
	//all columnsare mass asignable, except id column
	protected $guarded = ['id'];
    //one comment belongs to a ticket
    public function ticket(){
    	return $this->belongsTo('App\Ticket');
    }
}
