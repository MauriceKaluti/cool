
$(document).ready(function(){


	var maxField = 10; //Input fields increment limitation

	var addButton = $('.add_button'); //Add button selector

	var wrapper = $('.field_wrapper'); //Input field wrapper

	var fiedlHTML = '<div><input type="text" name="paper[]" id="paper" placeholder="Paper" style="width: 100px;"/><input type="text" name="size[]" id="size" placeholder="Size" style="width: 100px;"/><input type="text" name="price[]" id="price" placeholder="Price" style="width: 100px;"/><input type="text" name="quantity[]" id="quantity" placeholder="Quantity" style="width: 100px;"/><a href="javascript:void(0);" class="remove_button" title="Remove Field"> Remove </a></div>'; //New input field HTML
    
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




$(".deleteRecord").click(function(){
	var id = $(this).attr('rel');
	var deleteFunction = $(this).attr('rel1');
	swal({
		title: 'Are you sure?',
		text: "You won't be able to revert this changes",
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Yes, Delete It!!',
		cancelButtonText: 'No, Cancel It!!',
		confirmButtonClass: 'btn btn-success',
		cancelButtonClass: 'btn btn-danger',
		buttonsStyling: false,
		reverseButtons: true

		},
		function(){
			window.location.href="/admin/"+deleteFunction+"/"+id;
	});
});




