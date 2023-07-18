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
		<img src="{{ asset('assets/logo.jpg') }}" alt="Logo" class="" style="opacity: .8; width: 234px;">
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
			<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
				<!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

				<li class="nav-header">Кабінет користувача</li>
				<li class="nav-item">
					<a href="{{ route('user.home-user')}}"
						class="nav-link {{ (request()->is('user/home')) ? 'active' : '' }}">
						<i class="nav-icon fas fa-star"></i>
						<p>
							Головна
						</p>
					</a>
				</li>
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