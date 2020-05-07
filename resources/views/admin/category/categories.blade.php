
@extends('admin.layout.admin')

@section('content')

<div class="container">

	<div class="row">

			<div class="col-md-6">
				<div class="card">

				  <div style="background-color: lightgrey;" class="card-header">
			   		 Add Products Category
			  		</div>
			  		<br>

			  		<div class="container">

					 {!! Form::open(['route' => 'category.store', 'method' => 'post']) !!}


					 {{ Form::label('name', 'Category Name') }}
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
					<div style="background-color: lightgrey;" class="card-header">All Products Categories</div>

						<ul class="list-group list-group-flush">
							@if(!empty($categories))
							@forelse($categories as $category)
					    	<li class="list-group-item"><a href="{{route('category.show',$category->id)}}">{{$category->name}}</a></li>
					    	@empty
					    <li class="list-group-item">No Data Available</li>

					    	@endforelse

							@endif
					  	</ul>	

					  
				</div>				
				
			</div>


			<!-- All Products In a Category -->
			@if(!empty($products))

		
			<div class="col-md-6">

				<div class="card">
					<div style="background-color: lightgrey;" class="card-header">Avalailable Cat Products</div>

						<table class="table table-hover table-bordered">
		<thead>
			<tr>
				<th>Products</th>
			</tr>
			
		</thead>
		<tbody>
			@forelse($products as $product)
			<tr>
				<td>{{$product->name}}</td>
			</tr>

			@empty

			<tr>
				<td>No Data Available</td>
			</tr>


			@endforelse

				</tbody>

			</table>			

				</div>				
				<a style="border-radius: 20px;" class="btn btn-primary" href="{{route('category.store')}}">Back to Categories</a>
	</div>




			@endif




			<!-- End of All Products In a Category -->

			
	</div>

</div>

@endsection





