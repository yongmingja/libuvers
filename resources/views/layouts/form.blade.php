@extends('layouts.app')

@section('wrapper')
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                @yield('breadcrumb')
            </div>
            <!--end breadcrumb-->
                    @yield('content')
        </div>
    </div>
@endsection
