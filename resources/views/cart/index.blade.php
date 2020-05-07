<?php

use App\Attribute;
use App\AttributeGroup;
use App\ProductDesign;
?>


@extends('layout.main')

@section('title', 'Print')

@section('content')


<!-- Cart Modal Here -->

@include('front.modal.cartmodal')

<!-- Cart Modal Here -->






<body class="animsition">
    


<br><br><br><br>
    <!-- breadcrumb -->
    <div class="container">
        <div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
            <a href="{{route('home')}}" class="stext-109 cl8 hov-cl1 trans-04">
                Home
                <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
            </a>

            <span class="stext-109 cl4">
                Shoping Cart
            </span>
        </div>
    </div>
        

    <!-- Shoping Cart -->
    <form class="bg0 p-t-75 p-b-85">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
                    <div class="m-l-25 m-r--38 m-lr-0-xl">
                        <div class="wrap-table-shopping-cart">




<table class="  table-shopping-cart">

                <thead>

                <tr style="height: 50px;">

                    <th>&nbsp&nbspProduct Name</th>

                    <th>Product Options</th>

                   <!--  <th>Product Design</th> -->

                    <th>Price</th>

                    <th>Remove</th>

                </tr>

                </thead>

                <tbody>

                @foreach($cartItems as $cartItem)

                    <tr class="table_row">

                        <td ><b>&nbsp&nbsp{{ $cartItem->name }}</b></td>

                        <td >

                            <?php
                            $product_design = ProductDesign::where( 'product_id', '=', $cartItem->id )->first();

                            $attribute_ids_str = $cartItem->options->has( 'attribute_ids' ) ? $cartItem->attribute_ids : '';

                            if ( $attribute_ids_str != "" ) {

                                $attribute_id_array = explode( ",", trim( $attribute_ids_str ) );

                                $attributes = Attribute::whereIn( 'id', $attribute_id_array )->get();

                                foreach ( $attributes as $attribute ) {

                                    $attribute_group = AttributeGroup::where( 'id', '=', $attribute->attribute_group_id )->first();

                                    echo $attribute_group->name . ' : ' . $attribute->name . "<br>";

                                }

                            }

                            ?>

                        </td>

                       <!-- design td here -->

                       <!-- design td here end -->

                        <td>Ksh {{ number_format($cartItem->price, 2) }}</td>

                        <td>

                            {!!Form::close()!!}

                            <form action="{{route('cart.destroy',$cartItem->rowId)}}" method="POST">

                                {{csrf_field()}}

                                {{method_field('DELETE')}}
                                <input type="hidden" name="product_id" id="product_id" value="{{ $cartItem->id }}">
                                <input style="width: 100px; height: 30px;"  class="flex-c-m stext-105 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer" type="submit" value="Remove">

                            </form>

                        </td>

                    </tr>

                @endforeach


             


                </tbody>

</table>














                        </div>

                        <div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
                            <div class="flex-w flex-m m-r-20 m-tb-5">
                                <input class="stext-104 cl2 plh4 size-117 bor13 p-lr-20 m-r-10 m-tb-5" type="text" name="" placeholder="Coupon Code">
                                    
                                <div class="flex-c-m stext-101 cl2 size-118 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-5">
                                    Apply coupon
                                </div>
                            </div>

                            <div class="flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10">
                                Update Cart
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Totals Display Area -->
                <div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
                    <div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
                        <h4 class="mtext-109 cl2 p-b-30">
                            Cart Totals
                        </h4>

                        <div class="flex-w flex-t bor12 p-b-13">
                            <div class="size-208">
                                <span class="stext-110 cl2">
                                    
                                     Sub Total: 
                                </span>
                            </div>

                            <div class="size-209">
                                <span class="stext-110">
                                    Ksh. {{Cart::subtotal()}}
                                </span>
                            </div>
                        </div>

                        <div class="flex-w flex-t bor12 p-b-13">
                            <div class="size-208">
                                <span class="stext-110 cl2">
                                    
                                     Tax: 
                                </span>
                            </div>

                            <div class="size-209">
                                <span class="stext-110">
                                    Ksh. {{Cart::tax()}}
                                </span>
                            </div>
                        </div>

                        <div class="flex-w flex-t bor12 p-t-15 p-b-30">
                            <div class="size-208 w-full-ssm">
                                <span class="stext-110 cl2">
                                    Shipping:
                                </span>
                            </div>



                            <div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
                                <p class="stext-111 cl6 p-t-2">
                                    No shipping at the moment.
                                </p>
                                
                            
                            </div>
                        </div>



                        <div class="flex-w flex-t p-t-27 p-b-33">
                            <div class="size-208">
                                <span class="mtext-101 cl2">
                                    Total:
                                </span>
                            </div>

                            <div class="size-209 p-t-1">
                                <span class="stext-110">
                                   Ksh. {{Cart::total()}}
                                </span>
                            </div>
                        </div>

                     

        
                    <a href="{{route('checkout.shipping')}}" class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">Proceed to Checkout</a>
                    </div>
                </div>
                <!-- End of Totals Display Area -->

            </div>
        </div>
    </form>
        


    <!-- Back to top -->
    <div class="btn-back-to-top" id="myBtn">
        <span class="symbol-btn-back-to-top">
            <i class="zmdi zmdi-chevron-up"></i>
        </span>
    </div>


    @endsection