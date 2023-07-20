<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>@yield('title')</title>
	<!-- <base href="{{ \URL::to('/') }}"> -->
	@include('layouts.styles')
	@stack('styles')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
	<div class="wrapper">
		<div class="loader">
			<img src="{{ asset('assets/rings.svg') }}" alt="">
		</div>

		@include('layouts.navbar-user')

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<div class="content-header">
				<div class="container-fluid">
					<div class="row mb-2">
						<div class="col-sm-6">
							<h1 class="m-0">@yield('header')</h1>
						</div><!-- /.col -->
					</div><!-- /.row -->
				</div><!-- /.container-fluid -->
			</div>
			<!-- /.content-header -->

			<!-- Main content -->
			<section class="content">
				<div class="container-fluid">
					<!-- Small boxes (Stat box) -->
					<div class="row">

					</div>
					<!-- /.row -->
					<!-- Main row -->
					<div class="row">
						@yield('content')
					</div>
					<!-- /.row (main row) -->
				</div><!-- /.container-fluid -->
			</section>
			<!-- /.content -->
		</div>
		<!-- /.content-wrapper -->
		@include('layouts.footer')

		<!-- Control Sidebar -->
		<aside class="control-sidebar control-sidebar-dark">
			<!-- Control sidebar content goes here -->
		</aside>
		<!-- /.control-sidebar -->
	</div>
	<!-- ./wrapper -->

	@include('layouts.scripts')
	@stack('scripts')
</body>

</html>