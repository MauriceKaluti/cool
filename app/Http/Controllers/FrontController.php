<?php

namespace App\Http\Controllers;

use App\Category;
use App\wishList;
use App\Product;
use App\Attribute;
use App\ProductReview;
use App\AttributeGroup;
use App\ProductDesign;
use DB;
use App\ProductsAttribute;
use Illuminate\Http\Request;
use Session;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;



use Illuminate\Pagination\Paginator;

use Illuminate\Support\Facades\Input;

use Illuminate\Support\Facades\Validator;

class FrontController extends Controller {

	public function index( $id = null ) {
		$prints = Product::paginate(8);

		$cartItems = Cart::content();

		//$relatedProducts = Product::where( 'id', '!=', $id )->get();
		$relatedProducts = Product::all();

		// $categories = Category::paginate(10);
		$categories = Category::orderBy(DB::raw('RAND()'))->take(10)->get();
		$sidebar_str = "";
		$sidebar_str .= '<nav class="navigation">';
		$sidebar_str .= '<ul class="mainmenu">';
		foreach($categories as $category){
			$sidebar_str .= '<li>';
			$sidebar_str .= '<b><a class="stext-105" href="' . route('prints', $category->id ) . '">' .  $category->name . '</a></b>';
			$sidebar_str .= '<ul class="submenu">';
			$products = Category::find( $category->id )->products;
			foreach ($products as $product){
				$sidebar_str .= '<li>';
				$sidebar_str .= '<a class="stext-105" href="' . route('one.print', $product->id ) . '">' . $product->name . '</a>';
				$sidebar_str .= '<li>';
			}
			$sidebar_str .= '</ul>';
		}
		$sidebar_str .= '</ul>';
		$sidebar_str .= '</nav>';

		// End Modal Function Snippet
		return view( 'front.home', compact( 'prints','cartItems', 'relatedProducts', 'sidebar_str', 'product_attributes', 'attributes', 'attribute_groups' ) );
	}


	// Contact Fuction

	public function contact( $id = null ) {

		$prints = Product::paginate(8);

		$cartItems = Cart::content();

		return view( 'front.contact', compact( 'prints', 'cartItems') );

	}

	/*public function prints($id=null)
	{
		$prints=Product::where('id',$id)->first();
		return view('front.prints',compact('prints'));
	}*/


	public function prints( $id = null ) {
		$prints = array();
		$cartItems = Cart::content();
		$category = array();
		if($id != ""){
			$prints = Product::where('category_id', '=', $id)->get();
			$category = Category::where('id', '=', $id)->first();
		}else{
			$prints = Product::all();
		}

		return view( 'front.prints', compact( 'prints','cartItems', 'category' ) );
	}


	/* public function print()
	 {
	      $print=Product::all();
	     return view('front.print',compact('print'));
	 }*/

	 // How it works function

	 	public function designservices ($id = null ) {


			$reviews = ProductReview::all();

			$cartItems = Cart::content();


		return view( 'front.how-it-works', compact( 'print', 'reviews', 'prints','cartItems'));
		
	}



	public function search(Request $request){

		$request->validate([

			'query' => 'required|min:3',

		]);

		$query = $request->input('query');

		$products = Product::where('name', 'LIKE', "%{$query}%")
								->orWhere('description', 'like', "%{$query}%")->paginate(10);

		// echo "<pre>"; print_r($products); die;

		return view('front.search-results')->with('products',$products);

		// return view( 'front.search-results', compact( 'products'));
	}



	// Wish List Function

	

	public function wishList(Request $request){



	$wishList = new wishList;

	$wishList->user_id = Auth::user()->id;

	$wishList->product_id = $request->product_id;

	$wishList->save();


// wishList::create($request->all() + ['user_id'=>auth()->id()]);

		// To escape requesting user id as a non object
	       //  if (auth()->user()) {
           
        //     Auth::user()->wish()->create($request->all());
        // } else {
            

        //    wishList::create($request->all());
        // }


		return back()->with( "message", "Added to wishlist!" );

		 // return back()->with("message", "Added to wishlist!");

	}



	// Checking WishList Function

	public function checkWishList(){

		$prints = wishList::where( 'user_id', '=', Auth::id() )->leftJoin('products','wishlist.product_id', '=', 'products.id')->paginate(10);


		$cartItems = Cart::content();

		return view('front.wishList', compact( 'prints', 'cartItems'));
	}


		// Removing WishList Product Function

	public function removeWishListProduct($id){

		// echo $id;

		DB::table('wishlist')->where('product_id', '=', $id)->delete();

		return back()->with('msg', 'Item Removed From Wishlist');
	}
}
