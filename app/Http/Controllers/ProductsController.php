<?php

namespace App\Http\Controllers;

use App\Attribute;
use App\AttributeGroup;
use App\Category;
use App\Product;
use App\ProductDesign;
use App\ProductGroup;
use App\ProductsAttribute;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Image;
use Session;
use Illuminate\Http\Response;
use Gloudemans\Shoppingcart\Facades\Cart;
use File; 

class ProductsController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {

		//Displaying all products

		$products = Product::paginate( 5 );

		return view( 'admin.product.index', compact( 'products' ) );
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		//

		$categories = Category::pluck( 'name', 'id' );

		$product_groups = ProductGroup::pluck( 'name', 'id' );

		return view( 'admin.product.create', compact( [ 'categories', 'product_groups' ] ) );


	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function store( Request $request ) {
		$product_group_id_array = (empty(Input::get('product_group_id')) ? array() : Input::get('product_group_id'));

		$this->validate( $request, [
			'name'             => 'required',
			'product_details'  => 'required',
			'price_badge'      => 'required',
			'price'            => 'required',
			'description'      => 'required',
			'image'            => 'image|mimes:png,jpg,jpeg|max:10000'
		] );
		// Storing data
		$post = Product::create( $request->all() );

		// Old Upload Method

		// $image = $request->image;

		// if ( $image ) {
		// 	$imageName = $image->getClientOriginalName();
		// 	$image->move( 'images', $imageName );
		// 	$post['image'] = $imageName;
		// }

		// New Upload Method //

		if ( $request->hasFile( 'image' ) ) {
			$image_tmp = Input::file( 'image' );
			if ( $image_tmp->isValid() ) {
				$extension         = $image_tmp->getClientOriginalExtension();
				$filename          = rand( 111, 9999 ) . '.' . $extension;
				$large_image_path  = 'images/productimages/large/' . $filename;
				$medium_image_path = 'images/productimages/medium/' . $filename;
				$small_image_path  = 'images/productimages/small/' . $filename;

				// Resize Imgs
				Image::make( $image_tmp )->save( $large_image_path );
				Image::make( $image_tmp )->resize( 1024, 200 )->save( $medium_image_path );
				Image::make( $image_tmp )->resize( 327, 280 )->save( $small_image_path );
				// Storing Image
				// $product->image = $filename;
				$post['image'] = $filename;
			}

		}

		$post->save();

		if($post){
			$product_id = $post->id;
			if(count($product_group_id_array) > 0){
				foreach($product_group_id_array as $product_group_id){
					DB::table('group_products')->insertGetId(['product_group_id' => $product_group_id, 'product_id' => $product_id]);
				}
			}
		}

		// redirect to another page

		return redirect()->route( 'product.index', $post->id );
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int $id
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function show( $id ) {
		//
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
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int $id
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function destroy( $id ) {
		//

		DB::table('group_products')->where('product_id', '=', $id)->delete();

		Product::destroy( $id );

		return back();
	}

	// Getting Attributes
	public function addAttributes( Request $request, $id = null ) {
		$productDetails = Product::find( $id );

		if ( $request->isMethod( 'post' ) ) {
			ProductsAttribute::create( $request->all() );

			return redirect( 'admin/add-attributes/' . $id )->with( 'flash_message_success', 'Product Attribute(s) Added Successfully!!' );
		}

		$product_attributes = DB::table( 'products_attributes' )->select( 'products_attributes.*', DB::raw( 'attribute_groups.name as group_name' ), DB::raw( 'attributes.name as attribute_name' ) )->leftJoin( 'attributes', 'attributes.id', '=', 'products_attributes.attribute_id' )->leftJoin( 'attribute_groups', 'attribute_groups.id', '=', 'attributes.attribute_group_id' )->where( 'products_attributes.product_id', '=', $id )->get();

		$attribute_groups = AttributeGroup::all();
		$action           = 'add';

		return view( 'admin.product.add_attributes' )->with( compact( [
			'productDetails',
			'product_attributes',
			'attribute_groups',
			'action'
		] ) );
	}

	// Editing Product Attributes i.e Price and Quantity

	public function editAttributes( Request $request, $id = null ) {

		if ( $request->isMethod( 'post' ) ) {

			$data                 = array();
			$data['product_id']   = $request->get( 'product_id' );
			$data['attribute_id'] = $request->get( 'attribute_id' );
			$data['price']        = $request->get( 'price' );

			$res = ProductsAttribute::where( 'id', '=', $id )->update( $data );

			return redirect()->back()->with( 'flash_message_success', 'Product Attribute(s) Added Successfully!!' );
		}
		$attribute_groups = AttributeGroup::all();
		//$product_attribute = ProductsAttribute::find( $id );

		$action = 'edit';

		$product_attribute = DB::table( 'products_attributes' )->select( 'products_attributes.*', DB::raw( 'attribute_groups.id as attribute_group_id' ), DB::raw( 'attribute_groups.name as group_name' ), DB::raw( 'attributes.name as attribute_name' ) )->leftJoin( 'attributes', 'attributes.id', '=', 'products_attributes.attribute_id' )->leftJoin( 'attribute_groups', 'attribute_groups.id', '=', 'attributes.attribute_group_id' )->where( 'products_attributes.id', '=', $id )->first();

		$productDetails = Product::find( $product_attribute->product_id );

		$product_attributes = DB::table( 'products_attributes' )->select( 'products_attributes.*', DB::raw( 'attribute_groups.name as group_name' ), DB::raw( 'attributes.name as attribute_name' ) )->leftJoin( 'attributes', 'attributes.id', '=', 'products_attributes.attribute_id' )->leftJoin( 'attribute_groups', 'attribute_groups.id', '=', 'attributes.attribute_group_id' )->where( 'products_attributes.product_id', '=', $product_attribute->product_id )->get();

		return view( 'admin.product.add_attributes' )->with( compact( [
			'productDetails',
			'product_attribute',
			'product_attributes',
			'attribute_groups',
			'action'
		] ) );
	}

	// Delete Attributes Function
	public function deleteAttributes( $id = null ) {
		ProductsAttribute::destroy( [ 'id' => $id ] );

		return redirect()->back()->with( 'flash_message_success', 'Product Attribute (s) Deleted Successfully' );
	}

	// Show product in print blade file(front view)

	public function printPage( $id = null ) {

		$print = Product::with( 'attributes' )->where( 'id', $id )->first();

		// Linking to Cart

		$cartItems = Cart::content();

		// $reviews = $print->reviews()->paginate(3);

		$print->setRelation( 'reviews', $print->reviews()->paginate( 2 ) );

		$prints = Product::all();

		// $print = json_decode(json_encode($print));

		// echo "<pre>"; print_r($print); die;

		// Getting all products as related without the current one

		// $relatedProducts = Product::where('id','!=',$id)->get();
		// $relatedProducts = json_decode(json_encode($relatedProducts));


		// Testing foreach->chunk method

		// foreach ($relatedProducts->chunk(3) as $chunk) {
		//     foreach($chunk as $item){
		//         echo $item; echo "<br>";
		//     }
		//     echo "<br><br><br>";
		// }
		// die;

		// echo "<pre>"; print_r($relatedProducts); die;


		// Getting only Category related products withouth the current one

		$relatedProducts = Product::where( 'id', '!=', $id )->where( [ 'category_id' => $print->category_id ] )->get();

		//  $relatedProducts = json_decode(json_encode($relatedProducts));

		// echo "<pre>"; print_r($relatedProducts); die;


		$product_attributes = ProductsAttribute::where( 'product_id', '=', $id )->get();
		$attribute_id_array = array();
		foreach ( $product_attributes as $product_attribute ) {
			$attribute_id_array[] = $product_attribute->attribute_id;
		}

		$attributes            = Attribute::select( 'attribute_group_id' )->whereIn( 'id', $attribute_id_array )->groupBy( 'attribute_group_id' )->get();
		$attribute_group_array = array();
		foreach ( $attributes as $attribute ) {
			$attribute_group_array[] = $attribute->attribute_group_id;
		}

		$attribute_groups = AttributeGroup::whereIn( 'id', $attribute_group_array )->get();

		return view( 'front.print', compact( 'print', 'prints', 'relatedProducts', 'product_attributes', 'attributes', 'attribute_groups', 'cartItems' ) );
	}






	// Modal Print Page Code

	public function modalPage( $id = null ) {

		$print = Product::with( 'attributes' )->where( 'id', $id )->first();

		// $reviews = $print->reviews()->paginate(3);

		$print->setRelation( 'reviews', $print->reviews()->paginate( 2 ) );

		$prints = Product::all();

		// $print = json_decode(json_encode($print));

		// echo "<pre>"; print_r($print); die;

		// Getting all products as related without the current one

		// $relatedProducts = Product::where('id','!=',$id)->get();
		// $relatedProducts = json_decode(json_encode($relatedProducts));


		// Testing foreach->chunk method

		// foreach ($relatedProducts->chunk(3) as $chunk) {
		//     foreach($chunk as $item){
		//         echo $item; echo "<br>";
		//     }
		//     echo "<br><br><br>";
		// }
		// die;

		// echo "<pre>"; print_r($relatedProducts); die;


		// Getting only Category related products withouth the current one

		$relatedProducts = Product::where( 'id', '!=', $id )->where( [ 'category_id' => $print->category_id ] )->get();

		//  $relatedProducts = json_decode(json_encode($relatedProducts));

		// echo "<pre>"; print_r($relatedProducts); die;


		$product_attributes = ProductsAttribute::where( 'product_id', '=', $id )->get();
		$attribute_id_array = array();
		foreach ( $product_attributes as $product_attribute ) {
			$attribute_id_array[] = $product_attribute->attribute_id;
		}

		$attributes            = Attribute::select( 'attribute_group_id' )->whereIn( 'id', $attribute_id_array )->groupBy( 'attribute_group_id' )->get();
		$attribute_group_array = array();
		foreach ( $attributes as $attribute ) {
			$attribute_group_array[] = $attribute->attribute_group_id;
		}

		$attribute_groups = AttributeGroup::whereIn( 'id', $attribute_group_array )->get();

		return view( 'front.includes.modalprint', compact( 'print', 'prints', 'relatedProducts', 'product_attributes', 'attributes', 'attribute_groups' ) );
	}


	// End of Modal Print Code


	// getProductPrice function where we target to get the product attribute price using product_id and size to return exact price

	public function getProductPrice( Request $request ) {

		$product_id = $request->product_id;

		$product       = Product::where( 'id', '=', $product_id )->first();
		$product_price = 0;
		if ( $product ) {
			$product_price = $product->price;
		}

		$attribute_ids       = $request->attribute_ids;
		$attribute_ids_array = explode( ",", $attribute_ids );

		$product_attributes_price = ProductsAttribute::where( 'product_id', '=', $product_id )->whereIn( 'attribute_id', $attribute_ids_array )->sum( 'price' );
		$total_price              = number_format( $product_price + $product_attributes_price, 2, '.', '' );
		echo $total_price;
		exit;
	}

	// public function uploadDesign( Request $request ) {


	// 	if ( $file = $request->file( 'product_design' ) ) {
	// 		foreach ( $request->product_design as $photo ) {
	// 			$filename = $photo->store( 'upload' );
	// 			ProductDesign::create( [
	// 				'project_id'     => $request->product_id,
	// 				'user_id'        => $request->user_id,
	// 				'product_design' => $filename,
	// 				'attribute_ids'  => $request->attributes_ids
	// 			] );
	// 		}
	// 	}

	// 	return redirect()->route( 'modal.print', $request->product_id );
	// }


	// Download Image Function

public function getDownload()
{

// $print = ProductDesign::where( 'id', $id )->first();
//     $file= public_path(). "/images/$print->image";
//     $file= storage_path('images/'. $print->design_path);


//     return response()->download($file);
	// return response()->download(storage_path('images/'. $file->location));


	// Last Test

	$products = ProductDesign::paginate( 5 );

	foreach($products as $product){
		$file= public_path(). "/images/$product->design_path";
	}




// $file = '/images/10.jpg';{{url('images/productimages/medium',$product->image)}}
// $name = basename($file);
return response()->download($file);
}


// 	public function getDownload(Request $request,$id)
// {
//                 $file= public_path(). "/pdf/";  //path of your directory
//                 $headers = array(
//                     'Content-Type: application/pdf',
//                 );
//                  return Response::download($file.$pdfName, 'filename.pdf', $headers);


// }



// Download WITH USERs

// public function getFile($fileID) {
//     $file = ProductDesign::where('id', $fileID)->first();

//     if (Auth::user()->id == $file->user_id || Auth::user()->id == $file->product_id) {
//         $fileGet = Storage::get($file->file_path);
//         return $fileGet;
//     }
// }

}

?>