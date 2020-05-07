@extends('admin.layout.admin')
@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="container"><p class="text-danger"></p>
                <div class="row">
                    <div class="col-md-6">
                        {!! Form::open(['route'=>'product.store','method'=>'POST','files'=>true]) !!}
                        {{ csrf_field() }}
                        {{ Form::label('name','Product Name') }}
                        {{ Form::text('name', null, array('class' => 'form-control')) }}
                        <br> {{ Form::label('product_group_id','ProductGroups') }}
                        {{ Form::select('product_group_id', $product_groups, null, ['multiple'=>'multiple','name'=>'product_group_id[]', 'class' => 'form-control', 'placeholder'=>'Select Product Group']) }}

                        <br> {{ Form::label('description','Product Description') }}
                        {{ Form::text('description', null, array('class' => 'form-control')) }}

                        <br> {{ Form::label('price','Product Price') }}
                        {{ Form::text('price', null, array('class' => 'form-control')) }}
                        
                        <br> {{ Form::label('price_badge','Price Badge') }}
                        {{ Form::text('price_badge', null, array('class' => 'form-control')) }}
                    </div>
                    <div class="col-md-6">
                        {{ Form::label('category_id','Categories') }}
                        {{ Form::select('category_id', $categories, null, ['class' => 'form-control', 'placeholder'=>'Select Product Category']) }}
                        <br> {{ Form::label('image','Product Image') }}
                        {{ Form::file('image',array('class' => 'form-control')) }}
                        <br> {{ Form::label('product_details','Product Details') }}
                        {{ Form::textarea('product_details', null, ['class' => 'form-control']) }}
                    </div>
                    <span>&nbsp&nbsp&nbsp&nbsp</span>{{ Form::submit('Create',array('class' => 'btn btn-primary')) }}
                    {!!Form::close()!!}
                </div>
                <br> <br></div>
        </div>
    </div>@endsection