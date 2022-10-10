@extends('backend.auth.auth_master')

@section('auth_title')
    Login | Admin Panel
@endsection

@section('auth-content')
    <!-- login area start -->
    <div class="login-area" style="height: 100vh; ">
        <div class="container-fluid text-center">
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group c_form_group">
                        <label>Super Admin Access</label><br>
                        <span>Gmail: superadmin@example.com <br> Password: 12345678</span>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group c_form_group">
                        <label>Admin Access</label><br>
                        <span>Gmail: admin@gmail.com <br> Password: 12345678</span>
                    </div>
                </div>


                <div class="col-md-3">
                    <div class="form-group c_form_group">
                        <label>Client Access</label><br>
                        <span>Gmail: client@gmail.com <br> Password: 12345678</span>
                    </div>
                </div>


                <div class="col-md-3">
                    <div class="form-group c_form_group">
                        <label>Test Admin Access</label><br>
                        <span>Gmail: test@gmail.com <br> Password: 12345678</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="login-box">
                <form method="POST" action="{{ route('admin.login.submit') }}">
                    @csrf
                    <div class="login-form-head">
                        <h4>Sign In</h4>
                        <p>Hello there, Sign in and start managing your Admin Panel</p>
                    </div>
                    <div class="login-form-body">
                        @include('backend.layouts.partials.messages')
                        <div class="form-gp">
                            <label for="exampleInputEmail1">Email address or Username</label>
                            <input type="text" id="exampleInputEmail1" name="email" value="superadmin@example.com">
                            <i class="ti-email"></i>
                            <div class="text-danger"></div>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-gp">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" id="exampleInputPassword1" name="password" value="12345678">
                            <i class="ti-lock"></i>
                            <div class="text-danger"></div>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="row mb-4 rmber-area">
                            <div class="col-6">
                                <div class="custom-control custom-checkbox mr-sm-2">
                                    <input type="checkbox" class="custom-control-input" id="customControlAutosizing"
                                        name="remember">
                                    <label class="custom-control-label" for="customControlAutosizing">Remember Me</label>
                                </div>
                            </div>
                            {{-- <div class="col-6 text-right">
                                <a href="#">Forgot Password?</a>
                            </div> --}}
                        </div>
                        <div class="submit-btn-area">
                            <button id="form_submit" type="submit">Sign In <i class="ti-arrow-right"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- login area end -->
@endsection
