<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductDesign;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class CartController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$cartItems = Cart::content();

		$prints = Product::all();

		return view( 'cart.index', compact( 'cartItems', 'prints' ) );
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

	public function addItem( $id, Request $request ) {
        $attributes_array = empty( Input::get( 'sel' ) ) ? array() : Input::get( 'sel' );
		$attribute_ids    = "";
		if ( ! empty( $attributes_array ) || count( $attributes_array ) > 0 ) {
			$attribute_ids = implode( ",", $attributes_array );
			$attribute_ids = trim( $attribute_ids, "," );
		}
		$price = empty( Input::get( 'hfPrice' ) ) ? "" : Input::get( 'hfPrice' );
		
		if ( $price == "" ) {
			return back();
		}

		// product design
        
		/*$this->validate( $request, [
			'product_design' => 'image|mimes:png,jpg,jpeg|max:10000'
		] );*/
		
		$image     = $request->product_design;
		$imageNames = "";
		if ( $image ) {
			foreach ($request->file('product_design') as $key => $value) {
				$imageNames .= $value->getClientOriginalName() . ",";
				$value->move( 'images', $value->getClientOriginalName() );
			}
		}

		$product_design                 = new ProductDesign;
		$product_design->user_id        = $request->user_id;
		$product_design->product_id     = $id;
		$product_design->design_path    = trim($imageNames, ",");
		$product_design->attributes_ids = strval($request->attributes_ids);
		$product_design->save();

		//Adding Items to Cart
		$product = Product::find( $id );

		//Cart::add( $id, $product->name, 1, $product->price, array( $product->size ) );
		Cart::add( $id, $product->name, 1, $price, [ 'attribute_ids' => $attribute_ids ] );

		return back()->with('popup', '1');;
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
	public function destroy( $id, Request $request ) {
		
		ProductDesign::where('product_id', '=', $request->product_id)->delete();

		Cart::remove( $id );

		return back();
	}
}
