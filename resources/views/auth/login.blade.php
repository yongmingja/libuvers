@extends('layouts.base')

@section('wrapper')
    <div class="section-authentication-signin d-flex align-items-center justify-content-center my-5 my-lg-0">
        <div class="container-fluid">
            <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
                <div class="col mx-auto">
                    <div class="mb-4 text-center">
                        <img src="assets/images/logo-img.png" width="180" alt="" />
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="border p-4 rounded">
                                <div class="text-center">
                                    <h3 class="">{{ __('Sign in') }}</h3>

                                    @if (Route::has('password.request'))
                                        <p>{{ __('Don\'t have an account yet?') }} <a href="{{ route('register') }}">{{ __('Sign up here') }}</a>
                                        </p>
                                    @endif
                                </div>

                                @if (Route::has('password.request'))
                                    <div class="login-separater text-center mb-4">
                                        <span>{{ __('OR SIGN IN WITH EMAIL') }}</span>
                                        <hr/>
                                    </div>
                                @endif
                                <div class="form-body">
                                    <form method="POST" action="{{ route('login') }}" class="row g-3">
                                        @csrf
                                        <div class="col-12">
                                            <label for="input_email" class="form-label">{{ __('Email Address') }}</label>
                                            <input type="email" class="form-control" id="input_email" placeholder="{{ __('Email Address') }}" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                        </div>
                                        <div class="col-12">
                                            <label for="input_password" class="form-label">{{ __('Enter Password') }}</label>
                                            <div class="input-group" id="show_hide_password">
                                                <input type="password" class="form-control border-end-0" id="input_password" placeholder="{{ __('Enter Password') }}" name="password" required autocomplete="current-password">
                                                <a href="javascript:;" class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" id="input_remember" name="remember" {{ old('remember' ? 'checked' : '') }}>
                                                <label class="form-check-label" for="input_remember">{{ __('Remember Me') }}</label>
                                            </div>
                                        </div>
                                        @if (Route::has('password.request'))
                                            <div class="col-md-6 text-end">	<a href="{{ route('password.request') }}">{{ __('Forgot Password ?') }}</a>
                                            </div>
                                        @endif
                                        <div class="col-12">
                                            <div class="d-grid">
                                                <button type="submit" class="btn btn-primary"><i class="bx bxs-lock-open"></i>{{ __('Sign in') }}</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end row-->
        </div>
    </div>
@endsection
