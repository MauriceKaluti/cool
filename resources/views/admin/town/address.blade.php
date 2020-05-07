

<?php
use App\Town;
use App\Address;

?>


@extends('admin.layout.admin')

@section('content')

<div class="container">

	<div class="row">

			<div class="col-md-6">
				<div class="card">

				  <div style="background-color: lightgrey;" class="card-header">
			   		 Add Check Out Town
			  		</div>
			  		<br>

			  		<div class="container">

					 {!! Form::open(['route' => 'town.store', 'method' => 'post']) !!}


					 {{ Form::label('name', 'Town Name') }}
			         {{ Form::text('name', null, array('class' => 'form-control')) }}

			         <br>
			                    

			          {{ Form::submit('Create',array('class' => 'btn btn-primary')) }}




					  {!! Form::close() !!}
				
						<br>

					</div>
						
							

					</div>

			</div>


			<div class="col-md-6">

				<div class="card">
					<div style="background-color: lightgrey;" class="card-header">All Towns</div>

						<ul class="list-group list-group-flush">
							@if(!empty($towns))
							@forelse($towns as $town)

					    	<li class="list-group-item"><a href="{{route('town.show',$town->id)}}">{{$town->name}}</a></li>

					    	<!-- <li class="list-group-item"><a>{{$town->name}}</a></li> -->
					    	@empty
					    <li class="list-group-item">No Data Available</li>

					    	@endforelse

							@endif
					  	</ul>				

					  	<br><br>

					  	
				</div>				
				
			</div>


			<!-- All Products In a Category -->
			@if(!empty($products))

		
			<div class="col-md-6">

				<div class="card">
					<div style="background-color: lightgrey;" class="card-header">Avalailable Users In Towns</div>

						<table class="table table-hover table-bordered">
		<thead>
			<tr>
				<!-- <h4>All Addresses Available In Town</h4> -->
				<th>Phone</th>
				<th>Name</th>
			</tr>
			
		</thead>
		<tbody>
			@forelse($products as $product)

			<?php
			$town_user = Address::with( 'user' )->where( 'id', $product->id )->first();
			?>
			<tr>
				<td>{{$product->phone}}</td>
				<td>{{ $town_user->user->name }}</td>
			</tr>

			

			@empty

			<tr>
				<td>No Data Available</td>
			</tr>


			@endforelse

				</tbody>

			</table>			

				</div>				
				<a style="border-radius: 20px;" class="btn btn-primary" href="{{route('town.store')}}">Back to Towns</a>
	</div>




			@endif




			<!-- End of All Products In a Category -->

			
	</div>

</div>

@endsection





