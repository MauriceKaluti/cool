<?php

namespace App\Http\Controllers;

use Gloudemans\Shoppingcart\Facades\Cart;

use Illuminate\Http\Request;

use App\Order;

use App\Product;

use App\Town;



use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    //First check if user is authenticated

    // public function step1()
    // {
    // 	if(Auth::check()){

    // 		return redirect()->route('checkout.shipping');
    // 	}

    // 	return redirect('login');
    // }


    public function shipping()
    {
        $towns = Town::pluck( 'name', 'id' );
        $prints = Product::all();
   return view('front.shipping-info', compact( 'cartItems', 'prints', 'towns' ) );
    }


     public function payment()
    {
   return view('front.payment');
    }

    // storing payment


    public function storePayment(Request $request)
    {

        // Set your secret key: remember to change this to your live secret key in production
        // See your keys here: https://dashboard.stripe.com/account/apikeys
        \Stripe\Stripe::setApiKey("sk_test_yLqH4HcHX158FtmJWIDEuKIn");

        // Token is created using Checkout or Elements!
        // Get the payment token ID submitted by the form:

         try {
        $token = $_POST['stripeToken'];
        $charge = \Stripe\Charge::create([
            'amount' => Cart::total()*100, // Amount in cents,
            'currency' => 'kes',
            'description' => 'Payment after order is done',
            'source' => $token,
        ]);


    }

    catch (\Stripe\Error\Card $e) {
            // The card has been declined
        }
      //Create the order
       Order::createOrder();

        //redirect user to some page
        // return "Order completed";

        return view('front.thankyou');

    }





}
