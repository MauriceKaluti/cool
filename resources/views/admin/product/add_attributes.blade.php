@extends('admin.layout.admin')

@section('content')

    <!-- <h4 align="center">Add Attributes</h4> -->

    <div class="card">
        <div style="background-color: lightgrey;" class="card-header">Add Product Attributes</div>
        <div class="container">
            <div class="col-md-6">
                @if($action == "add")
                    <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{ url('admin/add-attributes/' . $productDetails->id) }}" name="add_attribute">

                    {{ csrf_field() }}

                    <input type="hidden" name="product_id" value="{{ $productDetails->id }}"><br>

                    <div class="control-group">
                        <label class="control-label">Product Name: </label>
                        <label class="control-label"><strong>{{ $productDetails->name }}</strong></label>
                    </div>
                    <br>

                    <div class="control-group">
                        <label class="control-label">Product Image: </label>
                        <label class="control-label"><img style="width: 200px; height: 100px;" src="{{ url('images/productimages/medium', $productDetails->image) }}"/></label>
                    </div>
                    <br>

                    <div class="control-group">
                        <label class="control-label">Attribute Groups</label>
                        <div class="field_wrapper">
                            <select name="attribute_group_id" id="attribute_group_id" class="form-control" required onchange="changePrice(this, '');">
                                <option value="">Select Attribute Groups</option>
                                @foreach($attribute_groups as $attribute_group)
                                    <option value="{{ $attribute_group->id }}">{{ $attribute_group->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <br>

                    <div class="control-group">
                        <label class="control-label">Attribute</label>
                        <div class="field_wrapper">
                            <select name="attribute_id" id="attribute_id" class="form-control" required>
                                <option value="">Select Attributes</option>
                            </select>
                        </div>
                    </div>
                    <br>

                    <div class="control-group">
                        <label class="control-label">Price</label>
                        <div class="field_wrapper">
                            <input type="text" name="price" id="price" placeholder="Price" class="form-control" required/>
                        </div>
                    </div>
                    <br>

                    <button style="border-radius: 20px;" type="submit" class="btn btn-primary">Add Attributes</button>

                    <!--  <div class="form-actions">
                         <input type="submit" value="Add Attributes" class="btn btn-success">
                     </div> -->

                </form>
                @elseif($action == "edit")
                    <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{ url('admin/edit-attributes/' . $product_attribute->id) }}" name="add_attribute">

                        {{ csrf_field() }}

                        <input type="hidden" name="product_id" value="{{ $productDetails->id }}"><br>

                        <div class="control-group">
                            <label class="control-label">Product Name: </label>
                            <label class="control-label"><strong>{{ $productDetails->name }}</strong></label>
                        </div>
                        <br>

                        <div class="control-group">
                            <label class="control-label">Product Image: </label>
                            <label class="control-label"><img style="width: 200px; height: 100px;" src="{{ url('images/productimages/medium', $productDetails->image) }}"/></label>
                        </div>
                        <br>

                        <div class="control-group">
                            <label class="control-label">Attribute Groups</label>
                            <div class="field_wrapper">
                                <select name="attribute_group_id" id="attribute_group_id" class="form-control" required onchange="changePrice(this, '{{ $product_attribute->attribute_id }}');">
                                    <option value="">Select Attribute Groups</option>
                                    @forelse($attribute_groups as $attribute_group)
                                        <option value="{{ $attribute_group->id }}" @if($product_attribute->attribute_group_id == $attribute_group->id) selected="{{ 'selected' }}" @endif>{{ $attribute_group->name }}</option>
                                    @empty
                                    @endforelse
                                </select>
                            </div>
                        </div>
                        <br>

                        <div class="control-group">
                            <label class="control-label">Attribute</label>
                            <div class="field_wrapper">
                                <select name="attribute_id" id="attribute_id" class="form-control" required>
                                    <option value="">Select Attributes</option>
                                </select>
                            </div>
                        </div>
                        <br>

                        <div class="control-group">
                            <label class="control-label">Price</label>
                            <div class="field_wrapper">
                                <input type="text" name="price" id="price" placeholder="Price" value="{{ $product_attribute->price }}" class="form-control" required/>
                            </div>
                        </div>
                        <br>

                        <button style="border-radius: 20px;" type="submit" class="btn btn-primary">Update Attribute</button>
                    </form>
                @endif
            </div>
            <br>
        </div>

    </div>

    <!-- All Attributes Display -->

    <div class="card">

        <div style="background-color: lightgrey;" class="card-header">All Product Attributes</div>
        <div class="container">
            <div class="col-md-12">
                <br>

                <div class="table-responsive">
                    <table class="table table-hover table-bordered">
                        <thead>
                        <tr>
                            <th>Attribute ID</th>
                            <th>Attribute Group</th>
                            <th>Attribute Name</th>
                            <th>Price</th>
                            <th>Actions</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($product_attributes as $product_attribute)
                            <tr class="gradeX">
                                <td>
                                    <input type="hidden" name="id" value="{{ $product_attribute->id }}"> {{ $product_attribute->id }}
                                </td>
                                <td>{{ $product_attribute->group_name }}</td>
                                <td>{{ $product_attribute->attribute_name }}</td>
                                <td>{{ $product_attribute->price }}</td>
                                <td class="center">

                                    <div class="row">

                                        <span>&nbsp&nbsp</span>
                                        <a href="{{ url('/admin/edit-attributes/' . $product_attribute->id) }}" style="border-radius: 20px;" class="btn btn-sm btn-success">Update</a>

                                        <span>&nbsp&nbsp</span>
                                        <a href="{{ url('/admin/delete-attributes/' . $product_attribute->id) }}" style="border-radius: 20px;" class="btn btn-sm btn-danger">Delete</a>
                                        <?php /*<form action="{{ url('/admin/delete-attributes/' . $product_attribute->id) }}" method="POST">
                                            {{csrf_field()}}
                                            <input style="border-radius: 20px;" class="btn btn-sm btn-danger" type="submit" value="Delete">
                                        </form>*/ ?>

                                    </div>

                                </td>

                            </tr>
                        @endforeach
                        </tbody>

                    </table>

                </div>

            </div>
            <br>
        </div>

        <!-- End of All Attributes Display -->

        <script type="text/javascript">

            $(document).ready(function () {
                $('#attribute_group_id').trigger('onchange');
            });

            function changePrice(attr_grp, attr_id) {
                var attribute_group_id = $(attr_grp).val();
                if (attribute_group_id == "") {
                    return false;
                }

                $.ajax({
                    type: 'get',
                    url: '<?php echo route( 'get_attributes' ); ?>',
                    data: {attribute_group_id: attribute_group_id, attribute_id: attr_id},
                    success: function (resp) {
                        //alert(resp);
                        $("#attribute_id").html('');
                        $("#attribute_id").html(resp);
                    },
                    error: function (error) {
                        alert(error);
                        //console.log(JSON.stringify(error));
                    }
                });
            }
        </script>
@endsection



