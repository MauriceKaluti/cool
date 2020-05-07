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

    var fiedlHTML = '<div><input type="text" class="form-control" name="field_name[]" value=""/><a href="javascript:void(0);" class="remove_button" title="Remove Field"> <img src="remove-icon.png"/></a></div>'; //New input field HTML
    
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


