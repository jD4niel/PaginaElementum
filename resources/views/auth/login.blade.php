@extends('layouts.app')

@section('content')
{{--<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>--}}
<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
    <div class="wrap-login100 p-l-55 p-r-55 p-t-80 p-b-30">
        <form class="login100-form validate-form" method="POST" method="POST" action="{{ route('login') }}">
            {{ csrf_field() }}
            <div style="margin-bottom: 50px;">
                <img  src="{{ URL::to('/') }}/images/logocolor.png" alt="">
            </div>
            <hr>
            <span class="login100-form-title p-b-37">
					Ingresa
                </span>
            <div class="wrap-input100 validate-input m-b-20" data-validate="email">
                <input  id="email" value="{{ old('email') }}" required class="input100 " type="text" name="email" placeholder="email">
                <span class="focus-input100"></span>
                @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                @endif
            </div>

            <div class="wrap-input100 validate-input m-b-25" data-validate = "Ingrese contraseña">
                <input id="password" class="input100 " type="password" name="password" placeholder="contraseña" required>
                <span class="focus-input100"></span>
                @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                @endif
            </div>
            <div class="wrap-input100">

                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                <label style="margin-left: 25px; font-size: 18px; color: #74adb0;" class="form-check-label" for="remember">
                    Recuérdame
                </label>
            </div>
            <br>
            <br>
            <div class="container-login100-form-btn">
                <button type="submit" class="login100-form-btn">
                    Ingresar
                </button>
            </div>
            {{--
                            <div class="text-center p-t-57 p-b-20">
                                <span class="txt1">
                                    Or login with
                                </span>
                            </div>

                            <div class="flex-c p-b-112">
                                <a href="#" class="login100-social-item">
                                    <i class="fa fa-facebook-f"></i>
                                </a>

                                <a href="#" class="login100-social-item">
                                    <img src="images/icons/icon-google.png" alt="GOOGLE">
                                </a>
                            </div>

                            <div class="text-center">
                                <a href="#" class="txt2 hov1">
                                    Sign Up
                                </a>
                            </div>--}}
        </form>



    </div>
</div>

@endsection
@section('script_section')
    <script>
        $('#navheader').hide();
    </script>
@endsection