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
<form action="{{ route('users.store') }}" method="post">
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
                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter book name" required>
                            </div>

                            <div class="mb-3">
                                <label for="writer" class="form-label">Writer</label>
                                <input type="text" class="form-control" id="writer" name="writer" placeholder="Enter writer's name" required>
                            </div>

                            <div class="mb-3">
                                <label for="publisher" class="form-label">Publisher</label>
                                <input type="text" class="form-control" id="publisher" name="publisher" placeholder="Enter publisher" required>
                            </div>

                            <div class="mb-3">
                                <label for="isbn" class="form-label">ISBN</label>
                                <input type="text" class="form-control" id="isbn" name="isbn" placeholder="Enter ISBN" required>
                            </div>

                            <div class="mb-3">
                                <label for="publish_place" class="form-label">Publish Place</label>
                                <input type="text" class="form-control" id="publish_place" name="publish_place" placeholder="Enter publish place" required>
                            </div>

                            <div class="mb-3">
                                <label for="publish_year" class="form-label">Publish Year</label>
                                <input type="number" class="form-control" id="publish_year" name="publish_year" placeholder="Enter publish year" required>
                            </div>
                        </div>

                        <!-- Right Column -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="type" class="form-label">Type</label>
                                <input type="text" class="form-control" id="type" name="type" placeholder="Enter book type" required>
                            </div>
                            <div class="mb-3">
                                <label for="is_publish" class="form-label">Is Published</label>
                                <select class="form-select" id="is_publish" name="is_publish">
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="stock" class="form-label">Stock</label>
                                <input type="number" class="form-control" id="stock" name="stock" placeholder="Enter stock quantity" required>
                            </div>
                            <div class="mb-3">
                                <label for="category_id" class="form-label">Category</label>
                                <select class="form-select" id="category_id" name="category_id">
                                    <!-- Populate options dynamically -->
                                    <option value="1">Category 1</option>
                                    <option value="2">Category 2</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="language_id" class="form-label">Language</label>
                                <select class="form-select single-select" data-placeholder="Enter language" id="language_id" name="language_id">
                                    <option></option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="internal_reference" class="form-label">Internal Reference</label>
                                <input type="text" class="form-control" id="internal_reference" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="cover_path" class="form-label">Cover Image</label>
                                <input type="file" class="form-control" id="cover_path" name="cover_path" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="book_path" class="form-label">Book File</label>
                                <input type="file" class="form-control" id="book_path" name="book_path" required>
                            </div>
                        </div>
                        <div class="col">

                            <div class="mb-3">
                                <label for="synopsis" class="form-label">Synopsis</label>
                                <textarea class="form-control" id="synopsis" name="synopsis" rows="3" placeholder="Enter synopsis"></textarea>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

@endsection
