 @extends('layout.main')

@section('title', 'Prints')

@section('content') 

    <!-- Cart Modal Here -->

@include('front.modal.cartmodal')

<!-- Cart Modal Here -->
<div class="container">
    <br><br><br><br><br>
        <div class="col-md-12 product-category">                
            <h3 style="font-size: 30px;" class="stext-105"><b>All Wishlist Products</b>
            </h3>            
        </div><br>
<br>
<div class="row isotope-grid">
@forelse($prints as $print)
<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
<!-- Block2 -->
<div class="block2">
<div class="block2-pic hov-img0">
<img src="{{url('images/productimages/small',$print->image)}}" alt="IMG-PRODUCT">

<a href="{{route('one.print',$print->id)}}" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04">
Quick View
</a>
</div>

<div class="block2-txt flex-w flex-t p-t-14">
<div class="block2-txt-child1 flex-col-l ">
<a href="{{route('one.print',$print->id)}}" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
{{$print->name}}
</a>

<span class="stext-105 cl3">
Ksh. {{ $print->price }}
</span>
</div>

<div class="block2-txt-child2 flex-r p-t-3">
    <button title="Remove From Wishlist" type="submit">
<a href="{{url('/')}}/removeWishList/{{$print->id}}">
<img style="width: 29px; height: 24px;" class="icon-heart1 dis-block trans-04" src="{{url('ecom/images/icons/removeButton3.png')}}" alt="ICON">
</a></button>


<!-- <img class="icon-heart2 dis-block trans-04 ab-t-l" src="{{url('ecom/images/icons/icon-heart-02.png')}}" alt="ICON"> -->

</div>

</div>
</div>
</div> 

@empty

<div class="container" style="text-align: center;">
<h4 class="stext-105">No Products In Your Wishlist</h4>
</div>

@endforelse

    </div>

    <br><br><br><br>



</div>
        @endsection