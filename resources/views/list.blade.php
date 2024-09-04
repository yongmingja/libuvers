@extends('layouts.app')

@section('style')
    <link href="{{ url('assets/plugins/datatable/css/datatables.min.css') }}" rel="stylesheet" />
@endsection

@section('wrapper')
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">All Chart of Accounts</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Chart of Accounts</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->
        </hr>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-12">
                                <a href="" class="btn btn-primary mb-3 mb-lg-0"><i class='bx bxs-plus-square'></i>New</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="datatables table table-striped table-bordered border-top-1" style="width:100%">
                        <thead>
                            <tr>
                                <th class="text-center align-middle"><input class="form-check-input" type="checkbox" value=""></th>
                                <th>Code</th>
                                <th>Name</th>
                                <th>Type</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr data-action="">
                                <td class="text-center"><input class="form-check-input" type="checkbox" value=""></td>
                                <td>code</td>
                                <td>name</td>
                                <td>type</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
    <script src="{{ url('assets/plugins/datatable/js/datatables.min.js') }}"></script>
    <script src="{{ url('assets/plugins/datatable/js/pdfmake.min.js') }}"></script>
    <script src="{{ url('assets/plugins/datatable/js/vfs_fonts.js') }}"></script>
@endsection
