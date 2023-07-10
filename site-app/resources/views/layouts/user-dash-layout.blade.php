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


		<!-- Navbar -->
		<nav class="main-header navbar navbar-expand navbar-white navbar-light">
			<!-- Left navbar links -->
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
				</li>
				<li class="nav-item d-none d-sm-inline-block">
					<a href="{{ route('user.logout') }}" class="nav-link">Log out</a>
				</li>
			</ul>
		</nav>

		<!-- Main Sidebar Container -->
		<aside class="main-sidebar sidebar-light-cyan elevation-4">
			<!-- Brand Logo -->
			<a href="{{ route('index') }}" class="brand-link">
				<img src="{{ asset('admin/dist/img/AdminLTELogo.png') }}" alt="Logo"
					class="brand-image img-circle elevation-3" style="opacity: .8">
				<span class="brand-text font-weight-light">Сайт Амбулаторії</span>
			</a>

			<!-- Sidebar -->
			<div class="sidebar">
				<!-- Sidebar user panel (optional) -->
				<div class="user-panel mt-3 pb-3 mb-3 d-flex">
					<div class="info">
						<a href="#" class="d-block">{{Auth::user()->name}}</a>
					</div>
				</div>

				<!-- Sidebar Menu -->
				<nav class="mt-2">
					<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
						data-accordion="false">
						<!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

						<li class="nav-header">Кабінет користувача</li>
						<li class="nav-item">
							<a href="{{ route('user-data') }}"
								class="nav-link {{ (request()->is('cabinet*')) ? 'active' : '' }}">
								<i class="nav-icon fas fa-user-alt"></i>
								<p>
									Мої дані
								</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{ route('show-user-order') }}"
								class="nav-link {{ (request()->is('appoint-order*')) ? 'active' : '' }}">
								<i class="nav-icon fas fa-columns"></i>
								<p>
									Мої записи
								</p>
							</a>
						</li>

					</ul>
				</nav>
				<!-- /.sidebar-menu -->
			</div>
			<!-- /.sidebar -->
		</aside>

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