@extends('layout.main')
@section('content')

    <style type="text/css">
        html,
        body,
        header,
        .carousel {
            height: 60vh;
        }

        @media (max-width: 740px) {
            html,
            body,
            header,
            .carousel {
                height: 100vh;
            }
        }

        @media (min-width: 800px) and (max-width: 850px) {
            html,
            body,
            header,
            .carousel {
                height: 100vh;
            }
        }

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

    

        /** Sidebar **/

        .navigation {

        }

        .mainmenu, .submenu {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .mainmenu a {
            display: block;
            background-color: #1E2D3B;
            text-decoration: none;
            padding: 10px;
            color: white;
        }

        .mainmenu a:hover {
            background-color: black;
        }

      

        .mainmenu li:hover .submenu {
            display: block;
            max-height: 200px;
        }

        .submenu a {
            background-color: #1E2D3B;
        }

        .submenu a:hover {
            background-color: #BF2429;
        }

        .submenu {
            overflow: hidden;
            max-height: 0;
            -webkit-transition: all 0.5s ease-out;
        }

       

      
        /** Sidebar **/
    </style>

    <!-- NEW HOMEPAGE CAROUSEL -->



        <!-- Sidebar -->
        <div class="products-sidebar" style="width: 20%; float: left;">
            <br><br><br><br>
           <strong><p align="center">Categories</p></strong> 
            
           

            {!! $sidebar_str !!}

            
        </div>
        <!-- Sidebar -->

        


        <!-- START CAROUSEL 2 -->

        <div style="width: 80%; float: right; margin-bottom: 50px;" id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="{{asset('images/carousel.jpg')}}" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="{{asset('images/carousel1.jpg')}}" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="{{asset('images/carousel1.jpg')}}" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

        <!-- END CAROUSEL 2 -->
    <div clas="container">

 
      <!--  <div class="subheader text-center" style="clear: both">
            <h2> Cool Design&rsquo;s Top Products </h2>
        </div>  --> 
           
       <h6 style="clear: both; font-size: 40px;" class="display-4" align="center"><b>Top Products</b></h6>
       </div>

<hr style="clear: both;" class="my-4">

<div class="container">
 <div class="row">

        @forelse($prints as $print)                
        <div class="col-md-6">
            <div style="margin-bottom: 20px;" class="card">                        
                <div class="card-body">

                    <img class="card-img" src="{{url('images/productimages/medium',$print->image)}}"/>



                        <a style="text-decoration: none; color: black;" href="{{route('one.print',$print->id)}}">
                    <h6>{{$print->name}}</h6>
                </a> 

                <h5><!-- <span style="font-size: 10px;">50 Pcs From</span> --> Ksh {{ $print->price }} <span class="badge badge-light" style="color: black; font-size: 10px;">{{$print->price_badge}}</span></h5>

                <a href="{{route('one.print', $print->id)}}" style="background-color: #1e2d3b; border-radius: 20px; color: white; text-transform: none;" class="btn btn-mini">Learn More</a>

                    </div>            
                       
                </div>

                </div>                       

        @empty

        <h3>No Prints Available</h3>


        @endforelse

        <?php echo $prints->render(); ?>

        </div> 
</div>


  <div clas="container">

 
      <!--  <div class="subheader text-center" style="clear: both">
            <h2> Cool Design&rsquo;s Top Products </h2>
        </div>  --> 
           
       <h6 style="clear: both; font-size: 40px;" class="display-4" align="center"><b>Featured Products</b></h6>
       </div>

<hr style="clear: both;" class="my-4">
        <div class="container">
        <!-- Related Items Carousel -->
        

        <section class="regular slider">
            @foreach ($relatedProducts as $relatedProduct)

                <div class="card">
                    <a href="{{ route('one.print', $relatedProduct->id) }}">
                        <img class="card-img" src="{{ url('images/productimages/medium', $relatedProduct->image) }}"/>
                    </a>

                    <div class="card-body">
                        <p>{{ $relatedProduct->name }}</p>
                        <h5><!-- <span style="font-size: 10px;">50 Pcs From</span> --> Ksh {{ $relatedProduct->price }} <span class="badge badge-light" style="color: black; font-size: 10px;">{{$relatedProduct->price_badge}}</span></h5>
                        
                        
                        
                    </div>
                    <a href="{{route('one.print', $relatedProduct->id)}}">
                            <button style="border-radius: 20px; text-transform: none;" class="btn btn-primary">View
                            
                        </button></a>
                              
                 
                </div>
            @endforeach
        </section>

    </div>



        <!-- End Related Items -->

        <br>
        <script type="text/javascript">
            $(document).ready(function () {
                $(".regular").slick({
                    autoplay: true, dots: true, speed: 1000, infinite: true, slidesToShow: 3, slidesToScroll: 3
                });
            });
        </script>


@endsection