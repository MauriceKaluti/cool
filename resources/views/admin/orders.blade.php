@extends('admin.layout.admin')
@section('content')
    <h3>Orders</h3>
    <hr>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="container">
                <br>
            

    <ul>
        @foreach($orders as $order)
            <li>
           
                @if(!empty($item->user_id))
                <div style="background-color: lightgrey;" class="card-header">
                Order by {{$order->user->name}} & Total Amount {{$order->total}}
                 </div>
                 @else
                 <div style="background-color: lightgrey;" class="card-header">
                Order by {{$order_user->user->name}} & Total Amount {{$order->total}}
                 </div><br>
               @endif

                <form action="{{route('toggle.deliver',$order->id)}}" method="POST" class="pull-right" id="deliver-toggle">
                    {{csrf_field()}}
                    <label for="delivered">Delivered</label>

                    <input type="checkbox" value="1" name="delivered"  {{$order->delivered==1?"checked":"" }}>
                    <input style="border-radius: 20px;" class="btn btn-primary" type="submit" value="Submit">
                </form>


                <div class="clearfix"></div>
               
                <h5>Items</h5>
                <table class="table table-bordered">
                    <tr>
                        <th>Name</th>
                        <th>qty</th>
                        <th>price</th>
                    </tr>
                    @foreach($order->orderItems as $item)
                        <tr>
                            <td>{{$item->name}}</td>
                            <td>{{$item->pivot->qty}}</td>
                            <td>{{$item->pivot->total}}</td>
                        </tr>

                    @endforeach
                </table>
            </li>

        @endforeach

    </ul>

</div>
</div>
</div>
</div>
@endsection

