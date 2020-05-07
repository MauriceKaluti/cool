<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    //Relationship between addresses and Users

    protected $fillable=['email','addressline','city','phone','town_id'];

	public function town() {
		//  $this->belongsTo('App\Town');
		return $this->belongsTo( Town::class );
	}

		public function user() {
		return $this->belongsTo( User::class );
	}

}
