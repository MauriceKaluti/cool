<div class="page-content">
    @if(Session::has('message'))
        <div class="alert alert-info">
            
        </div>
    @endif

    <div class="row">
      
        <div class="col-md-10 display-area">
            <div class="row text-center">
                <div class="col-md-10 col-md-offset-1">
                    <div class="content-box-large">

                        <!-- Include Form Code Here -->

                        <h3>Upload Product Here</h3><br>

                        {!! Form::open(['route'=>'product.store','method'=>'POST','files'=>true])!!}

                        {{ Form::label('name','Name') }}
                        {{ Form::text('name', null, array('class' => 'form-control')) }} 

                        {{ Form::label('description','Description') }}
                        {{ Form::text('description', null, array('class' => 'form-control')) }}

                        {{ Form::label('price','Price') }}
                        {{ Form::text('price', null, array('class' => 'form-control')) }}

                        {{ Form::label('size','Size') }}
                        {{ Form::select('size', ['A6'=>'A6', 'A5'=>'A5', 'A4'=>'A4'], null, ['class' => 'form-control']) }} 

                        {{ Form::label('category_id','Categories') }}
                        {{ Form::select('category_id', $categories, null, ['class' => 'form-control', 'placeholder'=>'Select a Category']) }}

                        {{ Form::label('image','Image') }}
                        {{ Form::file('image',('class' => 'form-control')) }}   




                        {{ Form::submit('Create',array('class' => 'btn btn-primary')) }}


                        {!!Form::close()!!}








                    </div>
                </div>
            </div>
        </div>
    </div>




</div>

<!--/Display area after sidenav-->

</div>

</div>

<!--/Page Content-->

</br>

</div>