@extends('layouts.list')

@section('breadcrumb')
    <div class="breadcrumb-title pe-3">{{ __('Books') }}</div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item">
                    <a href="javascript:;">
                        <i class="bx bx-home-alt"></i>
                    </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">{{ __('Books') }}</li>
            </ol>
        </nav>
    </div>
@endsection

@section('header-button')
    <a href="{{ route('books.create') }}" class="btn btn-primary mb-3 mb-lg-0"><i class='bx bxs-save'></i>{{ __('New') }}</a>
@endsection

@section('thead')
    <tr>
        <th class="text-center align-middle"><input class="form-check-input" type="checkbox" value=""></th>
        <th>{{ __('Name') }}</th>
        <th>{{ __('Bookname') }}</th>
        <th>{{ __('Email') }}</th>
    </tr>
@endsection

@section('tbody')
    @foreach ($books as $book)
        <tr data-action="{{ route('books.edit', $book->id) }}">
            <td class="text-center"><input class="form-check-input" type="checkbox" value=""></td>
            <td>{{ $book->name }}</td>
            <td>{{ $book->bookname }}</td>
            <td>{{ $book->email }}</td>
        </tr>
    @endforeach
@endsection
