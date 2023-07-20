<!--section card-menu-->
<section>
	<div class="row card-menu">
		<div class="container-fluid">
			<!--start card-menu-->
			<div class="card-items">
				<div class="card-item">
					<div class="card-item-icon">
						<img src="{{ asset('/assets/c-bag.png') }}" alt="">
					</div>
					<div class="card-item-title">
						<h4 class="h4-menu">Поліклініка</h4>
						<hr class="hr">
					</div>
					<div class="card-item-menus">
						<ul>
							<li><a class="card-item-menu" href="{{ route('all') }}">Прийом лікарів</a><i
									class="arrow_right"></i></li>
							<li><a class="card-item-menu" href="{{ route('online') }}">Онлайн-консультації</a><i
									class="arrow_right"></i></li>
							<li><a class="card-item-menu" href="#">Вакцинація</a><i class="arrow_right"></i></li>
						</ul>
					</div>
				</div>
				<div class="card-item">
					<div class="card-item-icon">
						<img src="{{ asset('/assets/c-bag1.png') }}" alt="">
					</div>
					<div class="card-item-title">
						<h4 class="h4-menu">Діагностика</h4>
						<hr class="hr">
					</div>
					<div class="card-item-menus">
						<ul>
							<li><a class="card-item-menu" href="{{ route('price') }}">Аналізи</a><i
									class="arrow_right"></i></li>
							<li><a class="card-item-menu" href="#">УЗД</a><i class="arrow_right"></i></li>
							<li><a class="card-item-menu" href="#">Безоплатні дослідження</a><i class="arrow_right"></i>
							</li>
						</ul>
					</div>
				</div>
				<div class="card-item">
					<div class="card-item-icon">
						<img src="{{ asset('/assets/c-bag2.png') }}" alt="">
					</div>
					<div class="card-item-title">
						<h4 class="h4-menu">Амбулаторна хірургія</h4>
						<hr class="hr">
					</div>
					<div class="card-item-menus">
						<ul>
							<li><a class="card-item-menu" href="#">Хірургічні операції</a><i class="arrow_right"></i>
							</li>
							<li><a class="card-item-menu" href="#">Обробка ран</a><i class="arrow_right"></i></li>
							<li><a class="card-item-menu" href="#">Видалення новоутворень</a><i class="arrow_right"></i>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--end card-menu-->
</section>