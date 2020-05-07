@extends('admin.layout.admin')

@section('content')

    <div class="container">

        <div class="row">

            <div class="col-md-6">
            @if($action == "add")
                <!-- Add Attribute Group -->
                    <div class="card">

                        <div style="background-color: lightgrey;" class="card-header">
                            Add Attribute Group
                        </div>

                        <br>

                        <div class="container">

                            {!! Form::open(['route' => 'attribute-group.store', 'method' => 'post']) !!}

                            {{ Form::label('name', 'Attribute Group Name') }}
                            {{ Form::text('name', null, array('class' => 'form-control', 'required' => 'required')) }}

                            <br>

                            {{ Form::submit('Create',array('class' => 'btn btn-primary')) }}

                            {!! Form::close() !!}

                            <br>

                        </div>

                    </div>
            @endif
            @if($action == "edit")
                <!-- Edit Attribute Group -->
                    <div class="card">

                        <div style="background-color: lightgrey;" class="card-header">
                            Edit Attribute Group
                        </div>

                        <br>

                        <div class="container">

                            {!! Form::open(['route' => array('attribute-group.update', $attribute_group->id), 'method' => 'patch' ]) !!}

                            {{ Form::label('name', 'Attribute Group Name') }}
                            {{ Form::text('name', $attribute_group->name, array('class' => 'form-control', 'required' => 'required')) }}

                            <br>

                            {{ Form::submit('Update',array('class' => 'btn btn-primary')) }}

                            {!! Form::close() !!}

                            <hr>

                            {!! Form::open(['route' => array('attribute-group.destroy', $attribute_group->id), 'method' => 'delete' ]) !!}

                            {{ Form::submit('Delete',array('class' => 'btn btn-danger')) }}

                            {!! Form::close() !!}

                            <br>

                        </div>

                    </div>
                @endif
            </div>

            <div class="col-md-6">

                <div class="card">
                    <div style="background-color: lightgrey;" class="card-header">All Attribute Groups</div>

                    <ul class="list-group list-group-flush">
                        @if(!empty($attribute_groups))

                            @forelse($attribute_groups as $attribute_group)

                                <li class="list-group-item">
                                    <a href="{{route('attribute-group.show', $attribute_group->id)}}">{{ $attribute_group->name }}</a>
                                </li>

                            @empty

                                <li class="list-group-item">No Data Available</li>

                            @endforelse

                        @endif
                    </ul>
                    <br>
                                       
                    <?php echo $attribute_groups->render(); ?>

                </div>

            </div>

            <!-- All Attributes In an Attribute Group -->
            @if(!empty($attributes))

                <div class="col-md-6">

                    <div class="card">
                        <div style="background-color: lightgrey;" class="card-header">Avalailable Attributes</div>

                        <table class="table table-hover table-bordered">
                            <thead>
                            <tr>
                                <th>Attributes</th>
                            </tr>

                            </thead>
                            <tbody>
                            @forelse($attributes as $attribute)
                                <tr>
                                    <td>{{ $attribute->name }}</td>
                                </tr>

                            @empty

                                <tr>
                                    <td>No Data Available</td>
                                </tr>

                            @endforelse

                            </tbody>
                           
                        </table>

                                       
                   
                    </div>
                    <a style="border-radius: 20px;" class="btn btn-primary" href="{{route('attribute-group.store')}}">Back to Attribute Groups</a>
                </div>

        @endif

        <!-- End of All Attributes In an Attribute Group -->

        </div>

    </div>

@endsection





