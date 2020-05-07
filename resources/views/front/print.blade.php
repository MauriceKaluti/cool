<?php
use App\ProductReview;
use App\ProductsAttribute;

?>

@extends('layout.main')



@section('content')


  <head>
    <title>{{  $print->name }}</title>
           
        <style type="text/css">



        
            /*Input Image*/

            .main-section {

                margin: 0 auto;

                padding: 20px;

                margin-top: 100px;

                background-color: green;

                box-shadow: 0px 0px 20px #c1c1c1;

            }

            .fileinput-remove,
            .fileinput-upload {
                display: none;
            }

            .btn.btn-primary.btn-file {
                margin: 0 !important;
            }

            /******* POPUP STYLE *******/
            .container {
                position: relative;
            }
            .popup {
                width: 300px;
                height: 300px;
                margin: 0;
                position: fixed;
                top: 50%;
                left: 50%;
                right: 0;
                bottom: 0;
                background-color: #999;
                -ms-transform: translate(-50%, -50%);
                transform: translate(-50%, -50%);
                z-index: 99999;
            }

            .hide_popup {
                float: right;
                margin-right: 10px;
                cursor: pointer;
                color: #FFFFFF;
            }

            .overlay {
                position: fixed;
                width: 100%;
                height: 100%;
                overflow: auto;
                left: 0;
                top: 0;
                bottom: 0;
                right: 0;
                background-color: rgba(255,255,255,255);
                /*background-color: rgba(0,0,0,0.7);*/
            }

            .popup-body {
                padding: 10px;
                text-align: center;
            }
            /******* POPUP STYLE *******/

        </style>

</head>
    <br>
    <br>
    <br>
    <br>


    <!-- Cart Modal Here -->

@include('front.modal.cartmodal')

