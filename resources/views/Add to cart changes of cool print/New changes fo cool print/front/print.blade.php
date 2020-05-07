<?php
use App\ProductsAttribute;
?>

@extends('layout.main')

@section('title', 'Print')

@section('content')

    <style type="text/css">

        .slider {
            width: 100%;
            margin: 100px auto;
        }

        .slick-slide {
            margin: 0px 20px;
        }

        .slick-slide img {
            width: 100%;
        }

        .slick-prev:before,
        .slick-next:before {
            color: black;
        }

        .slick-slide {
            transition: all ease-in-out .3s;
            /*opacity: .2;*/
            opacity: 1;
        }

        .slick-active {
            /*opacity: .5;*/
            opacity: 1;
        }

        .slick-current {
            opacity: 1;
        }
    </style>

    <br>
    <br>
    <br>
    <br>

    <!-- products listing -->

    <div class="container">
        <div class="row">

            <div class="col-md-6">
                <div class="card">

                    <div class="img-wrapper">

                        <img src="{{url('images',$print->image)}}"/>

                    </div>
                </div>
                <br>
            </div>

            <div class="col-md-6">
                <div class="card">

                    <div class="container">

                        @if ($print->reviews()->where('user_id',auth()->id())->count())
                            You have already Reviewed This Product!
                        @else
                            <br>
                            <h3>Leave A Review</h3>


                            <form action="{{route('review.store')}}" method="post" role="form">
                                {{csrf_field()}}

                                <div class="form-group">

                                    <label for="">Rate It</label>

                                    <select class="custom-select custom-select-lg mb-3" id="" name="rating">
                                        <option selected value="">Select Rating</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>

                                </div>


                                <div class="form-group">
                                    <label for="">Headline</label>
                                    <input type="text" class="form-control" name="headline" id="" placeholder="Your headline here">
                                </div>

                                <div class="form-group">
                                    <label for="">Tell Us More</label>
                                    <textarea type="text" class="form-control" name="description" id="" placeholder="Your description here"></textarea>
                                </div>

                                <input type="hidden" name="product_id" value="{{$print->id}}">

                                <button style="border-radius: 25px;" type="submit" class="m-t-10 waves-effect waves-dark btn btn-primary btn-md btn-rounded">Submit</button>
                            </form><br>

                        @endif

                    </div>
                </div>
                <br>
            </div>

            <!-- Add to Cart Form -->
            <div class="col-md-12">
                <div class="card">
                    <div class="container">
                        <form action="{{ route('cart.addItem',$print->id) }}" method="POST">
                            {{ csrf_field() }}
                            <br>

                            <h5>{{  $print->name }}</h5>
                            <h3 class="subheader">
                                <span id="getPrice" class="price-tag">${{$print->price}}</span>
                                <input type="hidden" name="hfPrice" id="hfPrice" value="${{$print->price}}">
                            </h3>
                            <p>
                                {!! $print->description !!}
                            </p>

                            <!-- Product Attributes -->
                            <div class="row">

                                @foreach($attribute_groups as $attribute_group)
                                    <div class="col-md-3">
                                        <label>
                                            Select {{ $attribute_group->name }}
                                            <select class="custom-select custom-select-lg mb-3 select-attribute-group" id="sel{{ $attribute_group->name }}" name="sel[]" onchange="changePrice('{{  $print->id }}');">
                                                <option selected value="">
                                                    Select {{ $attribute_group->name }}
                                                </option>
												<?php
												//$attributes = Attribute::where( 'attribute_group_id', '=', $attribute_group->id )->get(); //this is for all attributes of group
												$attributes = ProductsAttribute::leftJoin( 'attributes', function ( $attributes ) {
													$attributes->on( 'attributes.id', '=', 'products_attributes.attribute_id' );
												} )->where( 'attributes.attribute_group_id', '=', $attribute_group->id )->get();
												?>
                                                @foreach($attributes as $attribute)
                                                    <option value="{{ $attribute->id }}">{{ $attribute->name }}</option>
                                                @endforeach
                                            </select>
                                        </label>
                                    </div>
                                @endforeach

                            </div>
                            <!-- Product Attributes -->

							<?php /*<a href="{{ route('cart.addItem',$print->id) }}" style="border-radius: 60px; padding: 7px 18px;" class="m-t-10 waves-effect waves-dark btn btn-primary btn-md btn-rounded">Add to Cart</a><br><br>*/ ?>
                            <input type="submit" name="btnAddToCart" id="btnAddToCart" style="border-radius: 60px; padding: 7px 18px;" class="m-t-10 waves-effect waves-dark btn btn-primary btn-md btn-rounded" value="Add to Cart">
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

                    <div class="container">

                        @if ($print->reviews()->where('user_id',auth()->id())->count())
                            You have already Reviewed This Product!
                        @else
                            <br>
                            <h3>Leave A Review</h3>


                            <form action="{{route('review.store')}}" method="post" role="form">
                                {{csrf_field()}}

                                <div class="form-group">

                                    <label for="">Rate It</label>

                                    <select class="custom-select custom-select-lg mb-3" id="" name="rating">
                                        <option selected value="">Select Rating</option>

                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>


                                    </select>

                                </div>

                                <div class="form-group">
                                    <label for="">Headline</label>
                                    <input type="text" class="form-control" name="headline" id="" placeholder="Your headline here">
                                </div>

                                <div class="form-group">
                                    <label for="">Tell Us More</label>
                                    <textarea type="text" class="form-control" name="description" id="" placeholder="Your description here"></textarea>
                                </div>

                                <input type="hidden" name="product_id" value="{{$print->id}}">

                                <button style="border-radius: 25px;" type="submit" class="m-t-10 waves-effect waves-dark btn btn-primary btn-md btn-rounded">Submit</button>
                            </form>
                            <br>

                        @endif

                    </div>
                </div>
                <br>
            </div>

            <div class="col-md-6">
                <div class="card">

                    <div class="container">

                        @if ($print->reviews()->count())
                            Average Reviews: <b>{{ number_format($print->reviews()->avg('rating'), 2) }} / 5.00</b>
                            <br>
                            {{ $print->reviews()->count()}} Person(s) Reviewed This Product
                        @else
                            No Ratings for This Product Yet!
                        @endif

                        <ul>
                            @forelse($print->reviews as $review)
                                <li>
                                    Headline: {{$review->headline}}
                                </li>
                            @empty
                            @endforelse
                        </ul>

                    </div>
                </div>
                <br>
            </div>

            <br>
            <br>

        </div>


        <h2 align="center">Related Products</h2>

        <!-- Related Items Carousel -->

        <section class="regular slider">
            @foreach ($relatedProducts as $relatedProduct)
                <div>
                    <a href="{{ route('one.print', $relatedProduct->id) }}">
                        <img src="{{ url('images', $relatedProduct->image) }}"/>
                    </a>

                    <span id="getPrice" class="price-tag">${{ $relatedProduct->price }}</span>

                    <p>{{ $relatedProduct->name }}</p>

                    <a href="{{route('one.print', $relatedProduct->id)}}" style="width: 150px; align-self: center;">View</a>
                </div>
            @endforeach
        </section>

        <!-- End Related Items -->

        <br>
        <br>

    </div>

    <!-- Exploding Price According to Size Script -->
    <script type="text/javascript">

        $(document).ready(function () {
            $(".regular").slick({
                autoplay: true, dots: true, speed: 1000, infinite: true, slidesToShow: 3, slidesToScroll: 3
            });
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
            $.ajax({
                type: 'get',
                url: '<?php echo route( 'get_product_price' ); ?>',
                data: {product_id: product_id, attribute_ids: attribute_id_str},
                success: function (resp) {
                    $("#hfPrice").val(resp);
                    $("#getPrice").html("$" + resp);
                },
                error: function (error) {
                    //console.log(JSON.stringify(error));
                }
            });
        }
    </script>

@endsection
