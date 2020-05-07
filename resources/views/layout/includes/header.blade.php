<?php
use App\ProductGroup;
use App\Product;
use App\wishList;
use App\User;
use App\Category;
?>

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
           
        }

        .products-dropdown a:hover {
          
        }
</style>
<!-- Header -->
    <header>
        <!-- Header desktop -->
        <div class="container-menu-desktop">
            <!-- Topbar -->
            <div style="background-color: white!important;" class="top-bar">
                <div class="content-topbar flex-sb-m h-full container">
                    <div class="left-top-bar">
                        Free shipping for standard order over $100
                    </div>

                    <div class="right-top-bar flex-w h-full">

                        <a href="" class="flex-c-m trans-04 p-lr-25">
                            Help & FAQs
                        </a>

                         @if (Auth::guest())
                         <a href="" class="flex-c-m p-lr-10 trans-04">
                            
                        </a>
                         @else
                            <a href="" class="flex-c-m p-lr-10 trans-04">
                            {{Auth::user()->name}}
                        </a>
                        @endif
                          @if (Auth::guest())
                            <a href="{{url('/login')}}" class="flex-c-m p-lr-10 trans-04">
                                Login Now
                            </a>
                            <br>
                            <a href="{{url('/register')}}" class="flex-c-m p-lr-10 trans-04">
                                Register
                            </a>
                            <br>
                        @else
                            <a href="{{url('/logout')}}" class="flex-c-m p-lr-10 trans-04">
                                Logout
                            </a>
                    @endif

                       
                    </div>
                </div>
            </div>

            <div class="wrap-menu-desktop">
                <nav class="limiter-menu-desktop container">
                    
                    <!-- Logo desktop -->       
                    <a href="{{route('home')}}" class="logo">
                        <img src="{{url('images/logo.png')}}" alt="IMG-LOGO">
                    </a>

                    <!-- Menu desktop -->
                    <div class="menu-desktop">
                        <ul class="main-menu">
                            

<li class="label1" data-label1="Deals">
<div class="dropdown">


<a class="stext-105" style="color: #818385;" href="" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >Products</a>

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
<h6 class="stext-107"><b>{{ $product_group->name  }}</b></h6>
<br>
<ul class="list-group list-group-flush products-dropdown">
    @forelse($products as $product)
        <li>
            <a class="header-cart-item-name m-b-18 hov-cl1 trans-04" style="font-size: 13px;" class="dropdown-item" href="{{ route('one.print',$product->id) }}">
                {{ $product->name }}
            </a>
        </li>
    @empty
        <h3 class="stext-107">No Prints Available</h3>
    @endforelse
</ul>
</div>
@endif
<?php
}
?>


</div>
</div>

<div style="text-align:center;">
<a style="width: 200px; margin-left: 400px;" class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer" href="{{route('prints')}}">
See All Products
</a>
</div>    

</div>
</li>
                            <li>
                                <a class="stext-105" href="{{route('home')}}">Home</a>
                                
                            </li>
                            <li>
                                <a class="stext-105" href="{{route('prints')}}">Featured</a>
                            </li>

                            <li>
                                <a class="stext-105" href="#">Services</a>
                                <ul class="sub-menu">
                                    <li><a class="stext-105" href="{{route('designservices')}}">Design Services</a></li>
                                  
                                </ul>
                            </li>

<?php 


// get first three records skip none
// $categories = Category::skip(0)->take(3)->get();


// display randomly
$categories = Category::orderBy(DB::raw('RAND()'))->take(2)->get();

?>

@foreach($categories as $category)
<li>
<a class="stext-105" href="{{route('prints', $category->id )}}">{{$category->name}}</a>
</li>

@endforeach

                            <li>
                                <a class="stext-105" href="{{route('reach-out')}}">Contact</a>
                            </li>
                        </ul>
                    </div>  

                    <!-- Icon header -->
                    <div class="wrap-icon-header flex-w flex-r-m">
                        <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-modal-search">
                            <i class="zmdi zmdi-search"></i>
                        </div>

                        <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart" data-notify="{{Cart::count()}}">
                            <i class="zmdi zmdi-shopping-cart"></i>
                           
                        </div>

                        <a href="{{route('WishList')}}" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti" data-notify="{{ App\wishList::where('user_id',auth()->id())->count() }}">
                            <i class="zmdi zmdi-favorite-outline"></i>
                           
                

                        </a>
                    </div>
                </nav>
            </div>  
        </div>

        <!-- Header Mobile -->
        <div class="wrap-header-mobile">
            <!-- Logo moblie -->        
            <div class="logo-mobile">
                <a href="{{route('home')}}"><img src="{{url('images/logo.png')}}" alt="IMG-LOGO"></a>
            </div>

            <!-- Icon header -->
            <div class="wrap-icon-header flex-w flex-r-m m-r-15">
                <div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 js-show-modal-search">
                    <i class="zmdi zmdi-search"></i>
                </div>

                <div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti js-show-cart" data-notify="{{Cart::count()}}">
                    <i class="zmdi zmdi-shopping-cart"></i>
                </div>

                <a href="#" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti" data-notify="{{ App\wishList::where('user_id',auth()->id())->count() }}">
                    <i class="zmdi zmdi-favorite-outline"></i>
                </a>
            </div>

            <!-- Button show menu -->
            <div class="btn-show-menu-mobile hamburger hamburger--squeeze">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </div>
        </div>


        <!-- Menu Mobile -->
        <div class="menu-mobile">
            <ul class="topbar-mobile">
                <li>
                    <div class="left-top-bar">
                        Free shipping for standard order over $100
                    </div>
                </li>

                <li>
                    <div class="right-top-bar flex-w h-full">
                        <a href="#" class="flex-c-m p-lr-10 trans-04">
                            Help & FAQs
                        </a>

                        <a href="#" class="flex-c-m p-lr-10 trans-04">
                            My Account
                        </a>

                

                        @if (Auth::guest())
                            <a href="{{url('/login')}}" class="flex-c-m p-lr-10 trans-04">
                                Login Now
                            </a>
                            <br>
                            <a href="{{url('/register')}}" class="flex-c-m p-lr-10 trans-04">
                                Register
                            </a>
                            <br>
                        @else
                            <a href="{{url('/logout')}}" class="flex-c-m p-lr-10 trans-04">
                                Logout
                            </a>
                    @endif
                  

                        
                    </div>
                </li>
            </ul>

            <ul style="background-color: black;" class="main-menu-m">
                <li>
                    <a href="{{route('home')}}">Home</a>
                    
                    
                </li>


                <li>
                    <a href="{{route('prints')}}">Featured</a>
                </li>

               

                <li>
                    <a href="{{route('designservices')}}">Design Services</a>
                </li>

             

                <li>
                    <a href="{{route('reach-out')}}">Contact</a>
                </li>
            </ul>
        </div>

        <!-- Modal Search -->
        <div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
            <div class="container-search-header">
                <button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
                    <img src="{{url('ecom/images/icons/icon-close2.png')}}" alt="CLOSE">
                </button>



                <form action="{{ route('search') }}" method="GET" class="wrap-search-header flex-w p-l-15 search-form">
                    <button class="flex-c-m trans-04">
                        <i class="zmdi zmdi-search"></i>
                    </button>
                    <input name="query" class="form-control plh3" id="query" value="{{ request()->input('query') }}" class="search-box" type="text" name="search" placeholder="Search...">

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
            </div>
        </div>
    </header>