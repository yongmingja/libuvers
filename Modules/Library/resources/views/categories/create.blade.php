@extends('layouts.form')

@section('breadcrumb')
    <div class="breadcrumb-title pe-3">{{ __('New') }}</div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                </li>
                <li class="breadcrumb-item"><a href="{{ route('categories.index') }}">{{ __('Categories') }}</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">{{ __('New') }}</li>
            </ol>
        </nav>
    </div>
@endsection

@section('content')
<form action="{{ route('categories.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <button class="btn btn-primary"><i class='bx bxs-save'></i>{{ __('Save') }}</button>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title d-flex align-items-center">
                        <h5 class="mb-0">{{ __('New') }}</h5>
                    </div>
                    <hr/>
                    <div class="row">
                        <!-- Left Column -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter category name" value="{{ old('name', '') }}" required>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

@endsection
