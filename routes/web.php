<?php

use Illuminate\Support\Facades\Artisan;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::post('/upload_to_dropbox','DropboxController@uploadToDropboxFile');

Route::get( '/upload-to-dropbox', 'DropboxController@uploadToDropbox' );

Route::get( '/', 'FrontController@index' )->name( 'home' );

Route::get( 'reach-out', 'FrontController@contact' )->name( 'reach-out' );

Route::get( 'WishList', 'FrontController@checkWishList' )->name( 'WishList' );

Route::get( 'removeWishList/{id}', 'FrontController@removeWishListProduct' )->name( 'removeWishList' );

Route::resource( 'getquote', 'GetQuoteController');

Route::resource( 'sendmessage', 'ContactController');

Route::resource( 'subscribe', 'SubscribeController');



// Design Services Route
Route::get( 'designservices', 'FrontController@designservices' )->name( 'designservices' );

// Design Services Route
Route::get( '/search', 'FrontController@search' )->name( 'search' );

// All products Route

Route::get( '/prints/{name?}', 'FrontController@prints' )->name( 'prints' );

// Single Product Details Page Route

Route::get( 'print/{id}', 'ProductsController@printPage' )->name( 'one.print' );

Route::get( 'modal/{id}', 'ProductsController@modalPage' )->name( 'modal.print' );

Route::any( '/upload-design', 'ProductsController@uploadDesign' )->name( 'upload_design' );

// Getting product attribute price

Route::get( '/get-product-price', 'ProductsController@getProductPrice' )->name( 'get_product_price' );
Route::get( '/get-attributes', 'AttributeController@getAttributes' )->name( 'get_attributes' );

Route::get( '/logout', 'Auth\LoginController@logout' );

Auth::routes();

Route::get( '/home', 'FrontController@index' );

Route::resource( '/cart', 'CartController' );

Route::any( '/cart/add-item/{id}', 'CartController@addItem' )->name( 'cart.addItem' );


Route::group( [ 'prefix' => 'admin', 'middleware' => [ 'auth', 'admin' ] ], function () {

	Route::post( 'toggledeliver/{orderId}', 'OrderController@toggledeliver' )->name( 'toggle.deliver' );

	Route::get( '/', function () {

		return view( 'admin.index' );

	} )->name( 'admin.index' );


	Route::resource( 'review-page', 'ProductReviewController' );
	Route::resource( 'order-details', 'OrderDetailsController' );
	Route::resource( 'subscribers', 'SubscribersController' );
	Route::resource( 'sent_messages', 'SentMessagesController' );
	Route::resource( 'address', 'AddressController' );
	Route::resource( 'customer-quotes', 'GetQuoteController' );
	Route::resource( 'attribute-group', 'AttributeGroupController' );
	Route::resource( 'attribute', 'AttributeController' );

	Route::resource( 'product-group', 'ProductGroupController' );
	Route::resource( 'product', 'ProductsController' );
	Route::resource( 'category', 'CategoriesController' );
	Route::resource( 'town', 'TownsController' );

	// download image route
	Route::get('file-download', 'ProductsController@getDownload')->name('file-download');



	// Orders Route
	Route::get( 'orders/{type?}', 'OrderController@Orders' );

	// Attributes Route
	Route::match( [ 'get', 'post' ], 'add-attributes/{id}', 'ProductsController@addAttributes' );


	// Deleting Attributes Route
	Route::match( [ 'get', 'post' ], 'delete-attributes/{id}', 'ProductsController@deleteAttributes' );
	Route::match( [ 'get', 'post' ], 'edit-attributes/{id}', 'ProductsController@editAttributes' );

} );


Route::resource( 'address', 'AddressController' );

// Route::get('checkout', 'CheckoutController@step1');

Route::group( [ 'middleware' => 'auth' ], function () {

	Route::get( 'shipping-info', 'CheckoutController@shipping' )->name( 'checkout.shipping' );
	Route::resource( 'review', 'ProductReviewController' )->only( [ 'store' ] );

	Route::get( 'addToWishList', 'FrontController@wishList' );

} );


Route::get( 'guestCheckout', 'CheckoutController@shipping' )->name( 'guestCheckout.index' );

Route::get( 'payment', 'CheckoutController@payment' )->name( 'checkout.payment' );

// payment route

Route::post( 'store-payment', 'CheckoutController@storePayment' )->name( 'payment.store' );

Route::get( 'test-email', 'HomeController@test' )->name( 'test_email' );
