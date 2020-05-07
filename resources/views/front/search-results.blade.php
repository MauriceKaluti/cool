@extends('layout.main')

@section('title', 'Search Results')

@section('content') 

   <div class="container">
     
     
     
	<br><br><br><br><br>


<h1 style="font-size: 30px;" class="stext-105">Search Results</h1>

<p class="stext-105">{{ $products->total()}} result(s) found for <b>'{{ request()->input('query')}}'</b> </p>



                       <table class="table table-hover table-striped table-bordered">
                            <thead>
                            <tr>
                                <th class="stext-105">Product</th>
                                <th class="stext-105">Description</th>
                                <th class="stext-105">Price</th>
                                <th class="stext-105">Quantity</th>
                            </tr>

                            </thead>
                            <tbody>
                           @forelse($products as $product)
                                <tr>
                                	
                                    <td><a class="stext-105" style="color: #BF2429;" href="{{route('one.print', $product->id)}}">{{ $product->name }}</a></td>

                                    <td class="stext-105">{{ str_limit($product->description, 200) }}</td>
                                    <td class="stext-105">{{ $product->price }}</td>
                                    <td class="stext-105">{{ $product->price_badge }}</td>
                                </tr>

                            @empty

                                <tr>
                                    <td><p>No Match Found</p></td>
                                </tr>

                           @endforelse

                            </tbody>



                        </table>
                        <?php echo $products->render(); ?>

</div>

		@endsection