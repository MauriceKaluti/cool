<body class="animsition">
	
	


	@extends('layout.main')

@section('title', 'Print')

@section('content')


<!-- Cart Modal Here -->

@include('front.modal.cartmodal')

<!-- Cart Modal Here -->
  



	<!-- Content page -->
	<section class="bg0 p-t-104 p-b-116">
		<div class="container">
			<div class="flex-w flex-tr">
				<div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">
					{!! Form::open(['route'=>'sendmessage.store','method'=>'POST','files'=>true])!!}
						<h4 class="mtext-105 cl2 txt-center p-b-30">
							Send Us A Message
						</h4>
		
		<!---- POPUP ---->
        <!-- @if(session()->has('message'))   
        <div class="alert alert-dark" role="alert">
            <h4 class="alert-heading stext-105">Message Added Successfully!</h4>
        </div>
        @endif -->

        @if(session('message'))
        <div class="alert alert-dark" role="alert">
            <h4 class="alert-heading stext-105">{{session('message')}}</h4>
        </div>
        @endif
        <!---- POPUP ---->


						<div class="bor8 m-b-20 how-pos4-parent">
						<input name="name" type="text" class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" placeholder="Name" required="required">
						</div>



						<div class="bor8 m-b-20 how-pos4-parent">

						<input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="email" placeholder="Your Email Address">
						<!-- <img class="how-pos4 pointer-none" src="{{url('ecom/images/icons/icon-email.png')}}" alt="ICON"> -->							


						</div>

						<div class="bor8 m-b-20 how-pos4-parent">
						<input name="phone" type="text" class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" placeholder="Phone">
						</div>

						<div class="bor8 m-b-30">
						<textarea class="stext-111 cl2 plh3 size-120 p-lr-28 p-tb-25" name="message" placeholder="How Can We Help? (250 words max)"></textarea>
						</div>

						{{ Form::submit('Send Message',array('class' => 'flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer')) }}

					{!!Form::close()!!}
				</div>

				<div class="size-210 bor10 flex-w flex-col-m p-lr-93 p-tb-30 p-lr-15-lg w-full-md">
					<div class="flex-w w-full p-b-42">
						<span class="fs-18 cl5 txt-center size-211">
							<span class="lnr lnr-map-marker"></span>
						</span>

						<div class="size-212 p-t-2">
							<span class="mtext-110 cl2">
								Address
							</span>

							<p class="stext-115 cl6 size-213 p-t-18">
								Mirage Plaza, Westlands Drive, 00100 Nairobi - KE.
							</p>
						</div>
					</div>

					<div class="flex-w w-full p-b-42">
						<span class="fs-18 cl5 txt-center size-211">
							<span class="lnr lnr-phone-handset"></span>
						</span>

						<div class="size-212 p-t-2">
							<span class="mtext-110 cl2">
								Lets Talk
							</span>

							<p class="stext-115 cl1 size-213 p-t-18">
								+254 700 *** ***
							</p>
						</div>
					</div>

					<div class="flex-w w-full">
						<span class="fs-18 cl5 txt-center size-211">
							<span class="lnr lnr-envelope"></span>
						</span>

						<div class="size-212 p-t-2">
							<span class="mtext-110 cl2">
								Sale Support
							</span>

							<p class="stext-115 cl1 size-213 p-t-18">
								support@coolprints.com
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>	
	
	


	<!-- Back to top -->
	<div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="zmdi zmdi-chevron-up"></i>
		</span>
	</div>




	@endsection