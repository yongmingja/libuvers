@extends('layouts.app')

@section('style')
    <link href="{{ url('assets/plugins/datatable/css/datatables.min.css') }}" rel="stylesheet" />
@endsection

@section('wrapper')
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            @yield('breadcrumb')
        </div>
        <!--end breadcrumb-->
        <hr/>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-12">
                                @yield('header-button')
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
                            @yield('thead')
                        </thead>
                        <tbody>
                            @yield('tbody')
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
