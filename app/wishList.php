<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use\App\Product;

class wishList extends Model
{
    //

    protected $table = 'wishlist';

    protected $fillable = ['user_id','product_id'];


    	public function user() {
		return $this->belongsTo( User::class );
	}


	public function product() {
		return $this->belongsTo( Product::class );
	}
}
