@extends('layouts.auth')
@section('title','Sign Up')
@section('form')
<!-- Sign up form -->
<section class="signup">
    <div class="container">
        <div class="signup-content">
            <div class="signup-form">
                <h2 class="form-title">Sign up</h2>
                <form action="{{ route('register') }}" method="POST" class="register-form" id="register-form">
                    @php
                    $random = Str::random(6)
                     @endphp
                    @csrf
                    <input type="hidden" name="id_user" value="{{ $random }}">
                    <input type="hidden" name="role" value="penerbit">
                    <div class="form-group">
                        <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                        <input type="text" name="fullname" id="name" placeholder="Enter Your Full Name"/>
                    </div>
                    <div class="form-group">
                        <label for="email"><i class="zmdi zmdi-email"></i></label>
                        <input type="email" name="email" id="email" placeholder="Enter Your Email"/>
                    </div>
                    <div class="form-group">
                    <label for="name"><i class="zmdi zmdi-account material-icons-name-outline"></i></label>
                    <input type="text" name="username" id="name" placeholder=" Enter Your User Name"/>
                    </div>
                    <div class="form-group">
                        <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                        <input type="password" name="password" id="pass" placeholder="Enter Your Password"/>
                    </div>
                    <div class="form-group">
                        <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                        <input type="password" name="password_confirmation" id="re_pass" placeholder="Repeat your password"/>
                    </div>
                    <div class="form-group form-button">
                        <input type="submit" id="signup" class="form-submit" value="Register"/>
                    </div>
                </form>
            </div>
            <div class="signup-image">
                <figure><img src="http://127.0.0.1:8000/authform/images/signup-image.jpg" alt="sing up image"></figure>
                <a href="/login" class="signup-image-link">I already have an account</a>
            </div>
        </div>
    </div>
</section>
@endsection

