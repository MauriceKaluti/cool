<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductGroup extends Model {
	protected $fillable = [ 'name' ];

	// Defining relationship between product group and products

	public function products() {
		return $this->hasMany( Product::class );
	}
}
