<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GroupProduct extends Model
{
	protected $fillable = [ 'product_group_id, product_id' ];

	public function products() {
		return $this->hasMany( Product::class, 'product_id', 'id');
	}

	public function groups() {
		return $this->hasMany( ProductGroup::class, 'product_group_id', 'id');
	}
}
