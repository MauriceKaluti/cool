<?php
use App\ProductDesign;
use App\Attribute;
use App\AttributeGroup;
?>


@extends('admin.layout.admin')

@section('content')


<div class="card">
    <div class="card-header">
        <div class="card-title">Customer Order Details</div>
        </div>
        <div class="card-body">
            <div class="card-sub">
            All Customer Order Specifications
            </div>
        <div class="table-responsive">
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                    <th>O.D ID</th>
                    <th>Product Name</th> 
                    <th>Customer</th>              
                    <th>Design</th>
                    <th>Product Options</th>
                    <th>Action</th>
                    <th>Download Design</th>
                    </tr>    
                </thead>
                <tbody>
                @foreach($orderdetails as $item)
                <tr class="gradeX">
                    <td>{{ $item->id }}</td>
                    
                     <td>{{ $item->product->name }}</td>
                     <?php
                    $review_user = ProductDesign::with( 'user' )->where( 'id', $item->id )->first();                    
                   ?>

                   @if(!empty($item->user_id))
                    <td>{{ $review_user->user->name }}</td>
                    @else
                    
                    <td style="color: #E5E5E5;"><b>Guest User</b></td>
                    @endif
                    @if(!empty($item->design_path))
                    <td>{{ $item->design_path }}</td>
                    @else
                    <td style="color: #E5E5E5;"><b>No Upload</b></td>
                    @endif
                          <td >

                          <?php
                          $cartItems = ProductDesign::all();

                          foreach ($cartItems as $cartItem) {
                              # code...
                        
                            $product_design = ProductDesign::where( 'product_id', '=', $cartItem->id )->first();

                            $attribute_ids_str = $cartItem->attributes_ids ;

                            if ( $attribute_ids_str != "" ) {

                                $attribute_id_array = explode( ",", trim( $attribute_ids_str ) );

                                $attributes = Attribute::whereIn( 'id', $attribute_id_array )->get();

                                foreach ( $attributes as $attribute ) {

                                    $attribute_group = AttributeGroup::where( 'id', '=', $attribute->attribute_group_id )->first();

                                    echo $attribute_group->name . ' : ' . $attribute->name . "<br>";

                                }
  }
                            }

                            ?>
                        </td>
                    
                    <td class="center">
                       <div class="row">
                        
                    
                        <form action="{{route('order-details.destroy',$item->id)}}"  method="POST">
                             {{csrf_field()}}
                            {{method_field('DELETE')}}
                            &nbsp&nbsp&nbsp&nbsp<input class="btn btn-sm btn-danger" type="submit" value="Delete">
                         </form>
                         </div>
                    </td>
                    <td>
                        @if(!empty($item->design_path))
                         <a href="{{route('file-download')}}" type="button" class="btn btn-primary download" data-report_id="{{$item->id}}" >Download</a>
                         @else
                    <a href="" type="button" class="btn btn-success download">N/A</a>
                         @endif
                    </td>
                                               
                </tr>


                @endforeach
            </tbody>
        </table>
        <?php echo $orderdetails->render(); ?>
    </div>
                
</div>
</div>


@endsection