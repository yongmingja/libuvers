@extends('layouts.form')

@section('breadcrumb')
    <div class="breadcrumb-title pe-3">{{ $book->name }}</div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                </li>
                <li class="breadcrumb-item"><a href="{{ route('books.index') }}">{{ __('Books') }}</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">{{ $book->name }}</li>
            </ol>
        </nav>
    </div>
@endsection

@section('content')
<form action="{{ route('books.update', $book->uuid) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PATCH')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('books.create') }}" class="btn btn-outline-primary"><i class='bx bxs-plus-square'></i>{{ __('New') }}</a>
                    <button class="btn btn-primary"><i class='bx bxs-save'></i>{{ __('Save') }}</button>
                    <a href="{{ route('books.destroy', $book->uuid) }}" class="btn btn-danger" data-confirm-delete="true"><i class='bx bxs-trash'></i>{{ __('Delete') }}</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title d-flex align-items-center">
                        <h5 class="mb-0">{{ $book->name }}</h5>
                    </div>
                    <hr/>
                    <div class="row">
                        <!-- Left Column -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter book name" value="{{ old('name', $book->name) }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="writer" class="form-label">Writer</label>
                                <input type="text" class="form-control" id="writer" name="writer" placeholder="Enter writer's name" value="{{ old('writer',  $book->writer) }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="publisher" class="form-label">Publisher</label>
                                <input type="text" class="form-control" id="publisher" name="publisher" placeholder="Enter publisher" value="{{ old('publisher',  $book->publisher) }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="isbn" class="form-label">ISBN</label>
                                <input type="text" class="form-control" id="isbn" name="isbn" placeholder="Enter ISBN" value="{{ old('isbn',  $book->isbn) }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="publish_place" class="form-label">Publish Place</label>
                                <input type="text" class="form-control" id="publish_place" name="publish_place" placeholder="Enter publish place" value="{{ old('publish_place', $book->publish_place) }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="publish_year" class="form-label">Publish Year</label>
                                <input type="number" class="form-control" id="publish_year" name="publish_year" placeholder="Enter publish year" value="{{ old('publish_year', $book->publish_year) }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="publish_period" class="form-label">Publish Period</label>
                                <input type="number" class="form-control" id="publish_period" name="publish_period" placeholder="Enter publish period" value="{{ old('publish_period', $book->publish_period) }}" required>
                            </div>
                        </div>

                        <!-- Right Column -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="type" class="form-label">Type</label>
                                <input type="text" class="form-control" id="type" name="type" placeholder="Enter book type" value="{{ old('type', $book->type) }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="is_publish" class="form-label">Is Published</label>
                                <select class="form-select" id="is_publish" name="is_publish">
                                    <option value="1" {{ (old('is_publish', $book->is_publish) == '1') ? 'selected' : '' }}>Yes</option>
                                    <option value="0" {{ (old('is_publish', $book->is_publish) == '0') ? 'selected' : '' }}>No</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="stock" class="form-label">Stock</label>
                                <input type="number" class="form-control" id="stock" name="stock" placeholder="Enter stock quantity" value="{{ old('stock', $book->stock) }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="category_id" class="form-label">Category</label>
                                <select class="form-select single-select" id="category_id" name="category_id" data-placeholder="Enter Category" required>
                                    <option></option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" {{ (old('category_id', $book->category_id) == $category->id) ? 'selected' : '' }} >{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="language_id" class="form-label">Language</label>
                                <select class="form-select single-select" id="language_id" name="language_id" data-placeholder="Enter language" required>
                                    <option></option>
                                    @foreach ($languages as $language)
                                        <option value="{{ $language->id }}" {{ (old('language_id', $book->language_id) == $language->id) ? 'selected' : '' }}>{{ $language->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="internal_reference" class="form-label">Internal Reference</label>
                                <input type="text" class="form-control" id="internal_reference" tabindex="-1" value="{{ $book->internal_reference }}" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="cover_path" class="form-label">Cover Image</label>
                                <input type="file" class="form-control" id="cover_path" name="cover_path" accept=".jpg, .jpeg">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="book_path" class="form-label">Book File</label>
                                <input type="file" class="form-control" id="book_path" name="book_path" accept=".pdf">
                            </div>
                        </div>
                        <div class="col">

                            <div class="mb-3">
                                <label for="synopsis" class="form-label">Synopsis</label>
                                <textarea class="form-control" id="synopsis" name="synopsis" rows="3" placeholder="Enter synopsis" required>{{ old('synopsis', $book->synopsis) }}</textarea>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

@endsection
