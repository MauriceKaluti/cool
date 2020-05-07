<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Product;

use App\User;

class ProductDesign extends Model
{
    //
    	public function user() {
		return $this->belongsTo( User::class );
	}


	public function product() {
		return $this->belongsTo( Product::class );
	}

public function attributes() {
		//  $this->belongsTo('App\Product');
		return $this->hasMany( Attribute::class, 'attribute_id' );
	}
}
