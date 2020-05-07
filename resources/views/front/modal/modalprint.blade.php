    

<?php
use App\ProductReview;
use App\ProductsAttribute;
?>



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
</style>


    <!-- Modal1 -->
    <div class="wrap-modal1 js-modal1 p-t-60 p-b-20">
        <div class="overlay-modal1 js-hide-modal1"></div>

        <div class="container">
            <div class="bg0 p-t-60 p-b-30 p-lr-15-lg how-pos3-parent">
                <button class="how-pos3 hov3 trans-04 js-hide-modal1">
                    <img src="{{ url('ecom/images/icons/icon-close.png') }}" alt="CLOSE">

                </button>

                <div class="row">
                    <div class="col-md-6 col-lg-7 p-b-30">
                        <div class="p-l-25 p-r-30 p-lr-0-lg">
                            <div class="wrap-slick3 flex-sb flex-w">
                                <div class="wrap-slick3-dots"></div>
                                <div class="wrap-slick3-arrows flex-sb-m flex-w"></div>

                                <div class="slick3 gallery-lb">
                                    <div class="item-slick3" data-thumb="{{url('images/productimages/medium',$print->image)}}">
                                        <div class="wrap-pic-w pos-relative">
                                            <img src="{{url('images/productimages/medium',$print->image)}}" alt="IMG-PRODUCT">

                                            <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="{{url('images/productimages/medium',$print->image)}}">
                                                <i class="fa fa-expand"></i>
                                            </a>
                                        </div>
                                    </div>

                                  
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-12">
                        <div class="p-r-50 p-t-5 p-lr-0-lg">
                            <h4 class="mtext-105 cl2 js-name-detail p-b-14">
                                
                            </h4>

                            <span class="mtext-106 cl2">
                                {{$print->name}}
                            </span>

                            <p class="stext-102 cl3 p-t-23">
                                {{$print->description}}
                            </p>
                            
                            <!--  -->
                            <div class="p-t-33">
                                <form action="{{ route('cart.addItem',$print->id) }}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <input type="hidden" name="attributes_ids" id="attributes_ids" value="">
                            <input type="hidden" name="user_id" id="user_id" value="{{ Auth::id() }}">
                            <br>

                            <h5>{{  $print->name }}</h5>
                            <h3 class="subheader">
                                <span id="getPrice" class="price-tag">${{ $print->price }}</span>
                                <input type="hidden" name="hfPrice" id="hfPrice" value="{{ number_format($print->price, 2, '.', '') }}">
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
                                    <label>Upload Design&nbsp<span class="badge badge-light">front/back</span></label>
                                    <div class="file-loading">

                                        <input style="width: 100px; height: 50px;" id="file-1" type="file" name="product_design[]" multiple class="file" data-overwrite-initial="false" data-min-file-count="2">
                                    </div>
                                </div>

                                <!-- End Upload Design 2 -->

                            </div>
                            <!-- Product Attributes -->

                            <input style="background-color: #1e2d3b!important; border: none; border-radius: 60px;" type="submit" name="btnAddToCart" id="btnAddToCart" style=" padding: 7px 18px;" class="m-t-10 waves-effect waves-dark btn btn-primary btn-md btn-rounded" value="Add to Cart">
                            <br>
                            <br>
                        </form> 
                            </div>

                            <!--  -->
                            
                        </div>
                    </div>
                </div>
            </div>
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
                    $("#getPrice").html("$" + resp);
                },
                error: function (error) {
                    //console.log(JSON.stringify(error));
                }
            });
        }
    </script>

        <!-- File Input Script Ref -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/themes/fa/theme.js" type="text/javascript"></script>


    <script src="{{asset('assets/js/fileinput.js') }}" type="text/javascript">  
    </script>


    <script type="text/javascript">

        $("#file-1").fileinput({

            theme: 'fa',

            uploadUrl: "/image-view",

            uploadExtraData: function() {

                return {

                    _token: $("input[name='_token']").val(),

                };

            },

            allowedFileExtensions: ['jpg', 'png', 'gif', 'pdf'],

            overwriteInitial: false,

            maxFileSize:20000,
            maxFileCount: 2,
            //maxFilesNum: 2,

            slugCallback: function (filename) {

                return filename.replace('(', '_').replace(']', '_');

            }

        });

    </script>

<!-- End of File Input Scripts -->