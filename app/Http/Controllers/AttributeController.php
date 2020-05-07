<?php

namespace App\Http\Controllers;

use App\Attribute;
use App\AttributeGroup;
use Illuminate\Http\Request;

use Illuminate\Pagination\Paginator;

class AttributeController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		//get all the attribute groups

		$attributes       = Attribute::paginate(8);
		$action           = "add";

		$attribute_groups = AttributeGroup::pluck( 'name', 'id' );

		return view( 'admin.attribute.index', compact( [ 'attributes', 'attribute_groups', 'action' ] ) );
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {

	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function store( Request $request ) {
		//storing attribute groups to database
		Attribute::create( $request->all() );

		return back();
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int $id
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function show( $id ) {
		$attributes = Attribute::paginate(8);
		$attribute = Attribute::find( $id );
		$attribute_group = Attribute::find( $id )->attributeGroup;
		$attribute_groups = AttributeGroup::pluck( 'name', 'id' );
		$action = "edit";

		return view( 'admin.attribute.index', compact( [
			'attribute_group',
			'attribute_groups',
			'attributes',
			'attribute',
			'action'
		] ) );
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int $id
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function edit( $id ) {
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @param  int $id
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function update( Request $request, $id ) {

		Attribute::where( 'id', '=', $id)->update(['attribute_group_id' => $request->get('attribute_group_id'), 'name' => $request->get('name')]);

		return back();
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int $id
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function destroy( $id ) {
		Attribute::destroy( $id );

		return redirect()->route( 'attribute.index' )->with( 'success', 'Attribute deleted successfully' );
	}

	public function getAttributes( Request $request ) {
		$attribute_group_id = $request->attribute_group_id;
		$attribute_id = $request->attribute_id;
		$attributes       = AttributeGroup::find( $attribute_group_id )->attributes;
		$str = "";
		$str .= "<option value=''>Select Attributes</option>";
		foreach($attributes as $attribute){
			$selected = "";
			if($attribute_id != ""){

				if($attribute_id == $attribute->id){
					$selected = "selected='selected'";
				}
			}
			$str .= "<option value='" . $attribute->id . "' " . $selected . ">" . $attribute->name . "</option>";
		}
		echo $str;
		exit;
	}
}
