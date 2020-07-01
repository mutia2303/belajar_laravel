<!doctype html>
<html lang="en">

<head>
	<title>Dashboard | Klorofil - Free Bootstrap Dashboard Template</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="{{ asset('backend/assets/vendor/bootstrap/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('backend/assets/vendor/font-awesome/css/font-awesome.min.css') }}">
	<link rel="stylesheet" href="{{ asset('backend/assets/vendor/linearicons/style.css') }}">
	<link rel="stylesheet" href="{{ asset('backend/assets/vendor/chartist/css/chartist-custom.css') }}">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="{{ asset('backend/assets/css/main.css') }}">
	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
	<link rel="stylesheet" href="{{ asset('backend/assets/css/demo.css') }}">
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="{{ asset('backend/assets/img/apple-icon.png') }}">
	<link rel="icon" type="image/png" sizes="96x96" href="{{ asset('backend/assets/img/favicon.png') }}">
	<!-- TOASTR -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
	<!-- CDN DATATABLE -->
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">
	<!-- CKEDITOR -->
	<style>
		.ck-editor__editable_inline {
		    min-height: 250px;
		}
	</style>

	@yield('header')
</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<!-- NAVBAR -->
		@include('layouts.includes._navbar')
		<!-- END NAVBAR -->
		<!-- LEFT SIDEBAR -->
		@include('layouts.includes._sidebar')
		<!-- END LEFT SIDEBAR -->
		<!-- MAIN -->
		@yield('content')
		<!-- END MAIN -->
		<div class="clearfix"></div>
		<footer>
			<div class="container-fluid">
				<p class="copyright">Shared by <i class="fa fa-love"></i><a href="https://bootstrapthemes.co">BootstrapThemes</a>
                </p>
			</div>
		</footer>
	</div>
	<!-- END WRAPPER -->
	<!-- Javascript -->
	<script src="{{ asset('backend/assets/vendor/jquery/jquery.min.js') }}"></script>
	<script src="{{ asset('backend/assets/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('backend/assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
	<script src="{{ asset('backend/assets/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js') }}"></script>
	<script src="{{ asset('backend/assets/vendor/chartist/js/chartist.min.js') }}"></script>
	<script src="{{ asset('backend/assets/scripts/klorofil-common.js') }}"></script>
	<!-- CKEDITOR -->
	<script src="{{ asset('content/ckeditor.js') }}"></script>
	<!-- SWEET ALERT -->
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> 
	<!-- CDN DATATABLE -->
	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>
	<!-- TOASTR -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
	<script>
		@if (Session::has('sukses'))
		    toastr.success("{{ Session::get('sukses') }}", "Sukses")
		@endif
		@if (Session::has('error'))
		    toastr.warning("{{ Session::get('error') }}", "Gagal")
		@endif
	</script>

	@yield('footer')
	
</body>

</html>
