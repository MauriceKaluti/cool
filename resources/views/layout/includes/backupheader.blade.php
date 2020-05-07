<?php
use App\ProductGroup;
use App\Product;
?>
<!-- Header Nav Bar Content Here -->
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <style type="text/css">
        .dropdown:hover > .dropdown-menu {
            display: block;
        }

        .dropdown > .dropdown-toggle:active {
            /*Without this, clicking will make it sticky*/
            pointer-events: none;
        }

        .dropdown:hover > .dropdown-menu {
            display: block;
        }

        .products-dropdown a:hover {
            background-color: #BF2429;
        }

        .products-dropdown a:hover {
            color: white;
        }

    </style>
</head>
<body>

<!-- Navbar -->
<nav style="background-color: #1e2d3b !important;" class="navbar fixed-top navbar-expand-lg navbar-light white scrolling-navbar">
    <div class="container">

        <!-- Brand -->
    <!-- <a class="navbar-brand waves-effect" href="{{route('home')}}" target="_blank">
        <strong class="blue-text">COOL PRINTS</strong>
      </a> -->

        <a href="{{route('home')}}">
            <img style="width: 192px; height: 60px; " src="{{url('images/logo.png')}}">
        </a>

        <!-- Collapse -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Links -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <!-- Left -->
            <ul class="navbar-nav mr-auto">

                <li class="nav-item">
                    <div class="dropdown">
                        <button style="background-color: #1E2D3B!important; border: none!important; border-radius: 20px; text-transform: none;" class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <b>Products</b>
                        </button>

                        <div style="height: 500px; overflow: auto; width: 950px;" class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                            <!-- Loop 2 Here -->

                            <!-- End Loop 2 -->

                            <!-- Subdivisions Here! -->
                            <div class="container">

                                <div class="row">


                                   
                                    <?php
                                    $product_groups = ProductGroup::get();
                                    foreach($product_groups as $product_group){
                                    $products = DB::table('group_products')
                                                            ->select('products.*')
                                                            ->leftJoin('products', 'products.id', '=', 'group_products.product_id')
                                                            ->where( 'product_group_id', '=', $product_group->id )
                                                            ->get();
                                    ?>
                                    @if(count( $products ) > 0)
                                        <div class="col-md-3">
                                            <h6>{{ $product_group->name  }}</h6>
                                            <ul class="list-group list-group-flush products-dropdown">
                                                @forelse($products as $product)
                                                    <li class="list-group-item">
                                                        <a style="font-size: 13px;" class="dropdown-item" href="{{ route('one.print',$product->id) }}">
                                                            {{ $product->name }}
                                                        </a>
                                                    </li>
                                                @empty
                                                    <h3>No Prints Available</h3>
                                                @endforelse
                                            </ul>
                                        </div>
                                    @endif
                                    <?php
                                    }
                                    ?>

                                  
                                </div>
                            </div>

                            <a href="{{route('prints')}}">
                                <button style="background-color: #1E2D3B!important; border: none; border-radius: 20px; text-transform: none;" class="btn btn-primary">
                                    <b>See All Products</b></button>
                            </a>
                        </div>

                    </div>
                </li>
                <li class="nav-item active">

                    <b>
                        <strong>
                            <a style="color: white; text-transform: none;" class="nav-link waves-effect" href="{{route('home')}}">Home
                                <span class="sr-only">(current)</span>
                            </a>
                        </strong>
                    </b>
                </li>


                <li class="nav-item">
                    <b><strong><a style="color: white;" class="nav-link waves-effect" href="{{route('prints')}}">All Prints</a></strong></b>
                </li>


                <li class="nav-item">
                    <b><strong><a style="color: white;" class="nav-link waves-effect" href="{{route('designservices')}}">Design Services</a></strong></b>
                </li>

            </ul>

            <!-- Right -->
            <ul class="navbar-nav nav-flex-icons">
                <li class="nav-item">
                    <a href="{{route('cart.index')}}" class="nav-link waves-effect">
                        <span class="badge red z-depth-1 mr-1"> {{Cart::count()}} </span>
                        <i style="color: white;" class="fa fa-shopping-cart"></i>
                        <span style="color: white;" class="clearfix d-none d-sm-inline-block"> Cart </span>
                    </a>
                </li>
                <!--<li class="nav-item">-->
                <!--  <a href="https://www.facebook.com/CarmelTechnologies" class="nav-link waves-effect" target="_blank">-->
                <!--    <i style="color: white;" class="fa fa-facebook"></i>-->
                <!--  </a>-->
                <!--</li>-->
                <!--<li class="nav-item">-->
                <!--  <a href="https://twitter.com/CarmelTechnologies" class="nav-link waves-effect" target="_blank">-->
                <!--    <i style="color: white;" class="fa fa-twitter"></i>-->
                <!--  </a>-->
                <!--</li>-->
                <!-- <li class="nav-item">
                  <a class="button btn btn-outline-info" href="https://github.com/mdbootstrap/bootstrap-material-design" class="nav-link border border-light rounded waves-effect"
                    target="_blank">
                    <i class="fa fa-github mr-2"></i>Sign Out
                  </a>
                </li> -->

                <div class="dropdown">
                    <button style="background-color: #1E2D3B!important; border-radius: 20px;" class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span style="text-transform: uppercase;">A<span style="text-transform: lowercase;">ccount
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                        @if (Auth::guest())
                            <a href="{{url('/login')}}" class="nav-link border border-light rounded waves-effect">
                                Login Now
                            </a>
                            <br>
                            <a href="{{url('/register')}}" class="nav-link border border-light rounded waves-effect">
                                Register
                            </a>
                            <br>
                        @else
                            <a href="{{url('/logout')}}" class="nav-link border border-light rounded waves-effect">
                                Logout
                            </a>
                    @endif
                    <!-- <button class="dropdown-item" type="button">Action</button>
                        <button class="dropdown-item" type="button">Another action</button>
                        <button class="dropdown-item" type="button">Something else here</button> -->
                    </div>
                </div>

            </ul>

            <ul>

                <form action="{{ route('search') }}" method="GET" class="search-form">
                    <br>
                    <input type="text" name="query" class="form-control" id="query" value="{{ request()->input('query') }}" class="search-box" placeholder="Search a Product">

                    <!-- <button style="margin-bottom: 20px; margin-left: 130px;" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button> -->

                    @if ($errors->has('query'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('query') }}</strong>
                        </span>
                    @endif

                    @if (session()->has('query'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('query') }}</strong>
                        </span>
                    @endif

                </form>

            </ul>

        </div>

    </div>
</nav>
<!-- Navbar -->

<!-- End of Header Nav Bar Content Here -->

</body>
</html>