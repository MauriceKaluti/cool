@extends('layout.main')

@section('title', 'Prints')

@section('content') 

   <div class="container">
     

<br><br><br><br><br>
		<div class="col-md-12 product-category">                
			<h3><b>{{ (empty($category)) ? "" : $category->name }}</b>
			</h3>            
		</div>
<br>

 <div class="row">

		@forelse($prints as $print)                
		<div class="col-md-6">
			<div style="margin-bottom: 20px;" class="card">                        
				<div class="card-body">
					<a style="text-decoration: none; color: black;" href="{{route('one.print',$print->id)}}">
                    <img class="card-img" src="{{url('images/productimages/medium',$print->image)}}"/>
                	</a>
                    	<br><br>
                        <a style="text-decoration: none; color: black;" href="{{route('one.print',$print->id)}}">
					<h6><b> {{$print->name}} </b></h6>
				</a> 
				<p>{{$print->description}}</p>

				<a href="{{route('one.print', $print->id)}}" style="background-color: #1e2d3b; border-radius: 20px; color: white; text-transform: none;" class="btn btn-mini">Learn More</a>

                    </div>            
	                   
				</div> 
				</div>                       

		@empty

		<h3>No Prints Available</h3>


		@endforelse

		</div>   
</div>

		@endsection