<!--Main layout-->
  <main class="mt-5 pt-4">
    <div class="container wow fadeIn">

      <!-- Heading -->
      <h2 class="my-5 h2 text-center">Checkout Now</h2>

      <!--Grid row-->
      <div class="row">

        <!--Grid column-->
        <div class="col-md-12 mb-4">

          <!--Card-->
          <div class="card">

           

              {!! Form::open(['route'=>'address.store','method'=>'POST'])!!}

              <!--Form first row wrapper-->
               <div class="container">
              <div class="row">
               

                <!--Address & City-->
                <div class="col-md-6 mb-2">

                  <div class="md-form">
                  
                  {{ Form::text('addressline', null, array('class' => 'form-control', 'placeholder' => 'Address Line')) }} 

                  </div>

                  
                  <div class="md-form ">

                  	{{ Form::text('city', null, array('class' => 'form-control', 'placeholder' => 'City')) }} 
                    
                  </div>


                  <div class="md-form">
                    {{ Form::text('state', null, array('class' => 'form-control', 'placeholder' => 'State')) }}
                  </div>

                </div>
                <!--End of Address & City-->

                <!--State & Zip Code-->
                <div class="col-md-6 mb-2">

                 
                  <div class="md-form">
                    {{ Form::text('phone', null, array('class' => 'form-control', 'placeholder' => 'Phone No.')) }}
                  </div>

                  <div class="md-form">
                    {{ Form::text('country', null, array('class' => 'form-control', 'placeholder' => 'Country')) }}
                  </div>


                  <div class="md-form">
                    {{ Form::text('zip', null, array('class' => 'form-control', 'placeholder' => 'Zip Code')) }}
                  </div>



                </div>
                <!-- End of State & Zip Code-->

              </div>
              <!-- End of first form row Wrapper-->
              </div>




              <hr class="mb-4">
              <button style="background-color: #bf2429 !important; border: none; border-radius: 30px;" class="btn btn-primary btn-lg" type="submit">Proceed to Payment</button><br><br>

         

            {!!Form::close()!!}

          </div>
          <!--/.Card-->

        </div>
        <!--Grid column-->



      </div>
      <!--Grid row-->

    </div>
  </main>
  <!--Main layout-->