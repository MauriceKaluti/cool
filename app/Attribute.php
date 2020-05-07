<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model {
	protected $fillable = [ 'attribute_group_id', 'name' ];

	public function attributeGroup() {
		return $this->belongsTo( AttributeGroup::class );
	}
}
