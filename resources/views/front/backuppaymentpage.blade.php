@extends('layout.main')

@section('title', 'Prints')



@section('content')

<!--Main layout-->
  <main class="mt-5 pt-4">
    <div class="container wow fadeIn">

      <!-- Heading -->
      <h2 class="my-5 h2 text-center">Payment Page</h2>

      <!--Grid row-->
      <div class="row">

        <!--Grid column-->
        <div class="col-md-12 mb-4">

          <!--Card-->
          <div class="card">

           


              <form action="{{route('payment.store')}}" method="POST" id="payment-form">
                {{csrf_field()}}
                 <span class="payment-errors"></span>
              <!--Form first row wrapper-->
              <div class="container">
              <div class="row">

                <!--Card Number-->
                <div class="col-md-6 mb-2">

                  <div class="md-form">
                  
                  <input type="text" size="20" data-stripe="number" placeholder="Card Number" class="form-control" required="">

                  </div>

                  
                  <div class="md-form ">

                    <input type="text" size="2" data-stripe="exp_month" placeholder="MM" required="">
                    <span> / </span>
                    <input type="text" size="2" data-stripe="exp_year" placeholder="YY" required="">

                   
                    
                  </div>


                  <div class="md-form">
                    
                    <input type="text" size="4" data-stripe="cvc" placeholder="Enter CVC" class="form-control" required="">

                  </div>

                </div>
                <!--End of Address & City-->



              </div>
              <!-- End of first form row Wrapper-->
            </div>



              <hr class="mb-4">

              <button style="background-color: #bf2429 !important; border: none; border-radius: 30px;" class="btn btn-primary btn-lg" type="submit">Pay Now</button><br><br>

              

         

         </form>

          </div>
          <!--/.Card-->

        </div>
        <!--Grid column-->



      </div>
      <!--Grid row-->

    </div>
  </main>
  <!--Main layout-->


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




$(document).ready(function(){


    var maxField = 10; //Input fields increment limitation

    var addButton = $('.add_button'); //Add button selector

    var wrapper = $('.field_wrapper'); //Input field wrapper

    var fiedlHTML = '<div><input type="text" name="field_name[]" value=""/><a href="javascript:void(0);" class="remove_button" title="Remove Field"> <img src="remove-icon.png"/></a></div>'; //New input field HTML
    
    var x = 1; //Initial field counter

    $(addButton).click(function(){ //Once a button is clicked 

        if(x < maxField){ //Check maximum number of input fields
            x++; //Increment field counter
            $(wrapper).append(fiedlHTML); //Add field html
        }
    });

    $(wrapper).on('click','.remove_button', function(e){ //Once remove button is clicked
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x--; //Decrement field counter
    });



});



</script>




@endsection

