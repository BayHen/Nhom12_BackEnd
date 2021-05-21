@extends('layouts.auth', ['title' => 'Sign Up'])

@section('content')
<div class="register-form-area">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-8">
                <div class="register-form text-center" method="POST">
                    @csrf
                    <div class="register-heading">
                        <span>Sign Up</span>
                        <p>Create your account to get full access</p>
                    </div>
                    <div class="input-box">
                        <div class="single-input-fields">
                            <label>Full name</label>
                            <input type="text" placeholder="Enter full name">
                        </div>
                        <div class="single-input-fields">
                            <label>Email Address</label>
                            <input type="email" placeholder="Enter email address">
                        </div>
                        <div class="single-input-fields">
                            <label>Password</label>
                            <input type="password" placeholder="Enter Password">
                        </div>
                        <div class="single-input-fields">
                            <label>Confirm Password</label>
                            <input type="password" placeholder="Confirm Password">
                        </div>
                    </div>
                    <div class="register-footer">
                        <p> Already have an account? <a href="{{asset('/login')}}"> Login</a> here</p>
                        <button class="submit-btn3">Sign Up</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection