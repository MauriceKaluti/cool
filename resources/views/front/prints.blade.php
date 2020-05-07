 @extends('layout.main')

@section('title', 'Prints')

@section('content') 

    <!-- Cart Modal Here -->

@include('front.modal.cartmodal')

<!-- Cart Modal Here -->
<div class="container">
    <br><br><br><br><br>
        <div class="col-md-12 product-category">                
            <h3><b>{{ (empty($category)) ? "" : $category->name }}</b>
            </h3>            
        </div>
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

@if ($print->wishes()->where('user_id',auth()->id())->count())

                    <div class="block2-txt-child2 flex-r p-t-3">
                             
                                <a title="Already Added To Wishlist" class="btn-addwish-b2 dis-block pos-relative">
                                    <img class="icon-heart1 dis-block trans-04" src="{{url('ecom/images/icons/icon-heart-02.png')}}" alt="ICON">

                                    <img class="icon-heart2 dis-block trans-04 ab-t-l" src="{{url('ecom/images/icons/icon-heart-02.png')}}" alt="ICON">
                                </a>
                            </div>
                            @else
                             <form action="{{url('/addToWishList')}}" >
                                {{ csrf_field() }}
                            <div class="block2-txt-child2 flex-r p-t-3">
                               
                                <input type="hidden" value="{{$print->id}}" name="product_id">
                                  
                                <button title="Add To Wishlist" type="submit">
                                <a >
                                    <img class="icon-heart1 dis-block trans-04" src="{{url('ecom/images/icons/icon-heart-01.png')}}" alt="ICON">

                                   <!--  <img class="icon-heart2 dis-block trans-04 ab-t-l" src="{{url('ecom/images/icons/icon-heart-02.png')}}" alt="ICON"> -->
                                     </a>
                                </button>
                            </div>
                            </form>

                    @endif
</div>
</div>
</div> 

@empty

<h4 class="stext-105" align="center">No Prints Available</h4>


@endforelse

    </div>

    <br><br><br><br>

<!-- 
<div style="text-align: center;">
<a style="width: 300px;" class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer" href="">Compare Product Prices</a>
</div>
<br><br> -->
</div>

        @endsection