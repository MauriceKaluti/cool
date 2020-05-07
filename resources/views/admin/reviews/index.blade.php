@extends('admin.layout.admin')

@section('content')


<div class="card">
    <div class="card-header">
        <div class="card-title">All Products Reviews</div>
        </div>
        <div class="card-body">
            <div class="card-sub">
            All Products Reviews Shown Below
            </div>
        <div class="table-responsive">
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                    <th>Review ID</th>
                    <th>Product</th> 
                    <th>User</th>              
                    <th>Headline</th>
                    <th>Description</th>
                    <th>Actions</th>
                    </tr>    
                </thead>
                <tbody>
                @foreach($reviews as $review)
                <tr class="gradeX">
                    <td>{{ $review->id }}</td>
                    
                     <td>{{ $review->product->name }}</td>
                    <td>{{ $review->user->name }}</td>
                    <td>{{ $review->headline }}</td>
                    <td>{{ $review->description }}</td>
                    
                    <td class="center">
                       <div class="row">
                        <a href="{{ url('/admin/edit-product/' .$review->id) }}" class="btn btn-primary btn-mini">Edit</a>&nbsp
                    
                        <form action="{{route('review-page.destroy',$review->id)}}"  method="POST">
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
        <?php echo $reviews->render(); ?>
    </div>
                
</div>
</div>


@endsection