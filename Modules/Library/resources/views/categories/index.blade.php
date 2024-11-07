@extends('layouts.list')

@section('breadcrumb')
    <div class="breadcrumb-title pe-3">{{ __('Categories') }}</div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item">
                    <a href="javascript:;">
                        <i class="bx bx-home-alt"></i>
                    </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">{{ __('Categories') }}</li>
            </ol>
        </nav>
    </div>
@endsection

@section('header-button')
    <a href="{{ route('categories.create') }}" class="btn btn-primary mb-3 mb-lg-0"><i class='bx bxs-save'></i>{{ __('New') }}</a>
@endsection

@section('thead')
    <tr>
        <th class="text-center align-middle"><input class="form-check-input" type="checkbox" value=""></th>
        <th>{{ __('Name') }}</th>
    </tr>
@endsection

@section('tbody')
    @foreach ($categories as $category)
        <tr data-action="{{ route('categories.edit', $category->uuid) }}">
            <td class="text-center"><input class="form-check-input" type="checkbox" value=""></td>
            <td>{{ $category->name }}</td>
        </tr>
    @endforeach
@endsection
