@extends('layouts.list')

@section('breadcrumb')
    <div class="breadcrumb-title pe-3">{{ __('Users') }}</div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item">
                    <a href="javascript:;">
                        <i class="bx bx-home-alt"></i>
                    </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">{{ __('Users') }}</li>
            </ol>
        </nav>
    </div>
@endsection

@section('header-button')
    <a href="{{ route('users.create') }}" class="btn btn-primary mb-3 mb-lg-0"><i class='bx bxs-plus-square'></i>{{ __('New') }}</a>
@endsection

@section('thead')
    <tr>
        <th class="text-center align-middle"><input class="form-check-input" type="checkbox" value=""></th>
        <th>{{ __('Name') }}</th>
        <th>{{ __('Username') }}</th>
        <th>{{ __('Email') }}</th>
    </tr>
@endsection

@section('tbody')
    @foreach ($users as $user)
        <tr data-action="{{ route('users.edit', $user->id) }}">
            <td class="text-center"><input class="form-check-input" type="checkbox" value=""></td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->username }}</td>
            <td>{{ $user->email }}</td>
        </tr>
    @endforeach
@endsection
