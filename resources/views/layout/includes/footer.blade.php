 <?php 

use App\Category;
use App\ProductGroup;
use App\Product;
  ?>

  <!-- Footer -->
  <footer class="bg3 p-t-75 p-b-32">
    <div class="container">
      <div class="row">
        <div class="col-sm-6 col-lg-3 p-b-50">
          <h4 class="stext-301 cl0 p-b-30">
            Categories
          </h4>

          <ul>
            <li class="p-b-10">
              <a href="{{route('home')}}" class="stext-107 cl7 hov-cl1 trans-04">
                Home
              </a>
            </li>

            <li class="p-b-10">
              <a href="{{route('prints')}}" class="stext-107 cl7 hov-cl1 trans-04">
                All Products
              </a>
            </li>

            <?php 


// get first three records skip none
// $categories = Category::skip(0)->take(3)->get();


// display randomly
$categories = Category::orderBy(DB::raw('RAND()'))->take(2)->get();

?>

@foreach($categories as $category)
<li class="p-b-10">
<a class="stext-107 cl7 hov-cl1 trans-04" href="{{route('prints', $category->id )}}">{{$category->name}}</a>
</li>

@endforeach

            
          </ul>
        </div>


<?php
$product_groups = ProductGroup::orderBy(DB::raw('RAND()'))->take(1)->get();
foreach($product_groups as $product_group){
$products = DB::table('group_products')
                ->select('products.*')
                ->leftJoin('products', 'products.id', '=', 'group_products.product_id')
                ->where( 'product_group_id', '=', $product_group->id )
                ->orderBy(DB::raw('RAND()'))->take(4)->get();
?>
@if(count( $products ) > 0)
        <div class="col-sm-6 col-lg-3 p-b-50">
          <h4 class="stext-301 cl0 p-b-30">
            {{ $product_group->name  }}
          </h4>

          <ul>
            @forelse($products as $product)
            <li class="p-b-10">
              <a href="{{route('designservices')}}" class="stext-107 cl7 hov-cl1 trans-04">
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
        <div class="col-sm-6 col-lg-3 p-b-50">
          <h4 class="stext-301 cl0 p-b-30">
            GET IN TOUCH
          </h4>

          <p class="stext-107 cl7 size-201">
            Get in touch with us during our working hours
          </p>

          <div class="p-t-27">
            <a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
              <i class="fa fa-facebook"></i>
            </a>

            <a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
              <i class="fa fa-instagram"></i>
            </a>

            <a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
              <i class="fa fa-pinterest-p"></i>
            </a>
          </div>
        </div>

        <div class="col-sm-6 col-lg-3 p-b-50">
          <h4 class="stext-301 cl0 p-b-30">
            Help & Newsletter
          </h4>

          <ul>
                  <li class="p-b-10">
              <a href="{{route('designservices')}}" class="stext-107 cl7 hov-cl1 trans-04">
                Design Services
              </a>
            </li>

           
            <li class="p-b-10">
              <a href="#" class="stext-107 cl7 hov-cl1 trans-04">
                FAQs
              </a>
            </li>
          </ul>

           {!! Form::open(['route'=>'subscribe.store','method'=>'POST','files'=>true])!!}
            <div class="wrap-input1 w-full p-b-4">
          <!--     <input class="input1 bg-none plh1 stext-107 cl7" type="text" name="email" placeholder="email@example.com"> -->

              <input type="email" name="email" class="input1 bg-none plh1 stext-107 cl7" required="required" placeholder="enter@youremailhere.com">
                                
              <div class="focus-input1 trans-04"></div>
            </div>

            <div class="p-t-18">
            <!--   <button class="flex-c-m stext-101 cl0 size-103 bg1 bor1 hov-btn2 p-lr-15 trans-04">
                Subscribe
              </button> -->
              {{ Form::submit('subscribe',array('class' => 'flex-c-m stext-101 cl0 size-103 bg1 bor1 hov-btn2 p-lr-15 trans-04')) }}
            </div>
          {!!Form::close()!!}
        </div>
      </div>

      <div class="p-t-40">
        <div class="flex-c-m flex-w p-b-18">
          <a href="#" class="m-all-1">
            <img src="{{ url('ecom/images/icons/icon-pay-01.png') }}" alt="ICON-PAY">

          </a>

          <a href="#" class="m-all-1">
            <img src="{{ url('ecom/images/icons/icon-pay-02.png') }}" alt="ICON-PAY">
          </a>

          <a href="#" class="m-all-1">
            <img src="{{ url('ecom/images/icons/icon-pay-03.png') }}" alt="ICON-PAY">
          </a>

          <a href="#" class="m-all-1">
            <img src="{{ url('ecom/images/icons/icon-pay-04.png') }}" alt="ICON-PAY">
          </a>

          <a href="#" class="m-all-1">
            <img src="{{ url('ecom/images/icons/icon-pay-05.png') }}" alt="ICON-PAY">
          </a>
        </div>

        <p class="stext-107 cl6 txt-center">
         
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Developed with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a style="color: #bf2429;" href="https://carmeltechnologies.co.ke" target="_blank">CT</a>


        </p>
      </div>
    </div>
  </footer>