<!doctype html>
<html class="no-js" lang="en" dir="ltr">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="x-ua-compatible" content="ie=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>
        @yield('title','Cool Prints - Kenya Fastest Online Printing Shop')
    </title>



    <!-- Input Form -->


    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/bootstrap.min.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/fileinput.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/font-awesome.min.css')}}">


    <!-- End of Input Form -->


    <!-- Start Ecom Styles -->


    <!--===============================================================================================-->  
  
    <link rel="icon" type="image/png" href="{{asset('ecom/images/icons/favicon.png')}}">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('ecom/vendor/bootstrap/css/bootstrap.min.css')}}">
<!--===============================================================================================-->
   
    <link rel="stylesheet" type="text/css" href="{{asset('ecom/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
<!--===============================================================================================-->
  
    <link rel="stylesheet" type="text/css" href="{{asset('ecom/fonts/iconic/css/material-design-iconic-font.min.css')}}">
<!--===============================================================================================-->
   
    <link rel="stylesheet" type="text/css" href="{{asset('ecom/fonts/linearicons-v1.0.0/icon-font.min.css')}}">
<!--===============================================================================================-->
   
    <link rel="stylesheet" type="text/css" href="{{asset('ecom/vendor/animate/animate.css')}}">
<!--===============================================================================================-->  
    
    <link rel="stylesheet" type="text/css" href="{{asset('ecom/vendor/css-hamburgers/hamburgers.min.css')}}">
<!--===============================================================================================-->
   
    <link rel="stylesheet" type="text/css" href="{{asset('ecom/vendor/animsition/css/animsition.min.css')}}">
<!--===============================================================================================-->
    
    <link rel="stylesheet" type="text/css" href="{{asset('ecom/vendor/select2/select2.min.css')}}">
<!--===============================================================================================-->  
    
    <link rel="stylesheet" type="text/css" href="{{asset('ecom/vendor/daterangepicker/daterangepicker.css')}}">
<!--===============================================================================================-->
   
    <link rel="stylesheet" type="text/css" href="{{asset('ecom/vendor/slick/slick.css')}}">
<!--===============================================================================================-->
  
    <link rel="stylesheet" type="text/css" href="{{asset('ecom/vendor/MagnificPopup/magnific-popup.css')}}">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('ecom/vendor/perfect-scrollbar/perfect-scrollbar.css')}}">
    
<!--===============================================================================================-->
    
    <link rel="stylesheet" type="text/css" href="{{asset('ecom/css/util.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('ecom/css/main.css')}}">
    
<!--===============================================================================================-->


    <!-- End Ecom Styles -->

</head>
<body>

<!-- Header Nav Bar Content Here -->


@include('layout.includes.header')


<!-- End of Header Nav Bar Content Here -->


@yield('content')

<!-- START NEW FOOTER -->

@include('layout.includes.footer')

<!-- END NEW FOOTER -->


<script src="{{asset('ecom/vendor/jquery/jquery-3.2.1.min.js') }}" type="text/javascript">  
</script>

<!-- Including Stripe Js File At The Bottom To Allow Old Browsers To Connect Successfully -->
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script type="text/javascript">
    Stripe.setPublishableKey('pk_test_IY04ravgTR5or36CljvMVUOq');
</script>

<!-- End of Stripe Ref Scripts -->


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


<!-- Ecom Site Js Scripts -->

<!--===============================================================================================-->  
    
     
<!--===============================================================================================-->
    
     <script src="{{asset('ecom/vendor/animsition/js/animsition.min.js') }}" type="text/javascript">  
    </script>
<!--===============================================================================================-->
    
     <script src="{{asset('ecom/vendor/bootstrap/js/popper.js') }}" type="text/javascript">  
    </script>
  
     <script src="{{asset('ecom/vendor/bootstrap/js/bootstrap.min.js') }}" type="text/javascript">  
    </script>
<!--===============================================================================================-->
    
     <script src="{{asset('ecom/vendor/select2/select2.min.js') }}" type="text/javascript">  
    </script>
    <script>
        $(".js-select2").each(function(){
            $(this).select2({
                minimumResultsForSearch: 20,
                dropdownParent: $(this).next('.dropDownSelect2')
            });
        })
    </script>
<!--===============================================================================================-->

    <script src="{{asset('ecom/vendor/daterangepicker/moment.min.js') }}" type="text/javascript">  
    </script>
     <script src="{{asset('ecom/vendor/daterangepicker/daterangepicker.js') }}" type="text/javascript">  
    </script>
<!--===============================================================================================-->
    
   <script src="{{asset('ecom/vendor/slick/slick.min.js') }}" type="text/javascript">  
    </script>
    <script src="{{asset('ecom/js/slick-custom.js') }}" type="text/javascript">  
    </script>
<!--===============================================================================================-->
    
    <script src="{{asset('ecom/vendor/parallax100/parallax100.js') }}" type="text/javascript">  
    </script>
    <script>
        $('.parallax100').parallax100();
    </script>
<!--===============================================================================================-->
<script src="{{asset('ecom/vendor/MagnificPopup/jquery.magnific-popup.min.js') }}" type="text/javascript">  
    </script>
    
    <script>
        $('.gallery-lb').each(function() { // the containers for all your galleries
            $(this).magnificPopup({
                delegate: 'a', // the selector for gallery item
                type: 'image',
                gallery: {
                    enabled:true
                },
                mainClass: 'mfp-fade'
            });
        });
    </script>
<!--===============================================================================================-->
<script src="{{asset('ecom/vendor/isotope/isotope.pkgd.min.js') }}" type="text/javascript">  
    </script>
    
<!--===============================================================================================-->
<script src="{{asset('ecom/vendor/sweetalert/sweetalert.min.js') }}" type="text/javascript">  
    </script>
  
    <script>
        $('.js-addwish-b2').on('click', function(e){
            e.preventDefault();
        });

        $('.js-addwish-b2').each(function(){
            var nameProduct = $(this).parent().parent().find('.js-name-b2').html();
            $(this).on('click', function(){
                swal(nameProduct, "is added to wishlist !", "success");

                $(this).addClass('js-addedwish-b2');
                $(this).off('click');
            });
        });

        $('.js-addwish-detail').each(function(){
            var nameProduct = $(this).parent().parent().parent().find('.js-name-detail').html();

            $(this).on('click', function(){
                swal(nameProduct, "is added to wishlist !", "success");

                $(this).addClass('js-addedwish-detail');
                $(this).off('click');
            });
        });

        /*---------------------------------------------*/

        $('.js-addcart-detail').each(function(){
            var nameProduct = $(this).parent().parent().parent().parent().find('.js-name-detail').html();
            $(this).on('click', function(){
                swal(nameProduct, "is added to cart !", "success");
            });
        });
    
    </script>
<!--===============================================================================================-->
   
      <script src="{{asset('ecom/vendor/perfect-scrollbar/perfect-scrollbar.min.js') }}" type="text/javascript">  
    </script>
    <script>
        $('.js-pscroll').each(function(){
            $(this).css('position','relative');
            $(this).css('overflow','hidden');
            var ps = new PerfectScrollbar(this, {
                wheelSpeed: 1,
                scrollingThreshold: 1000,
                wheelPropagation: false,
            });

            $(window).on('resize', function(){
                ps.update();
            })
        });
    </script>
<!--===============================================================================================-->
    
    <script src="{{asset('ecom/js/main.js') }}" type="text/javascript">  
    </script>

<!-- End Site Js Scripts -->

</body>
</html>
