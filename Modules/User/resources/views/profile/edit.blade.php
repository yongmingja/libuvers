@extends('layouts.form')

@section('breadcrumb')
    <div class="breadcrumb-title pe-3">{{ $user->name }}</div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">{{ $user->name }}</li>
            </ol>
        </nav>
    </div>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('profile.update') }}" method="post">
                    @csrf
                    @method('patch')
                    <div class="row mb-3">
                        <label for="input_name" class="col-sm-3 col-form-label">{{ __('Name') }}</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="input_name" name="name" value="{{ old("name", $user->name) }}" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="input_username" class="col-sm-3 col-form-label">{{ __('Username') }}</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="input_username" name="username" value="{{ old("username", $user->username) }}" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="input_email" class="col-sm-3 col-form-label">{{ __('Email') }}</label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control" id="input_email" name="email" value="{{ old("email", $user->email) }}" required>
                        </div>
                    </div>
                    <hr>
                    <button class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('profile.update.password') }}" method="post">
                    @csrf
                    @method('patch')
                    <div class="row mb-3">
                       <label for="input_current_password" class="col-sm-3 col-form-label">{{ __('Current Password') }}</label>
                        <div class="col-sm-9">
                           <div class="input-group" id="show_hide_password">
                                <input type="password" class="form-control border-end-0" id="input_current_password" name="current_password" required>
                                <a href="javascript:;" class="input-group-text bg-transparent" tabindex="-1"><i class='bx bx-hide'></i></a>
                           </div>
                       </div>
                    </div>
                    <div class="row mb-3">
                       <label for="input_password" class="col-sm-3 col-form-label">{{ __('New Password') }}</label>
                        <div class="col-sm-9">
                           <div class="input-group" id="show_hide_password">
                                <input type="password" class="form-control border-end-0" id="input_password" name="password" required>
                                <a href="javascript:;" class="input-group-text bg-transparent" tabindex="-1"><i class='bx bx-hide'></i></a>
                           </div>
                       </div>
                    </div>
                    <div class="row mb-3">
                       <label for="input_password_confirmation" class="col-sm-3 col-form-label">{{ __('Password Confirmation') }}</label>
                        <div class="col-sm-9">
                           <div class="input-group" id="show_hide_password">
                                <input type="password" class="form-control border-end-0" id="input_password_confirmation" name="password_confirmation" required>
                                <a href="javascript:;" class="input-group-text bg-transparent" tabindex="-1"><i class='bx bx-hide'></i></a>
                           </div>
                       </div>
                    </div>
                    <hr/>
                    <button class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
