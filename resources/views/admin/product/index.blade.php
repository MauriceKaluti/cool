@extends('admin.layout.admin')
@section('content')
    <div class="card">
        <div style="background-color: lightgrey;" class="card-header"> All Products</div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-bordered">
                    <thead>
                    <tr>
                        <th>Product ID</th>
                        <th>Product Group Name</th>
                        <th>Category Name</th>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Image</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                        <tr class="gradeX">
                            <td>{{ $product->id }}</td>
                            <td>
                                <?php
									$product_groups = DB::table('group_products')
                                                    ->select('product_groups.*')
                                                    ->leftJoin('product_groups', 'product_groups.id', '=', 'group_products.product_group_id')
                                                    ->where( 'product_id', '=', $product->id )
                                                    ->get();
									foreach ($product_groups as $product_group){
                                        echo $product_group->name.',<br>';
                                    }
								?>
                            </td>
                            <td>{{ $product->category->name }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->price }}</td>
                            <td>                                @if(!empty($product->image))
                                    <img src="{{url('images/productimages/medium',$product->image)}}" style="width: 60px;">
                                @endif
                            </td>
                            <td>{{ $product->description }}</td>
                            <td class="center">
                                <div class="row">
                                    <a href="{{ url('/admin/edit-product/' .$product->id) }}" class="btn btn-primary btn-mini">Edit</a>&nbsp
                                    <a href="{{ url('/admin/add-attributes/' .$product->id) }}" class="btn btn-success btn-mini">Add</a>&nbsp
                                    <form action="{{route('product.destroy',$product->id)}}" method="POST">
                                        {{csrf_field()}}
                                        {{method_field('DELETE')}}
                                        <input class="btn btn-sm btn-danger" type="submit" value="Delete">
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <?php echo $products->render(); ?>
            </div>
        </div>
    </div>@endsection