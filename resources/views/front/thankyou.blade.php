



@extends('layout.main')

@section('title', 'Prints')



@section('content')

<br><br><br><br><br>

<div class="jumbotron text-xs-center">
  <h1 class="display-3" align="center">Thank You!</h1>
  <p class="lead" align="center"><strong>Please check your email</strong> for payment information details.</p>
  <hr>
  <p align="center">
    Having trouble? <a href="">Contact us</a>
  </p>
  <p class="lead" align="center">
    <a class="btn btn-primary btn-sm" href="{{route('prints')}}" role="button">Continue Shopping</a>
  </p>
</div>



@endsection