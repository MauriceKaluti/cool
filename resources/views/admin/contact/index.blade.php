<?php
use App\Contact;
use App\Attribute;
use App\AttributeGroup;
?>


@extends('admin.layout.admin')

@section('content')


<div class="card">
    <div class="card-header">
        <div class="card-title">Customer Contact Us Sent Messages</div>
        </div>
        <div class="card-body">
            <div class="card-sub">
            All Sent Messages
            </div>
        <div>
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                    <th>SE ID</th>
                    <th>Name</th> 
                     <th>Email</th> 
                      <th>Phone</th> 
                       <th>Message</th> 
                    <th>Delete</th>              
                   
                 
                    </tr>    
                </thead>
                <tbody>
                @foreach($sent as $item)
                <tr class="gradeX">
                    <td>{{ $item->id }}</td>
                    
                     <td>{{ $item->name }}</td>
                     <td>{{ $item->email }}</td>
                     <td>{{ $item->phone }}</td>
                     <td>{{ $item->message }}</td>
                   
                   
            
                    
                    <td class="center">
                       <div class="row">
                        
                    
                        <form action="{{route('sent_messages.destroy',$item->id)}}"  method="POST">
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
        <?php echo $sent->render(); ?>
    </div>
                
</div>
</div>


@endsection