

@extends('layout.main')

@section('content')
<br><br><br><br><br><br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <div class="bor8 m-b-20 how-pos4-parent">
                                <input id="email" type="email" class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus placeholder="Enter Username/Email">

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <div class="bor8 m-b-20 how-pos4-parent">
                                <input id="password" type="password" class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="Enter Password">

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button style="width: 80px; height: 40px;" type="submit" class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
                                    {{ __('Login') }}
                                </button>

                                <a class="btn btn-link" href="{{ route('guestCheckout.index') }}">
                                    {{ __('Continue as Guest?') }}
                                </a>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>

                                

                            </div>
                        </div><br>

                        <div class="form-group row mb-0">                        
                            <div class="col-md-8 offset-md-4">
                                                       
                                <a  style="width: 300px; height: 40px;" class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer" href="{{url('/register')}}">
                                    Create An Account Now!
                                </a>                        
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<br><br><br><br>
@endsection
