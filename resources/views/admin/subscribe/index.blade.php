<?php
use App\Subscribe;
use App\Attribute;
use App\AttributeGroup;
?>


@extends('admin.layout.admin')

@section('content')


<div class="card">
    <div class="card-header">
        <div class="card-title">Customer Email Subscriptions</div>
        </div>
        <div class="card-body">
            <div class="card-sub">
            All Email Subscriptions
            </div>
        <div>
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                    <th>SE ID</th>
                    <th>Subscription Email</th> 
                    <th>Delete</th>              
                   
                 
                    </tr>    
                </thead>
                <tbody>
                @foreach($subscribers as $item)
                <tr class="gradeX">
                    <td>{{ $item->id }}</td>
                    
                     <td>{{ $item->email }}</td>
                   
                   
            
                    
                    <td class="center">
                       <div class="row">
                        
                    
                        <form action="{{route('subscribers.destroy',$item->id)}}"  method="POST">
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
        <?php echo $subscribers->render(); ?>
    </div>
                
</div>
</div>


@endsection