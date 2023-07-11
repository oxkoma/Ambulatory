<div class="row">
	<nav class="navbar navbar-expand-lg bg-body-tertiary navbar-height">
		<div class="container-fluid navbar-container">
			<div class="col-md-3 col navbar-header">
				<div class="nav-brand">
					<a class="navbar-brand" href="{{ route('index') }}"><img src="{{ asset('assets/logo.jpg') }}"
							alt=""></a>
				</div>

				<button class="navbar-toggler" type="button" data-bs-toggle="collapse"
					data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
					aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
			</div>
			<div class="col-md-6 collapse navbar-collapse collapse navbar-flex" id="navbarSupportedContent">
				<ul class="navbar-nav navigate mb-2 mb-lg-0">
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
							aria-expanded="false">
							Поліклініка
						</a>
						<i class="arrow_down"></i>
						<div class="dropdown-menu">
							<ul>
								<li><a class="dropdown-item dropdown-child-item" href="{{ route('all') }}">Прийом
										лікарів</a><i class="arrow_right"></i>
								</li>
								<li><a class="dropdown-item dropdown-child-item"
										href="{{ route('online') }}">Онлайн-консультації</a><i class="arrow_right"></i>
								</li>
								<li><a class="dropdown-item dropdown-child-item" href="#">Вакцинація</a><i
										class="arrow_right"></i></li>

							</ul>
						</div>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
							aria-expanded="false">
							Діагностика
						</a>
						<i class="arrow_down"></i>
						<div class="dropdown-menu">
							<ul>
								<li><a class="dropdown-item dropdown-child-item"
										href="{{ route('price') }}">Аналізи</a><i class="arrow_right"></i></li>
								<li><a class="dropdown-item dropdown-child-item" href="#">УЗД</a><i
										class="arrow_right"></i></li>
								<li><a class="dropdown-item dropdown-child-item" href="#">Безоплатні
										дослідження</a><i class="arrow_right"></i></li>
							</ul>
						</div>
					</li>

					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
							aria-expanded="false">
							Про нас
						</a>
						<i class="arrow_down"></i>
						<div class="dropdown-menu">
							<ul>
								<li><a class="dropdown-item dropdown-child-item" href="#">Ліцензії,
										сертифікати</a><i class="arrow_right"></i></li>
								<li><a class="dropdown-item dropdown-child-item"
										href="{{ url('/contact') }}">Контакти</a><i class="arrow_right"></i></li>
							</ul>
						</div>
					</li>
					@if(Auth::user() && Auth::user()->usertype == 'user')

					<li class="nav-item dropdown cab">
						<a class="nav-link link-cab dropdown-toggle toggle" href="#" role="button"
							data-bs-toggle="dropdown" aria-expanded="false">
							{{ Auth::user()->name }}
						</a>
						<i class="arrow_down"></i>
						<div class="dropdown-menu">
							<ul>
								<li><a class="dropdown-item dropdown-child-item"
										href="{{ route('user.home-user') }}">Кабінет</a><i class="arrow_right"></i></li>
								<li><a class="dropdown-item dropdown-child-item" href="{{ route('user.logout') }}">Log
										out</a><i class="arrow_right"></i>
								</li>
							</ul>
						</div>
					</li>
					@endif
					@if(Auth::user() && Auth::user()->usertype == 'admin')
					<li><a class="dropdown-item dropdown-child-item" href="{{ route('user.logout') }}">Log
							out</a>
					</li>
					@endif
				</ul>
			</div>
			<div class="col-md-3 search-flex">
				<!-- <form class="search-container" action="/search" method="POST">
					<div class="search-group">
						<input id="search-box" type="text" class="search-box" name="q" />
						<label for="search-box"><span class="search-icon"><img
									src="{{ asset('/assets/search.png') }}"></span></label>
						<input type="submit" id="search-submit" />
					</div>
				</form> -->
				@if(!Auth::user())
				<a href="{{ route('user.login') }}"><img src="{{ asset('/assets/office.png') }}" alt=""></a>
				@endif
				<a class="btn btn-record" href="{{ route('all') }}">Запис на прийом</a>
			</div>
			<!-- </div> -->
	</nav>
</div>