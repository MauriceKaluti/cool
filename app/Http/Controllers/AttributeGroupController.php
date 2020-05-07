<?php

namespace App\Http\Controllers;

use App\AttributeGroup;
use Illuminate\Http\Request;

use Illuminate\Pagination\Paginator;

class AttributeGroupController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		//get all the attribute groups

		$attribute_groups = AttributeGroup::paginate(8);
		$action           = "add";

		return view( 'admin.attribute-group.index', compact( [ 'attribute_groups', 'action' ] ) );
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

		AttributeGroup::create( $request->all() );

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
		$attribute_groups = AttributeGroup::paginate(8);
		$attribute_group  = AttributeGroup::find( $id );
		$attributes       = AttributeGroup::find( $id )->attributes;
		$action           = "edit";

		return view( 'admin.attribute-group.index', compact( [
			'attribute_group',
			'attribute_groups',
			'attributes',
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
		AttributeGroup::where( 'id', '=', $id)->update(['name' => $request->get('name')]);
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
		AttributeGroup::destroy( $id );

		return redirect()->route( 'attribute-group.index' )->with( 'success', 'Attribute Group deleted successfully' );
	}
}
