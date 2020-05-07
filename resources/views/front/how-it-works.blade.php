

@extends('layout.main')

@section('title', 'Print')

@section('content')



<!-- Cart Modal Here -->

@include('front.modal.cartmodal')

<!-- Cart Modal Here -->
<br><br><br><br><br><br>
<div class="container">
	
	<div class="row">
		
			<div class="col-md-6">
				<div style="margin-bottom: 20px;" class="card">

 <div class="card-body">
        <h4 class="stext-110" style="margin-bottom: 10px;" align="center"><b>Why Choose Us</b></h4>
        <hr>

<div class="container">
<div  style="margin-bottom: 10px;" class="row">
<div class="card" style="width: 15rem; margin-left: 35px; ">
   
    
  <div class="card-body">
    <h5 class="card-title stext-105"><b>Why us content</b></h5>
    <p class="card-text stext-105">We would require a recommendation whether this should be textual or just some images designed!.</p>
    
  </div>
</div>

<div class="card" style="width: 15rem; margin-left: 35px;">
  <div class="card-body">
    <h5 class="card-title stext-105"><b>Why us content</b></h5>
    <p class="card-text stext-105">We would require a recommendation whether this should be textual or just some images designed!.</p>
    
  </div>
</div>
</div>


<!-- Line 2 -->

<div class="row">
<div class="card" style="width: 15rem; margin-left: 35px; ">
   
    
  <div class="card-body">
    <h5 class="card-title stext-105"><b>Why us content</b></h5>
    <p class="card-text stext-105">We would require a recommendation whether this should be textual or just some images designed!.</p>
    
  </div>
</div>

<div class="card" style="width: 15rem; margin-left: 35px;">
  <div class="card-body">
    <h5 class="card-title stext-105"><b>Why us content</b></h5>
    <p class="card-text stext-105">We would require a recommendation whether this should be textual or just some images designed!.</p>
    
  </div>
</div>
</div>

<!-- End Line 2 -->
</div>

		
		</div>
        </div>
 


<!-- From Other Page -->
	</div>


	<!-- Get A Quote -->

		<div class="col-md-6">
				<div style="margin-bottom: 20px;" class="card">
					<div class="card-body">
				<h4 class="stext-110" align="center"><b>Get a Quote</b></h4>
                <br>
				<p class="stext-105">Can't find what you are looking for on our site? Fill out this form and our sales department will contact you within 24 hours to get your project underway.</p>

                <hr>
          @if(session('message'))
        <div class="alert alert-dark" role="alert">
            <h4 class="alert-heading stext-105">{{session('message')}}</h4>
        </div>
        @endif
				<div  class="row">
				<div class="col-md-6">
           
				{!! Form::open(['route'=>'getquote.store','method'=>'POST','files'=>true])!!}
                 <div class="bor8 m-b-20 how-pos4-parent">
                <input id="name" type="text" class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" name="name" required autofocus placeholder="Contact Name">
       		   </div>

                <div class="bor8 m-b-20 how-pos4-parent">
                <input id="email" type="email" class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" name="email" required autofocus placeholder="Your Email">
               </div>

               <div class="bor8 m-b-20 how-pos4-parent">
                <input id="phone" type="text" class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" name="phone" required autofocus placeholder="Your Phone">
               </div>    
      

        		</div>

        		<div class="col-md-6">
      
       		
                 <div class="bor8 m-b-20 how-pos4-parent">
                <input id="company" type="text" class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" name="company" required autofocus placeholder="Company Name (If Any)">
               </div>
      
                <div class="bor8 m-b-20 how-pos4-parent">
                <input id="website" type="text" class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" name="website" required autofocus placeholder="Website (If Any)">
               </div>

        		
                <div class="bor8 m-b-20 how-pos4-parent">
                <input id="product" type="text" class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" name="product" required autofocus placeholder="Product Name">
               </div>


        		</div>

        		</div>
        		<div class="row">
        		<div class="col-md-12">
                 
                  <div class="bor8 m-b-20 how-pos4-parent">
                  <textarea  type="text" class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" name="message" id="message" placeholder="Tell us something" required=""></textarea>
                 </div>
        			
        		</div>
        		</div>
                <br>

        		  {{ Form::submit('Send Request',array('class' => 'flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer')) }}


        {!!Form::close()!!}

        		
				
			</div>
		</div>
	</div>
	</div>

	<!-- Our Simple Process-->

	
    <br>
    <h3 class="ltext-103 cl5"  >Our Simple Process</h3><br><br>
     <p style="color: yellow;" class="lead"></p>

     <div class="row">

     <div style="margin-bottom: 20px;" class="col-md-3">
     	<div style="width: 150px; height: 200px; background-color: #191A1E; border-radius: 20px; " class="card">
     		<span class="badge">1</span> 
     	<img class="card-img-top" src="{{url('images/howitworks/brainstormcool.png')}}">
     	<div class="card-body">
     		<small>
     		<p  class="stext-111" style="color: white; font-size: 20px;">Brainstorm</p>
     		</small>
     	</div>     	
     	</div>
     </div>


     	     <div style="margin-bottom: 20px;" class="col-md-3">
     	<div style="width: 150px; height: 200px; background-color: #191A1E; border-radius: 20px; " class="card">
     		<span class="badge">2</span> 
     	<img class="card-img-top" src="{{url('images/howitworks/design.png')}}">
     	<div class="card-body">
     		<small>
     		<p  class="stext-111" style="color: white; font-size: 20px;">Design</p>
     		</small>
     	</div>     	
     	</div>
     </div>


     <div style="margin-bottom: 20px;" class="col-md-3">
     	<div style="width: 150px; height: 200px; background-color: #191A1E; border-radius: 20px; " class="card">
     		<span class="badge">3</span> 
     	<img class="card-img-top" src="{{url('images/howitworks/feedback.png')}}">
     	<div class="card-body">
     		<small>
     		<p class="stext-111" style="color: white; font-size: 20px;">Feedback</p>
     		</small>
     	</div>     	
     	</div>
     </div>
      <div  class="col-md-3">
     	     	<div style="width: 150px; height: 200px; background-color: #191A1E; border-radius: 20px; " class="card">
     	     		<span class="badge">4</span>
     	<img class="card-img-top" src="{{url('images/howitworks/print.png')}}">
     	<div class="card-body">
     		<small>
     		<p  class="stext-111" style="color: white; font-size: 20px;">Print</p>
     		</small>
     	</div>     	
     	</div>
     </div>




     </div>

    </div>
 <br> <br>

@endsection