<!-- Cart Modal Here -->

    <!-- products listing -->


    <!-- breadcrumb -->
    <div class="container">
        <div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
            <a href="{{route('home')}}" class="stext-109 cl8 hov-cl1 trans-04">
                Home
                <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
            </a>

            <span class="stext-109 cl4">
                {{  $print->name }}
            </span>
        </div>
    </div>

    <br><br>

    <div class="container">



        <!---- POPUP ---->
        @if(session()->has('popup'))
        <!-- <script>alert('Order Made Successfully! Check your cart.');</script>; -->
        <div class="alert alert-dark" role="alert">
            <h4 class="alert-heading stext-105">{{$print->name}} Added Successfully! <a style="color: #BF2429;" href="{{route('cart.index')}}">Check Cart</a></h4>
        </div>
        @endif
        <!---- POPUP ---->


        <div class="row">

            <div class="col-md-12">
              

                    <div class="card-body">
                        <img class="card-img" src="{{url('images/productimages/medium',$print->image)}}"/>
                    </div>

                
                <br>
            </div>

            <div class="col-md-6">

            </div>

            <!-- Add to Cart Form -->
            <div class="col-md-12">
                <div class="card">
                    <div class="container">
                        <form action="{{ route('cart.addItem',$print->id) }}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <input type="hidden" name="attributes_ids" id="attributes_ids" value="">
                            <input type="hidden" name="user_id" id="user_id" value="{{ Auth::id() }}">
                            <br>

                            <h5 class="stext-105 cl3">{{  $print->name }}</h5>
                            <h3 class="subheader">
                                <span id="getPrice" class="stext-105 cl3"><b>Ksh. {{ $print->price }}</b></span>
                                <input type="hidden"  name="hfPrice" id="hfPrice" value="{{ number_format($print->price, 2, '.', '') }}">
                            </h3><br>
                            <p class="stext-107">
                                {!! $print->description !!}
                            </p>
                            <br>

                            <p class="stext-107">
                                <small><b>*Choose from our product options to make an order</b></small>
                            </p><br>

                            <!-- Product Attributes -->
                            <div class="row">

                                @foreach($attribute_groups as $attribute_group)
                                    <div class="col-md-3">
                                        <label class="stext-107">
                                            Select {{ $attribute_group->name }}
                                            <select class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30 select-attribute-group" id="sel{{ $attribute_group->name }}" name="sel[]" onchange="changePrice('{{  $print->id }}');">
                                                <option selected value="">
                                                    Select {{ $attribute_group->name }}
                                                </option>
												<?php
												//$attributes = Attribute::where( 'attribute_group_id', '=', $attribute_group->id )->get(); //this is for all attributes of group
												$attributes = ProductsAttribute::leftJoin( 'attributes', function ( $attributes ) {
													$attributes->on( 'attributes.id', '=', 'products_attributes.attribute_id' );
												} )->where( 'attributes.attribute_group_id', '=', $attribute_group->id )->where( 'product_id', '=', $print->id )->get();
												?>
                                                @foreach($attributes as $attribute)
                                                    <option value="{{ $attribute->id }}">{{ $attribute->name }}</option>
                                                @endforeach
                                            </select>
                                        </label>
                                    </div>
                            @endforeach

                            <!-- Upload Design Section -->
                                <!-- <div class="col-md-3">
                                    <label>
                                        Upload Design
                                    </label>
                                    <input type="file" class="form-control" name="product_design">
                                </div> -->

                                <!-- End of Upload Design Section -->


                                <!-- Upload Design 2 -->
                                <div class="col-md-4">
                                    <label class="stext-107">Upload Design&nbsp<span class="badge badge-light">front/back</span></label>
                                    <div class="file-loading">

                                        <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" style="width: 100px; height: 50px;" id="file-1" type="file" name="product_design[]" multiple class="file" data-overwrite-initial="false" data-min-file-count="2">
                                    </div>
                                </div>

                                <!-- End Upload Design 2 -->

                            </div>
                            <!-- Product Attributes -->
                            <br>
                            <input style="width: 200px;" type="submit" name="btnAddToCart" id="btnAddToCart" style=" padding: 7px 18px;" class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer" value="Add to Cart">
                            <br>
                            <br>
                        </form>
                    </div>
                </div>
                <br>
            </div>
            <br>
            <br>
            <!-- Add to Cart Form -->

            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h5 class="stext-107"><b>Review our Product</b></h5>
                    </div>
                    <div class="container">
                        <br>
                        @if ($print->reviews()->where('user_id',auth()->id())->count())
                            <p class="stext-105">You have already Reviewed This Product!</p>
                            <br>
                        @else
                            {!! Form::open(['route' => 'review.store', 'method' => 'post']) !!}

                            {{ csrf_field() }}
                            <br>
                            <div class="form-group">

                                <label class="stext-107" for="">Rate It</label>

                                <select class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" id="" name="rating" required="">
                                    <option selected value="">Select Rating</option>

                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>

                                </select>

                            </div>

                            <div class="form-group">
                                <label class="stext-107" for="">Headline</label>
                                <div class="bor8 m-b-20 how-pos4-parent">
                                <input type="text" class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" name="headline" id="" placeholder="Your headline here" required="">
                            </div>
                            </div>

                            <div class="form-group">
                                <label class="stext-107" for="">Tell Us More</label>
                                <div class="bor8 m-b-20 how-pos4-parent">
                                <textarea type="text" class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" name="description" id="" placeholder="Your description here" required=""></textarea>
                            </div>
                            </div>

                            <input type="hidden" name="product_id" value="{{$print->id}}">

                            <button style="width: 100px;" type="submit" class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">Submit</button>

                            {!! Form::close() !!}
                            <br>

                        @endif

                    </div>
                </div>
                <br>
            </div>

            <!-- Ratings in a Tab -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                      
                        <h5 class="stext-107"><b>Product Details, Reviews & Ratings</b></h5>
                    </div>

                    <div class="container">


                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a style="color:  #b2b2b2;" class="nav-link stext-107 active" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Details</a>
                            </li>
                            <li class="nav-item">
                                <a style="color:  #b2b2b2;" class="nav-link stext-107 " id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Reviews</a>
                            </li>
                            <li class="nav-item">
                                <a style="color:  #b2b2b2;" class="nav-link stext-107" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Ratings</a>
                            </li>
                            <li class="nav-item">
                              <a style="color:  #b2b2b2;" class="nav-link stext-107" id="contact-tab" data-toggle="tab" href="#contact1" role="tab" aria-controls="contact" aria-selected="false">Star Rating</a>
                            </li>
                        </ul>

                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                <br>
                                <p class="stext-107">{{  $print->product_details }}</p>
                                <br>
                            </div>
                            <div class="tab-pane fade " id="home" role="tabpanel" aria-labelledby="home-tab">

                                <ul class="list-group list-group-flush">
                                    @forelse($print->reviews as $review)
										<?php
										$review_user = ProductReview::with( 'user' )->where( 'id', $review->id )->first();
										?>
                                        <li class="list-group-item">
                                            <h6 class="stext-107"><b>{{ $review_user->user->name }}</b></h6>
                                            <p class="stext-105"><i>~ {{ $review->description }}</i></p>
                                        </li>
                                    @empty
                                    <br>
                                    <p class="stext-107">(0) users have reviewed this Product</p>
                                    
                                    @endforelse
                                </ul>
                                
								<?php echo $print->reviews->render(); ?>
                                <br>
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <br>
                                @if ($print->reviews()->count())
                                    <h6 class="stext-107"><b>Average Reviews: {{ number_format($print->reviews()->avg('rating'), 2) }} / 5.00</b></h6>
                                   
                                    <br>
                                    <p class="stext-105">{{ $print->reviews()->count()}} Person(s) Reviewed This Product</p>
                                    <br>
                                @else                                    
                                    <br>
                                    <p class="stext-107">No Ratings for This Product Yet!</p>
                                    <br>
                                @endif
                            </div>

                            <!-- Star Rating -->
                                 <div class="tab-pane fade" id="contact1" role="tabpanel" aria-labelledby="contact-tab">
                                <br>
                                <!-- <p class="stext-107">No Ratings for This Product Yet!</p> -->

                                <star-rating></star-rating>

                            </div>

                            <!-- Star Rating End -->

                        </div>

                    </div>
                </div>
                <br>
            </div>

            <!-- End of Rating in a Tab -->

            <br>
            <br>

        </div>

        <hr class="my-4">

        <!-- Related Items Carousel -->

               <!-- Product -->
    <section class="sec-product bg0 p-t-100 p-b-50">
        <div class="container">
            <div class="p-b-32">
                <h3 class="ltext-105 cl5 txt-center respon1">
                    Related Products
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
                                                <a href="{{route('one.print',$relatedProduct->id)}}" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
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

        <!-- End Related Items -->

        <br>
        <br>

    </div>

    <!-- Exploding Price According to Size Script -->
    <script type="text/javascript">

        $(document).ready(function () {

            jQuery("#btn-popup").click(function () {
                jQuery(".overlay").show();
                jQuery(".popup").hide();
                jQuery("#popup_1").show();
            });
            jQuery(".hide_popup").click(function () {
                jQuery(".overlay").hide();
                jQuery(".popup").hide();
            });

            $(".regular").slick({
                autoplay: true, dots: true, speed: 1000, infinite: true, slidesToShow: 3, slidesToScroll: 3
            });

            /*$("#cmb_product_design").change(function(){
                var val = $(this).val();
                if(val == "1"){
                    $(".has-design").show();
                }else{
                    $(".has-design").hide();
                }
            });*/
        });

        function changePrice(product_id) {
            if (product_id == "") {
                return false;
            }
            var attribute_id_str = "";

            $('.select-attribute-group').each(function (index) {
                var attribute_id = $(this).val();
                if (attribute_id != "" && attribute_id != "undefined") {
                    attribute_id_str += attribute_id + ",";
                }
            });
            attribute_id_str = attribute_id_str.replace(/^,|,$/g, '');
            /*if (attribute_id_str == "") {
                return false;
            }*/
            $("#attributes_ids").val("");
            $("#attributes_ids").val(attribute_id_str);
            $.ajax({
                type: 'get',
                url: '<?php echo route( 'get_product_price' ); ?>',
                data: {product_id: product_id, attribute_ids: attribute_id_str},
                success: function (resp) {
                    $("#hfPrice").val(resp);
                    $("#getPrice").html("Ksh. " + resp);
                },
                error: function (error) {
                    //console.log(JSON.stringify(error));
                }
            });
        }
    </script>


    

@endsection
