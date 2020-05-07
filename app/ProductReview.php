<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use\App\Product;

class ProductReview extends Model {
	//

	protected $fillable = [

		'headline',
		'description',
		'rating',
		'product_id',
		'user_id'

	];

	public function user() {
		return $this->belongsTo( User::class );
	}


	public function product() {
		return $this->belongsTo( Product::class );
	}
}
