

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

