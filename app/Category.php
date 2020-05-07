<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

	protected $fillable=['name'];

    // Defining relationship between categories and products in that one category has many products and product belongs to certain category

    public function products()
    {
    	// return $this->hasMany('App\Product');
    	return $this->hasMany(Product::class);
    }
}
