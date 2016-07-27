@extends('layouts.login')

@section('content')

<div id="login-page">
  <div class="container">

      <form class="form-login" role="form" method="POST" action="{{ url('/login') }}">
                      {{ csrf_field() }}
          <h2 class="form-login-heading">sign in now</h2>
          <div class="login-wrap">
              <input id="email" type="email" class="form-control" placeholder="email" name="email" value="{{ old('email') }}" autofocus>
              @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
              <br>
              <input id="password" type="password" placeholder="password" class="form-control" name="password">

                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
              <label class="checkbox">
                  <span class="pull-right">
                      <a data-toggle="modal" href="login.html#myModal"> Forgot Password?</a>

                  </span>
              </label>
              <button class="btn btn-theme btn-block" href="index.html" type="submit"><i class="fa fa-lock"></i> SIGN IN</button>
              <hr>

              <div class="login-social-link centered">
              <p>or you can sign in via your social network</p>
                  <button class="btn btn-facebook" type="submit"><i class="fa fa-facebook"></i> Facebook</button>
                  <button class="btn btn-twitter" type="submit"><i class="fa fa-twitter"></i> Twitter</button>
              </div>
              <div class="registration">
                  Don't have an account yet?<br/>
                  <a class="" href="#">
                      Create an account
                  </a>
              </div>

          </div>
      </div>

@endsection
