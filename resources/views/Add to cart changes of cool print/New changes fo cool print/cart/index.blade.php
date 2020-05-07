<?php
use App\AttributeGroup;
use App\Attribute;
?>

@extends('layout.main')

@section('content')

    <br><br><br><br>

    <div class="container">

        <div class="row">

            <h4>Cart Items</h4>

            <table class="table table-hover table-bordered">

                <thead>

                <tr>
                    <th>Name</th>
                    <th>Attributes</th>
                    <th>Price</th>
                    <th>Remove Item</th>
                </tr>

                </thead>

                <tbody>
                @foreach($cartItems as $cartItem)
                    <tr>
                        <td>{{ $cartItem->name }}</td>
                        <td>
                            <?php
                            $attribute_ids_str = $cartItem->options->has('attribute_ids') ? $cartItem->options->attribute_ids : '';
                            if($attribute_ids_str != ""){
                            	$attribute_id_array = explode(",", trim($attribute_ids_str));
                                $attributes  = Attribute::whereIn( 'id', $attribute_id_array )->get();
                                foreach($attributes as $attribute){
	                                $attribute_group  = AttributeGroup::where( 'id', '=', $attribute->attribute_group_id )->first();
                                    echo $attribute_group->name . ' : ' . $attribute->name . "<br>";
                                }
                            }
                            ?>
                        </td>
                        <td>${{ number_format($cartItem->price, 2) }}</td>
                        <td>
                            {!!Form::close()!!}
                            <form action="{{route('cart.destroy',$cartItem->rowId)}}" method="POST">
                                {{csrf_field()}}
                                {{method_field('DELETE')}}
                                <input style="background-color: red;" class="btn btn-danger" type="submit" value="Delete">
                            </form>
                        </td>
                    </tr>
                @endforeach

                <tr>
                    <td></td>
                    <td>
                        Tax: Ksh. {{Cart::tax()}} <br>
                        Sub Total: Ksh. {{Cart::subtotal()}} <br>
                        Grand Total: Ksh. {{Cart::total()}}
                    </td>
                    <td>Total Items: {{Cart::count()}}</td>
                    <td></td>
                </tr>


                </tbody>

            </table>

            <a style="border-radius: 20px;" href="{{route('checkout.shipping')}}" class="btn btn-success">Proceed to Checkout</a>

        </div>

    </div>

@endsection