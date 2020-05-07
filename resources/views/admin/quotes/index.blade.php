@extends('admin.layout.admin')

@section('content')


<div class="card">
    <div class="card-header">
        <div class="card-title">All Customer Quotes</div>
        </div>
        <div class="card-body">
            <div class="card-sub">
            All Customer Quotes Shown Below
            </div>
        <div class="table-responsive">
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                    <th>Quote ID</th>
                    <th>C.Name</th> 
                    <th>Email</th>              
                    <th>Phone</th>
                    <th>Company</th>
                    <th>Website</th>
                    <th>Phone</th>
                    <th>Message</th>
                    <th>Actions</th>
                    </tr>    
                </thead>
                <tbody>
                    
                @foreach($quotes as $quote)

                <tr class="gradeX">
                    <td>{{ $quote->id }}</td>
                    
                     <td>{{ $quote->name }}</td>
                    <td>{{ $quote->email }}</td>
                    <td>{{ $quote->phone }}</td>
                    <td>{{ $quote->company }}</td>
                    <td>{{ $quote->website }}</td>
                    <td>{{ $quote->phone }}</td>
                    <td>{{ $quote->message }}</td>
                    
                    <td class="center">
                       <div class="row">
                        <a href="{{ url('/admin/edit-quote/' .$quote->id) }}" class="btn btn-primary btn-mini">Edit</a>&nbsp
                    
                        <form action="{{route('customer-quotes.destroy',$quote->id)}}"  method="POST">
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

        <?php echo $quotes->render(); ?>

    </div>
                
</div>
</div>


@endsection