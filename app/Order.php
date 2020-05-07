<?php

namespace App;

use Gloudemans\Shoppingcart\Facades\Cart;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\Auth;

class Order extends Model
{
    //Defining relation between orders and products, such that one order can have many products and one product can be in many orders

    protected $fillable=['total','delivered'];

    public function orderItems()
    {
    	return $this->belongsToMany(Product::class)->withPivot('qty','total');
    }


    // Relationship between customer and orders


      public function user()
     {
        return $this->belongsTo(User::class);
     }


    public static function createOrder()
    {

        if (auth()->user()) {

    	$user=Auth::user();
        $order=$user->orders()->create([
            'total'=>Cart::total(),
            'delivered'=>0
        ]);

    } else{

        $order=Order::create([
            'total'=>Cart::total(),
            'delivered'=>0
        ]); 
    }

        $cartItems=Cart::content();
        foreach ($cartItems as $cartItem){
            $order->orderItems()->attach($cartItem->id,[
                'qty'=>$cartItem->qty,
                'total'=>$cartItem->qty*$cartItem->price

        ]);
}

    }

    
}
