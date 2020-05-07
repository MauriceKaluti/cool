<!doctype html>
<html class="no-js" lang="en" dir="ltr">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="x-ua-compatible" content="ie=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>
        @yield('title','Cool Prints')
    </title>


<!-- <link rel="stylesheet" href="{{asset('css/admin.css')}}"> -->

<!-- <link rel="stylesheet" href="{{asset('css/admin.css')}}"> -->

<!-- <link rel="stylesheet" href="{{asset('dist/css/style.css')}}"> -->

    <link rel="stylesheet" type="text/css" href="{{asset('css/slick.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('css/slick-theme.css')}}">

    <!-- Site CSS public/styles -->

    <link rel="stylesheet" href="{{asset('styles/css/mdb.min.css')}}">

    <link rel="stylesheet" href="{{asset('styles/css/style.min.css')}}">

    <!-- Font Awesome -->
  
    
    <link href="{{asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css')}}" media="all" rel="stylesheet" type="text/css"/>

    <script type="text/javascript" href="{{asset('https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js')}}"></script>

    <script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>

    <script type="text/javascript" src="{{asset('js/bootstrap.js')}}"></script>

    {{--<script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>--}}

    {{--<script type="text/javascript" src="{{asset('js/jquery.js')}}"></script>--}}

    <script src="{{asset('dist/css/app.js')}}"></script>

    <script src="{{asset('js/slick.js') }}" type="text/javascript" charset="utf-8"></script>

    <link rel="stylesheet" media="screen" href="{{asset('styles/css/bootstrap.min.css')}}">

    <link rel="stylesheet" media="screen" href="{{asset('styles/css/bootstrap.css')}}">

<!--<link rel="stylesheet" media="screen" href="{{asset('dist/css/foundation.css')}}"> -->

<!--<link rel="stylesheet" href="{{asset('dist/css/foundation.css')}}"> -->

    <link rel="stylesheet" href="{{asset('dist/css/app.css')}}">

<!-- <link rel="stylesheet" href="{{asset('dist/css/foundation.css')}}"> -->


    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/> -->

    <!-- <link href="http://cdnjs.cloudflare.com/ajax/libs/foundicons/3.0.0/foundation-icons.css" rel="stylesheet"> -->


    <!-- Input Form -->


    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/bootstrap.min.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/fileinput.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/font-awesome.min.css')}}">


    <!-- End of Input Form -->


</head>
<body>

<!-- Header Nav Bar Content Here -->


@include('layout.includes.header')


<!-- End of Header Nav Bar Content Here -->


@yield('content')

@include('layout.includes.footer')

<!-- OLD FOOTER -->

<!-- <footer class="footer">
  <div class="row full-width">
    <div class="small-12 medium-4 large-4 columns">
      <i class="fi-laptop"></i>
      <p>Coded with love by Kazi Safi</p>
    </div>
    <div class="small-12 medium-4 large-4 columns">
      <i class="fi-html5"></i>
      <p></p>
    </div>
    
    <div class="small-6 medium-4 large-4 columns">
      <h4>Follow Us</h4>
      <ul class="footer-links">
        <li><a href="https://github.com/KaziSafi">GitHub</a></li>
        <li><a href="#">Facebook</a></li>
        <li><a href="https://twitter.com/Kazi_Safi_Solns">Twitter</a></li>
      <ul>
    </div>
  </div>
</footer> -->

<!-- END OF OLD FOOTER -->

<!-- START NEW FOOTER -->


<!-- END NEW FOOTER -->

{{--<script src="dist/js/vendor/jquery.js"></script>--}}

<!-- Including Stripe Js File At The Bottom To Allow Old Browsers To Connect Successfully -->
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script type="text/javascript">
    Stripe.setPublishableKey('pk_test_IY04ravgTR5or36CljvMVUOq');
</script>


<!-- Start Input Scripts -->
<!--  jQuery and Popper.js  -->
     <!-- <script src="{{asset('assets/js/jquery.min.js') }}" type="text/javascript" crossorigin="anonymous">  
    </script> -->


    <script src="{{asset('assets/js/popper.min.js') }}" type="text/javascript">  
    </script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/themes/fa/theme.js" type="text/javascript"></script>


<!-- Boostrap 4 -->
  <!--   <script src="{{asset('assets/js/bootstrap.min.js') }}" type="text/javascript">  
    </script> -->

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

<!-- End of Input Scripts -->


</body>
</html>
