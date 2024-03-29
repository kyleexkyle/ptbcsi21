@extends('layouts.guest')
@section('main')



    <!-- Sing in  Form -->
<section class="sign-in vh-100 flex">
        <div class="container my-auto">

            @include('auth._notifications')

            <div class="signin-content">
                <div class="signin-image">
                    <figure><img src="assets/images/signin-image.jpg" alt="sing up image"></figure>
                                    <a href="{{ route_to('register') }}" class="signup-image-link">Create an account</a>
                </div>

                <div class="signin-form">
                    <h2 class="form-title">{{ lang('Auth.login') }}</h2>
                    <form method="POST" action="{{ route_to('login') }}" accept-charset="UTF-8"
                          class="register-form" id="login-form">
                        @csrf
                        <div class="form-group">
                            <label for="email"><i class="zmdi zmdi-account material-icons-name"></i></label>
                            <input type="text" name="username" id="username" placeholder="Username"/>
                        </div>
                        <div class="form-group">
                            <label for="password"><i class="zmdi zmdi-lock"></i></label>
                            <input type="password" name="password" id="password" placeholder="Password"/>
                        </div>
                        <div class="form-group form-button">
                            <input type="submit" name="signin" id="signin" class="form-submit" value="Log in"/>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection