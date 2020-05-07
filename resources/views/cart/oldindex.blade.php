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
		<th>Price</th>
		<th>Qnty</th>
		<th>Size</th>
		<th>Remove Item</th>
	</tr>

</thead>

<tbody>
	@foreach($cartItems as $cartItem)
	<tr>
		<td>{{$cartItem->name}}</td>
		<td>{{$cartItem->price}}</td>
		<td width="50px">
			

			{!! Form::open(['route'=>['cart.update',$cartItem->rowId],'method'=>'PUT'])!!}

			<input class="form-control" type="text" name="qty" value="{{$cartItem->qty}}">

			</td>

			<td>

			<div style="border-radius: 20px;">{!!Form::select('size', ['A6'=>'A6', 'A5'=>'A5', 'A4'=>'A4'], null, ['class' => 'form-control', $cartItem->options->has('size')?$cartItem->options->size:''])!!}</div>

			</td>

		
		

		<td>
			<input style="float: left;" type="submit" class="btn btn-primary" value="Ok" name=""> 

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
		<td></td>
	</tr>


</tbody>

</table>

<a style="border-radius: 20px;" href="{{route('checkout.shipping')}}" class="btn btn-success">Proceed to Checkout</a>	

</div>

</div>

@endsection