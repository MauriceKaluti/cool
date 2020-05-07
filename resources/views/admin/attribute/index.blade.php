@extends('admin.layout.admin')

@section('content')

    <div class="container">

        <div class="row">

            <div class="col-md-6">
            @if($action == "add")
                <!-- Add Attribute -->
                    <div class="card">

                        <div style="background-color: lightgrey;" class="card-header">
                            Add Attribute
                        </div>

                        <br>

                        <div class="container">

                            {!! Form::open(['route' => 'attribute.store', 'method' => 'post']) !!}

                            {{ Form::label('attribute_group_id', 'Attribute Group') }}
                            {{ Form::select('attribute_group_id', $attribute_groups, null, array('class' => 'form-control', 'placeholder'=>'Select Attribute Group', 'required' => 'required') ) }}
                            <br>
                            {{ Form::label('name', 'Attribute Name') }}
                            {{ Form::text('name', null, array('class' => 'form-control', 'required' => 'required')) }}

                            <br>

                            {{ Form::submit('Create',array('class' => 'btn btn-primary')) }}

                            {!! Form::close() !!}

                            <br>

                        </div>

                    </div>
            @endif
            @if($action == "edit")
                <!-- Edit Attribute -->
                    <div class="card">

                        <div style="background-color: lightgrey;" class="card-header">
                            Edit Attribute
                        </div>

                        <br>

                        <div class="container">

                            {!! Form::open(['route' => array('attribute.update', $attribute->id), 'method' => 'patch' ]) !!}

                            {{ Form::label('attribute_group_id', 'Attribute Group') }}
                            {{ Form::select('attribute_group_id', $attribute_groups, $attribute->attribute_group_id, array('class' => 'form-control', 'placeholder'=>'Select Attribute Group') ) }}

                            <br>

                            {{ Form::label('name', 'Attribute Group Name') }}
                            {{ Form::text('name', $attribute->name, array('class' => 'form-control', 'required' => 'required')) }}

                            <br>

                            {{ Form::submit('Update',array('class' => 'btn btn-primary')) }}

                            {!! Form::close() !!}

                            <hr>

                            {!! Form::open(['route' => array('attribute.destroy', $attribute->id), 'method' => 'delete' ]) !!}

                            {{ Form::submit('Delete',array('class' => 'btn btn-danger')) }}

                            {!! Form::close() !!}

                            <br>

                        </div>

                    </div>
                @endif
            </div>

            <div class="col-md-6">

                <div class="card">
                    <div style="background-color: lightgrey;" class="card-header">All Attributes</div>

                    <ul class="list-group list-group-flush">
                        @if(!empty($attributes))

                            @forelse($attributes as $attribute)

                                <li class="list-group-item">
                                    <a href="{{route('attribute.show', $attribute->id)}}">{{ $attribute->name }}</a>
                                </li>

                            @empty

                                <li class="list-group-item">No Data Available</li>

                            @endforelse

                        @endif
                    </ul>
                    <br>
                                       
                    <?php echo $attributes->render(); ?>

                </div>

            </div>

            <!-- All Attributes In an Attribute Group -->
            @if(!empty($attribute_group))

                <div class="col-md-6">

                    <div class="card">
                        <div style="background-color: lightgrey;" class="card-header">Avalailable Attribute Group</div>

                        <table class="table table-hover table-bordered">
                            <thead>
                            <tr>
                                <th>Attribute Group</th>
                            </tr>

                            </thead>
                            <tbody>
                            @if($attribute_group)
                                <tr>
                                    <td>{{ $attribute_group->name }}</td>
                                </tr>

                            @else

                                <tr>
                                    <td>No Data Available</td>
                                </tr>

                            @endif

                            </tbody>

                        </table>

                    </div>
                    <a style="border-radius: 20px;" class="btn btn-primary" href="{{route('attribute.store')}}">Back to Attributes</a>
                </div>

        @endif

        <!-- End of All Attributes In an Attribute Group -->

        </div>

    </div>

@endsection





