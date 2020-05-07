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
                Payment Page
            </span>
        </div>
    </div>

  <div style="margin-bottom: 30px;" class="col-md-12 ">
                    <div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
                        <h4 class="mtext-109 cl2 p-b-30">
                            Payment Page
                        </h4>

                      <form action="{{route('payment.store')}}" method="POST" id="payment-form">
                {{csrf_field()}}
                 <span class="payment-errors"></span>

            <h4 class="mtext-105 cl2 txt-center p-b-30">
              Enter Card Payment Details
            </h4>

            <div class="row">
            <div class="bor8 col-md-6 m-b-20 how-pos4-parent">
              <input data-stripe="number" placeholder="Card Number" required="" class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="addressline">
              <!-- <img class="how-pos4 pointer-none" src="{{url('ecom/images/icons/icon-email.png')}}" alt="ICON"> -->
            </div>

             <div class="bor8 col-md-6 m-b-20 how-pos4-parent">
              <div class="row">
              <div class="col-md-6">
              <input data-stripe="exp_month" placeholder="Exp. Month" required="" class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text">
              </div>
             <div class="col-md-6">
             <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" data-stripe="exp_year" placeholder="Exp. Year" required=""  type="text" size="2" data-stripe="exp_year" placeholder="YY" required="">
              </div>
            </div>
            </div>

            </div>


            <div class="row">
            <div class="bor8 col-md-6 m-b-20 how-pos4-parent">
              <input data-stripe="cvc" placeholder="Enter CVC" required="" class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text">
              
            </div>
            </div>
          
          <button type="submit" class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
          Pay Now
          </button>
         {!!Form::close()!!}                 
    </div>
  </div>


<script src="{{asset('ecom/vendor/jquery/jquery-3.2.1.min.js') }}" type="text/javascript">  
</script>
<!-- Payment Scripts -->

<script type="text/javascript">
    
    $(function() {
 
    var $form = $('#payment-form');
    $form.submit(function(event) {
        // Disable the submit button to prevent repeated clicks:
        $form.find('.submit').prop('disabled', true);

        // Request a token from Stripe:
        Stripe.card.createToken($form, stripeResponseHandler);

        // Prevent the form from being submitted:
        return false;
    });
});


function stripeResponseHandler(status, response) {
  
    // Grab the form:
    var $form = $('#payment-form');

    if (response.error) { // Problem!

        // Show the errors on the form:
        $form.find('.payment-errors').text(response.error.message);
        $form.find('.submit').prop('disabled', false); // Re-enable submission

    } else { // Token was created!

        // Get the token ID:
        var token = response.id;

        // Insert the token ID into the form so it gets submitted to the server:
        $form.append($('<input type="hidden" name="stripeToken">').val(token));

        // Submit the form:
        $form.get(0).submit();
    }
};



</script>



</body>

@endsection