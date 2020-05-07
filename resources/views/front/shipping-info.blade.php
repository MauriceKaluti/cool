@extends('layout.main')

@section('title', 'Prints')

@section('content')


<body class="animsition">
    
   


<br><br><br><br><br>
    <!-- breadcrumb -->
    <div class="container">
        <div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
            <a href="{{route('home')}}" class="stext-109 cl8 hov-cl1 trans-04">
                Home
                <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
            </a>

            <span class="stext-109 cl4">
                Checkout Page
            </span>
        </div>
    </div>

  <div style="margin-bottom: 30px;" class="col-md-12 ">
                    <div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
                        <h4 class="mtext-109 cl2 p-b-30">
                            Checkout Page
                        </h4>
    
                      {!! Form::open(['route'=>'address.store','method'=>'POST'])!!}
            <h4 class="mtext-105 cl2 txt-center p-b-30">
              Enter Checkout Details
            </h4>

            <div class="row">
               <div class="bor8 col-md-6 m-b-20 how-pos4-parent {{$errors->has('email')?'has-error':''}}">
                @if(auth()->user())
              <input value="{{ auth()->user()->email }}" class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="email" name="email" placeholder="Your Email" readonly="" required="">
              @else
              <input  class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="email" name="email" placeholder="Your Guest Email" value="{{old('email')}}" required="">
              <small class="text-danger">{{$errors->first('email')}}</small>
              @endif
             
            </div>
            <div class="bor8 col-md-6 m-b-20 how-pos4-parent {{$errors->has('addressline')?'has-error':''}}">
              <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="addressline" placeholder="Enter your address line" required="">
             <small class="text-danger">{{$errors->first('addressline')}}</small>
            </div>

           
            </div>


            <div class="row">
           <div class="col-md-6 m-b-20 ">
              
            {{ Form::select('town_id', $towns, null, ['class' => 'stext-111 cl2 plh3 size-116 p-l-62 p-r-30', 'placeholder'=>'Select Town']) }}
                      
              
            </div>

             <div class="bor8 col-md-6 m-b-20 how-pos4-parent">
              <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="phone" maxlength="10" placeholder="Phone Number" required="">
              
            </div>
            </div>

          
          <button type="submit" class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
          Proceed to Payment
          </button>
         {!!Form::close()!!}                 
    </div>
  </div>



</body>

@endsection