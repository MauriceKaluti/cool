<?php
use App\Contact;
use App\Address;
use App\Attribute;
use App\AttributeGroup;
?>


@extends('admin.layout.admin')

@section('content')


<div class="card">
    <div class="card-header">
        <div class="card-title">Customer Order Shipping Details</div>
        </div>
        <div class="card-body">
            <div class="card-sub">
            All Shipping Details Provided
            </div>
        <div>
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                    <th>SD ID</th>
                    <th>Addressline</th> 
                     <th>Email</th> 
                      <th>Phone</th> 
                      <th>User</th> 
                       <th>Town</th> 
                    <th>Delete</th>              
                   
                 
                    </tr>    
                </thead>
                <tbody>
                @foreach($address as $item)
                <tr class="gradeX">
                    <td>{{ $item->id }}</td>
                    
                     <td>{{ $item->addressline }}</td>
                     <td>{{ $item->email }}</td>
                     <td>{{ $item->phone }}</td>
            <?php
			$address_user = Address::with( 'user' )->where( 'id', $item->id )->first();
			?>
                     
                     @if(!empty($item->user_id))
                    <td>{{ $address_user->user->name }}</td>
                    @else
                    
                    <td style="color: #E5E5E5;"><b>Guest User</b></td>
                    @endif

                     <?php
			$address_town = Address::with( 'town' )->where( 'id', $item->id )->first();
			?>

					@if(!empty($item->town_id))
                    <td>{{ $address_town->town->name }}</td>
                    @else
                    
                    <td style="color: #E5E5E5;"><b>No Town</b></td>
                    
                    @endif

                    <td class="center">
                       <div class="row">
                        
                    
                        <form action="{{route('address.destroy',$item->id)}}"  method="POST">
                             {{csrf_field()}}
                            {{method_field('DELETE')}}
                            &nbsp&nbsp&nbsp&nbsp<input class="btn btn-sm btn-danger" type="submit" value="Delete">
                         </form>
                         </div>
                    </td>
               
                                               
                </tr>


                @endforeach
            </tbody>
        </table>
        <?php echo $address->render(); ?>
    </div>
                
</div>
</div>


@endsection