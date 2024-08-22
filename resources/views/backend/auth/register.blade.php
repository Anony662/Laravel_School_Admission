@extends('backend.auth.auth_master')

@section('auth_title')
    Register | Admin Panel
@endsection

@section('auth-content')
    <!-- registration area start -->
    <div class="login-area">
        <div class="container">
            <div class="login-box ptb--100">
                <form method="POST" action="{{ route('admin.register.submit') }}">
                    @csrf
                    <div class="login-form-head">
                        <h4>Register</h4>
                        <p>Create an account as student</p>
                    </div>
                    <div class="login-form-body">
                        <div class="form-gp">
                            <label for="registerName">Name</label>
                            <input type="text" id="registerName" name="name">
                            <i class="ti-user"></i>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-gp">
                            <label for="registerEmail">Email address</label>
                            <input type="email" id="registerEmail" name="email">
                            <i class="ti-email"></i>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-gp">
                            <label for="registerPassword">Password</label>
                            <input type="password" id="registerPassword" name="password">
                            <i class="ti-lock"></i>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-gp">
                            <label for="registerPasswordConfirm">Confirm Password</label>
                            <input type="password" id="registerPasswordConfirm" name="password_confirmation">
                            <i class="ti-lock"></i>
                            @error('password_confirmation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="submit-btn-area">
                            <button id="form_submit" type="submit">Register <i class="ti-arrow-right"></i></button>
                        </div>
                        <div class="text-center mt-4">
                            <p>Already have an account? <a href="{{ route('admin.login') }}">Sign in here</a></p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- registration area end -->
@endsection
