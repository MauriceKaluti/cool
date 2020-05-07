<!-- Cart -->
    <div class="wrap-header-cart js-panel-cart">
        <div class="s-full js-hide-cart"></div>

        <div class="header-cart flex-col-l p-l-65 p-r-25">
            <div class="header-cart-title flex-w flex-sb-m p-b-8">
                <span class="mtext-103 cl2">
                    Your Cart

                </span>
                   <div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
                                <span class="stext-111 cl6 p-t-2">
                                   Total Items: {{Cart::count()}}
                                </span>
                            </div>

                <div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
                    <i class="zmdi zmdi-close"></i>
                </div>
            </div>
             
            <div class="header-cart-content flex-w js-pscroll">
               @foreach($cartItems as $cartItem)
                <ul class="header-cart-wrapitem w-full">
                    <li class="header-cart-item flex-w flex-t m-b-12">
                        

                        <div class="header-cart-item-txt p-t-8">
                            <a href="{{route('one.print',$cartItem->id)}}" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
                                {{ $cartItem->name }}
                            </a>

                            <span class="header-cart-item-info">
                                 ${{ number_format($cartItem->price, 2) }}
                            </span>
                        </div>
                    </li>

                </ul>

                @endforeach

              
                
                <div class="w-full">
                    <div class="header-cart-total w-full p-tb-40">
                      
                       Total: Ksh. {{Cart::total()}}
                    </div>

                    <div class="header-cart-total w-full p-tb-40">
                        
                       
                    </div>



                    <div class="header-cart-buttons flex-w w-full">
                        <a href="{{route('cart.index')}}" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">
                            View Cart
                        </a>

                        <a href="{{route('checkout.shipping')}}" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">
                            Check Out
                        </a>
                    </div>
                </div>
            </div>


        </div>
    </div>