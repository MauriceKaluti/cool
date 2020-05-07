
<?php

use App\ProductsAttribute;
use App\Category;
use App\Product;
use App\ProductDesign;
use App\ProductGroup;
use App\Attribute;
use App\AttributeGroup;
?>

@extends('layout.main')
@section('content')

<!-- Cart Modal Here -->

@include('front.modal.cartmodal')

<!-- Cart Modal Here -->

    <!-- Sidebar -->
        <div class="products-sidebar" style="width: 20%; float: left;">
            
          <br><br><br><br>
            
           

            {!! $sidebar_str !!}

            
        </div>
        <!-- Sidebar -->


     
    <!-- Slider -->
    <section  style="width: 80%; float: right; margin-bottom: 50px;" class="section-slide">
        <div class="wrap-slick1">
            <div class="slick1">
                <div class="item-slick1" style="background-image: url(images/carousel6.jpg);">
                    <div class="container h-full">

                        <div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
                            <br><br><br><br>
                            <div class="layer-slick1 animated visible-false" data-appear="fadeInDown" data-delay="0">
                                <span class="ltext-101 cl2 respon2">
                                    Quality Prints
                                </span>
                            </div>


                                
                            <!-- <div class="layer-slick1 animated visible-false" data-appear="fadeInUp" data-delay="800">
                                <h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1">
                                    NEW SEASON
                                </h2>
                            </div> -->
                                
                            <div class="layer-slick1 animated visible-false" data-appear="zoomIn" data-delay="1600">
                                <a href="{{route('prints')}}" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
                                    Shop Now
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                
                                <div class="item-slick1" style="background-image: url(images/carousel3.jpg);">
                    <div class="container h-full">
                        <div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
                            <br><br><br><br>
                            <div class="layer-slick1 animated visible-false" data-appear="rollIn" data-delay="0">
                                <span class="ltext-101 cl2 respon2">
                                    Shades of success!
                                </span>
                            </div>
                                
                            <!-- <div class="layer-slick1 animated visible-false" data-appear="lightSpeedIn" data-delay="800">
                                <h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1">
                                    Jackets & Coats
                                </h2>
                            </div> -->
                                
                            <div class="layer-slick1 animated visible-false" data-appear="slideInUp" data-delay="1600">
                                <a href="{{route('prints')}}" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
                                    Shop Now
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                                <div class="item-slick1" style="background-image: url(images/carousel.jpg);">
                    <div class="container h-full">
                        <div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
                            <br><br><br><br>
                            <div class="layer-slick1 animated visible-false" data-appear="rollIn" data-delay="0">
                                <span class="ltext-101 cl2 respon2">
                                    Custom Printing
                                </span>
                            </div>
                                
                            <!-- <div class="layer-slick1 animated visible-false" data-appear="lightSpeedIn" data-delay="800">
                                <h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1">
                                    Jackets & Coats
                                </h2>
                            </div> -->
                                
                            <div class="layer-slick1 animated visible-false" data-appear="slideInUp" data-delay="1600">
                                <a href="{{route('prints')}}" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
                                    Shop Now
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="item-slick1" style="background-image: url(images/carousel5.jpg);">
                    <div class="container h-full">
                        <div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
                            <br><br><br><br>
                            <div class="layer-slick1 animated visible-false" data-appear="rotateInDownLeft" data-delay="0">
                                <span class="ltext-101 cl2 respon2">
                                    Discover the power of color!
                                </span>
                            </div>
                                
                            <!-- <div class="layer-slick1 animated visible-false" data-appear="rotateInUpRight" data-delay="800">
                                <h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1">
                                    New arrivals
                                </h2>
                            </div> -->
                                
                            <div class="layer-slick1 animated visible-false" data-appear="rotateIn" data-delay="1600">
                                <a href="{{route('prints')}}" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
                                    Shop Now
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

             
    <!-- Product -->
    <section style="clear: both;" class="bg0 p-t-23 p-b-140">
        <div class="container">
            <div class="p-b-10">
                <h3  align="center" class="ltext-105 cl5 txt-center respon1">
                     Top&nbsp&nbspPrints
                </h3>
                <br><br>

                    @if(session('message'))
        <div class="alert alert-dark" role="alert">
            <h4 class="alert-heading stext-105">{{session('message')}}</h4>
        </div>
        @endif
            </div>


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
                                <!-- Image Icon Here -->
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

                <h3>No Prints Available</h3>


        @endforelse
             

            </div>

            <?php echo $prints->render(); ?>

            <!-- Load more -->
            <div class="flex-c-m flex-w w-full p-t-45">
                <a href="{{route('prints')}}" class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04">
                    Load More
                </a>
            </div>


        </div>
    </section>




        <!-- Product -->
    <section class="sec-product bg0 p-t-100 p-b-50">
        <div class="container">
            <div class="p-b-32">
                <h3 class="ltext-105 cl5 txt-center respon1">
                    Featured
                </h3>
            </div>

            <!-- Tab01 -->
            <div class="tab01">
                <!-- Nav tabs -->
         

                <!-- Tab panes -->
                <div class="tab-content p-t-50">
                    <!-- - -->
                    
                        <!-- Slide2 -->
                       
                        <div class="wrap-slick2">
                            <div class="slick2">
                                 @foreach ($relatedProducts as $relatedProduct)
                                <div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
                                    <!-- Block2 -->
                                    <div class="block2">
                                        <div class="block2-pic hov-img0">
                                            <img src="{{ url('images/productimages/small', $relatedProduct->image) }}" alt="IMG-PRODUCT">

                                            <a href="{{route('one.print',$relatedProduct->id)}}" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04">
                                                Quick View
                                            </a>
                                        </div>

                                        <div class="block2-txt flex-w flex-t p-t-14">
                                            <div class="block2-txt-child1 flex-col-l ">
                                                <a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                                    {{ $relatedProduct->name }}
                                                </a>

                                                <span class="stext-105 cl3">
                                                    Ksh {{ $relatedProduct->price }}
                                                </span>
                                            </div>

                @if ($relatedProduct->wishes()->where('user_id',auth()->id())->count())

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
                               
                                <input type="hidden" value="{{$relatedProduct->id}}" name="product_id">
                                  
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
                                @endforeach                               

                            </div>
                        </div>

                        



                    

                   
                   
                </div>
            </div>
        </div>
    </section>


    </div>

@endsection