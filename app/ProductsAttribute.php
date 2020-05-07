<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductsAttribute extends Model {

	protected $fillable = [ 'product_id', 'attribute_id', 'price' ];

	// Defining relationship between attribute group and attributes in that one group has many attributes

	public function attributes() {
		//  $this->belongsTo('App\Product');
		return $this->hasMany( Attribute::class, 'attribute_id' );
	}
}
