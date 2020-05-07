<?php

namespace App\Http\Controllers;

use App\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;

class CartController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$cartItems = Cart::content();

		return view( 'cart.index', compact( 'cartItems' ) );
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
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int $id
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function show( $id ) {
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int $id
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function edit( $id ) {
	}

	public function addItem( $id ) {

		$attributes_array = empty(Input::get('sel')) ? "" : Input::get('sel');
		$attribute_ids = implode("," , $attributes_array);
		$attribute_ids = trim($attribute_ids, ",");
		$price = empty(Input::get('hfPrice')) ? "" : Input::get('hfPrice');
		if($price == ""){
			return back();
		}

		//Adding Items to Cart
		$product = Product::find( $id );

		//Cart::add( $id, $product->name, 1, $product->price, array( $product->size ) );
		Cart::add( $id, $product->name, 1, $price, ['attribute_ids' => $attribute_ids] );

		return back();
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
		//


		Cart::update( $id, [ 'qty' => $request->qty, "options" => [ 'size' => $request->size ] ] );

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
		// removing item from Cart

		Cart::remove( $id );

		return back();
	}
}
