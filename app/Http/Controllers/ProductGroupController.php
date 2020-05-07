<?php

namespace App\Http\Controllers;

use App\ProductGroup;
use Illuminate\Http\Request;

class ProductGroupController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		//get all the product groups

		$product_groups = ProductGroup::paginate( 8 );
		$action           = "add";

		return view( 'admin.product-group.index', compact( [ 'product_groups', 'action' ] ) );
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
		//storing product groups to database

		ProductGroup::create( $request->all() );

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
		$product_groups = ProductGroup::paginate( 8 );
		$product_group  = ProductGroup::find( $id );
		$products       = ProductGroup::find( $id )->products;
		$action           = "edit";

		return view( 'admin.product-group.index', compact( [
			'product_group',
			'product_groups',
			'products',
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
		ProductGroup::where( 'id', '=', $id )->update( [ 'name' => $request->get( 'name' ) ] );

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
		ProductGroup::destroy( $id );

		return redirect()->route( 'product-group.index' )->with( 'success', 'Product Group deleted successfully' );
	}
}
