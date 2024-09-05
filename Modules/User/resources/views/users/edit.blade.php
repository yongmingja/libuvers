@extends('layouts.form')

@section('breadcrumb')
    <div class="breadcrumb-title pe-3">{{ __('New') }}</div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                </li>
                <li class="breadcrumb-item"><a href="{{ route('users.index') }}">{{ __('Users') }}</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">{{ __('New') }}</li>
            </ol>
        </nav>
    </div>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('users.update', $user->id) }}" method="post">
                @csrf
                @method('PUT')
                <a href="{{ route('users.create') }}" class="btn btn-outline-primary">{{ __('New') }}</a>
                <button class="btn btn-primary">{{ __('Save') }}</button>
                <a href="{{ route('users.destroy', $user->id) }}" class="btn btn-danger" data-confirm-delete="true">{{ __('Delete') }}</a>
                <hr/>
                <div class="row mb-3">
                    <label for="input_name" class="col-sm-2 col-form-label">{{ __('Name') }}</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="input_name" name="name" value="{{ old("name", $user->name) }}" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="input_username" class="col-sm-2 col-form-label">{{ __('Username') }}</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="input_username" name="username" value="{{ old("username", $user->username) }}" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="input_email" class="col-sm-2 col-form-label">{{ __('Email') }}</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="input_email" name="email" value="{{ old("email", $user->email) }}" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="input_password" class="col-sm-2 col-form-label">{{ __('Password') }}</label>
                    <div class="col-sm-10">
                        <div class="input-group" id="show_hide_password">
                            <input type="password" class="form-control border-end-0" id="input_password" name="password">
                            <a href="javascript:;" class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
