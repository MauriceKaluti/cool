<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Town extends Model
{
    //

    protected $fillable=['name'];

    // Defining relationship between categories and products in that one category has many products and product belongs to certain category

    public function users()
    {
    	// return $this->hasMany('App\Product');
    	return $this->hasMany(User::class);
    }

     public function addresses()
    {
    	// return $this->hasMany('App\Product');
    	return $this->hasMany(Address::class);
    }
}
