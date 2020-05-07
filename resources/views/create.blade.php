@extends('layout.main')


@section('content')


<!DOCTYPE html>
<html>
<head>
    <title>Admin Area</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" media="screen" href="{{asset('css/bootstrap.min.css')}}">

     <link rel="stylesheet" media="screen" href="{{asset('dist/css/foundation.css')}}">

<link rel="stylesheet" media="screen" href="{{asset('dist/css/app.css')}}">



    <!-- <link rel="stylesheet" media="screen" href="https://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="{{asset('css/admin.css')}}">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
        <link rel="stylesheet" href="dist/css/foundation.css"/>
        <link rel="stylesheet" href="dist/css/app.css"/>
        <link href="http://cdnjs.cloudflare.com/ajax/libs/foundicons/3.0.0/foundation-icons.css" rel="stylesheet">
</head>
<body>
@include('admin.layout.includes.header')
<div class="page-content">
    @if(Session::has('message'))
        <div class="alert alert-info">
            
        </div>
    @endif

    <div class="row">
        @include('admin.layout.includes.sidenav')
        <div class="col-md-10 display-area">
            <div class="row text-center">
                <div class="col-md-10 col-md-offset-1">
                    <div class="content-box-large">

                    	<!-- Include Form Code Here -->

                    	{!! Form::open(['route'=>'products.store','method'=>'POST','files'=>true])!!}

                        {{csrf_field()}}

                    	{{ Form::label('name','Name') }}
            			{{ Form::text('name', null, array('class' => 'form-control')) }} 

            			{{ Form::label('description','Description') }}
            			{{ Form::text('description', null, array('class' => 'form-control')) }}

            			{{ Form::label('size','Size') }}
            			{{ Form::select('size', ['A6'=>'A6', 'A5'=>'A5', 'A4'=>'A4'], null, ['class' => 'form-control']) }} 

            			{{ Form::label('category_id','Categories') }}
            			{{ Form::select('category_id', $categories, null, ['class' => 'form-control', 'placeholder'=>'Select a Category']) }}

            			{{ Form::label('image','Image') }}
            			{{ Form::file('image',array('class' => 'form-control')) }}   




            			{{ Form::submit('Create',array('class' => 'btn btn-default')) }}


                    	{!!Form::close()!!}

                    </div>
				</div>
			</div>
		</div>
	</div>




</div><!--/Display area after sidenav-->
</div>

</div><!--/Page Content-->

</br>








    </div>















@endsection