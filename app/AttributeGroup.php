<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AttributeGroup extends Model {

	protected $fillable = [ 'name' ];

	// Defining relationship between attribute group and attributes in that one group has many attributes

	public function attributes() {
		//  $this->belongsTo('App\Product');
		return $this->hasMany( Attribute::class);
	}

}
