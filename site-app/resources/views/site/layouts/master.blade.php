<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
	<link rel="stylesheet" href="{{ asset('/css/style.css') }}">
	<link rel="stylesheet" href="{{ asset('/css/itc-slider.css') }}">
	<title>Ambulatory</title>
</head>

<body>
	<div class="container-fluid">
		<!--top-bar-->
		<div class="row">
			<div class="col-md-6 top-bar">
				<div class="nav-bar dropdown dropdown-nav">
					<button class="btn-dropdown"><span>м. Дніпро</span><i class="arrow_down"></i></button>
					<ul class="dropdown-ul">
						<div class="dropdown-child">
							<li><a class="dropdown-item dropdown-child-item" href="#">площа Соборна, 5</a><i
									class="arrow_right"></i></li>
							<li><a class="dropdown-item dropdown-child-item" href="#">пр. Гагаріна, 99</a><i
									class="arrow_right"></i></li>
							<li><a class="dropdown-item dropdown-child-item" href="#">Запорізьке шосе, 2А</a><i
									class="arrow_right"></i></li>
							<li><a class="dropdown-item dropdown-child-item" href="#">вул. Робоча, 146</a><i
									class="arrow_right"></i></li>
							<li><a class="dropdown-item dropdown-child-item" href="#">вул. Калинова, 26</a><i
									class="arrow_right"></i></li>
							<li><a class="dropdown-item dropdown-child-item" href="#">вул. Любарського, 25</a><i
									class="arrow_right"></i></li>
						</div>
					</ul>
				</div>
			</div>
			<div class="col-md-6 top-bar">
				<div class="nav-bar dropdown dropdown-nav">
					<button class="btn-dropdown"><span>(099) 298-35-45</span><i class="arrow_down"></i></button>
					<ul class="dropdown-ul">
						<div class="dropdown-child">
							<li><a class="dropdown-item dropdown-child-item" href="#">(099) 298-35-45</a><i
									class="arrow_right"></i></li>
							<li><a class="dropdown-item dropdown-child-item" href="#">(096) 395-51-07</a><i
									class="arrow_right"></i></li>
							<li><a class="dropdown-item dropdown-child-item" href="#">(056) 373-70-02</a><i
									class="arrow_right"></i></li>
							<li><a class="dropdown-item dropdown-child-item" href="#">(0562) 36-19-50</a><i
									class="arrow_right"></i></li>
						</div>
					</ul>
				</div>
			</div>
		</div>
		<!--main-menu-->
		<div class="row">
			<nav class="navbar navbar-expand-lg bg-body-tertiary navbar-height">
				<div class="container-fluid navbar-container">
					<div class="col-md-2 col navbar-header">
						<div class="nav-brand">
							<a class="navbar-brand" href="#">Navbar</a>
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
										<li><a class="dropdown-item dropdown-child-item"
												href="{{ route('all') }}">Прийом лікарів</a><i class="arrow_right"></i>
										</li>
										<li><a class="dropdown-item dropdown-child-item"
												href="{{ route('online') }}">Онлайн-консультації</a><i
												class="arrow_right"></i></li>
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
										<li><a class="dropdown-item dropdown-child-item" href="#">Контакти</a><i
												class="arrow_right"></i></li>
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
												href="{{ route('user.home-user') }}">Кабінет</a><i
												class="arrow_right"></i></li>
										<li><a class="dropdown-item dropdown-child-item"
												href="{{ route('user.logout') }}">Log out</a><i class="arrow_right"></i>
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
					<div class="col-md-4 search-flex">
						<form class="search-container" action="/search" method="POST">
							<div class="search-group">
								<input id="search-box" type="text" class="search-box" name="q" />
								<label for="search-box"><span class="search-icon"><img
											src="{{ asset('/assets/search.png') }}"></span></label>
								<input type="submit" id="search-submit" />
							</div>
						</form>
						@if(!Auth::user())
						<a href="{{ route('user.login') }}"><img src="{{ asset('/assets/office.png') }}" alt=""></a>
						@endif
						<a class="btn btn-record" href="{{ route('all') }}">Запис на прийом</a>
					</div>
					<!-- </div> -->
			</nav>
		</div>
		<!--MAIN CONTEINER-->
		<main>
			@yield('content')

		</main>
		<footer>
			<!--section contacts-->
			<section>
				<div class="row contact">
					<div class="container-fluid">
						<div class="contact-wrapper">
							<div class="contact-items">
								<div class="contact-item">
									<h4>Контакти:</h4>
									<div class="contact-hr"></div>
									<div class="contact-address">
										<p class="address">м. Дніпро, вул. Любарського, 25</p>
										<div class="phone">
											<p>(0562) 36-19-50</p>
											<p>(056) 373-70-02</p>
											<p>(096)395-51-07</p>
											<p>(099) 298-35-45</p>
										</div>
										<p class="email">ldc@dialab.dp.ua</p>
									</div>
								</div>
								<div class="contact-item">
									<h4>Наші адреси</h4>
									<div class="contact-hr"></div>
									<div class="contact-address">
										<p class="address">площа Соборна, 5</p>
										<p class="address">пр. Гагаріна, 99</p>
										<p class="address">Запорізьке шосе, 2А</p>
										<p class="address">вул. Робоча, 146</p>
										<p class="address">пр. Героїв, 32</p>
										<p class="address">вул. Калинова, 26</p>
										<p class="address">вул. Любарського, 25</p>
									</div>

								</div>
							</div>
							<div class="contact-items">
								<p class="info">Ліцензія МОЗ України АЕ №459359 від 14.08.2014</p>
								<p class="info">Вартість дзвінка відповідно до тарифів Вашого оператора</p>
							</div>
							<hr>
							<div class="copyright">
								<p>Copyright © 2002-2023 Лікувально-діагностичний центр медичної академії | Всі права
									захищені.<br />Використання матеріалів дозволяється за умови посилання (для
									інтернет-видань - гіперпосилання).</p>
							</div>
						</div>

					</div>
				</div>
			</section>
		</footer>

	</div>



	<script src="{{ asset('/js/itc-slider.js') }}" defer></script>
	<script src="{{ asset('/js/digits-counter.js') }}"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
	</script>

</body>

</html>