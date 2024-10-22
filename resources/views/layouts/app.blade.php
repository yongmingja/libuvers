<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	<link href="{{ url('assets/images/favicon-32x32.png') }}" rel="icon" type="image/png" />
	<!--plugins-->
	@yield("style")
	<link href="{{ url('assets/plugins/simplebar/css/simplebar.css') }}" rel="stylesheet" />
	<link href="{{ url('assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet" />
	<link href="{{ url('assets/plugins/metismenu/css/metisMenu.min.css') }}" rel="stylesheet" />
	<link href="{{ url('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet" />
	<link href="{{ url('assets/plugins/select2/css/select2-bootstrap.min.css') }}" rel="stylesheet" />
	<!-- loader-->
	<link href="{{ url('assets/css/pace.min.css') }}" rel="stylesheet" />
	<script src="{{ url('assets/js/pace.min.js') }}"></script>
	<!-- Bootstrap CSS -->
	<link href="{{ url('assets/css/bootstrap.min.css') }}" rel="stylesheet" />
	<link href="{{ url('assets/css/app.css') }}" rel="stylesheet" />
	<link href="{{ url('assets/css/icons.css') }}" rel="stylesheet" />

    <!-- Theme Style CSS -->
    <link href="{{ url('assets/css/dark-theme.css') }}" rel="stylesheet" />
    <link href="{{ url('assets/css/semi-dark.css') }}" rel="stylesheet" />
    <link href="{{ url('assets/css/header-colors.css') }}" rel="stylesheet" />
    <title>{{ env('APP_NAME') }}</title>
</head>

<body>
	<!--wrapper-->
	<div class="wrapper">
		<!--start header -->
		@include("layouts.header")
		<!--end header -->
		<!--navigation-->
		@include("layouts.nav")
		<!--end navigation-->
		<!--start page wrapper -->
		@yield("wrapper")
		<!--end page wrapper -->
		<!--start overlay-->
		<div class="overlay toggle-icon"></div>
		<!--end overlay-->
		<!--Start Back To Top Button-->
        <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
		<!--End Back To Top Button-->
		{{-- <footer class="page-footer">
			<p class="mb-0">Copyright © 2021. All right reserved.</p>
		</footer> --}}
        @include('sweetalert::alert')
	</div>
	<!--end wrapper-->
	<!-- Bootstrap JS -->
	<script src="{{ url('assets/js/bootstrap.bundle.min.js') }}"></script>
	<!--plugins-->
	<script src="{{ url('assets/js/jquery.min.js') }}"></script>
	<script src="{{ url('assets/plugins/simplebar/js/simplebar.min.js') }}"></script>
	<script src="{{ url('assets/plugins/metismenu/js/metisMenu.min.js') }}"></script>
	<script src="{{ url('assets/plugins/select2/js/select2.min.js') }}"></script>
	<script src="{{ url('assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
	<!--app JS-->
	@yield("script")
	<script src="{{ url('assets/js/app.js') }}"></script>
</body>

</html>
