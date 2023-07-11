<!--section slider-->
<section class="">
	<div class="row slider">
		<!--start slider-->
		<div class="itc-slider" id="slider-1" data-slider="itc-slider" data-autoplay="true">
			<div class="itc-slider-wrapper">
				<div class="itc-slider-items">
					<div class="itc-slider-item">
						<!-- Контент 1 слайда -->
						<div class="itc-slider-content">
							<h3 class="slider-title">Всі види аналізів <br />для дітей та дорослих</h3>
							<p class="slider-description">Достовірні результати лабораторних досліджень у власній
								лабораторії на діагностичному обладнанні експертного класу.</p>
							<a href="{{ route('price') }}" class="btn btn-green">Перелік всіх аналізів</a>
						</div>
						<div class="itc-slider-image"><img
								src="{{ asset('/assets/medium-shot-scientist-with-chemical-substance 1.png') }}"
								alt="scientist-with-chemical-substance">
						</div>
					</div>
					<div class="itc-slider-item">
						<!-- Контент 2 слайда -->
						<div class="itc-slider-content">
							<h3 class="slider-title">Безоплатна медична допомогау рамках договору з НСЗУ</h3>
							<p class="slider-description">Обирай свого сімейного лікаря, оформлюй декларацію та отримуй
								безкоштовні медичні послуги у межах декларації. </p>
							<a class="btn btn-green">Детальніше</a>
						</div>
						<div class="itc-slider-image"><img src="{{ asset('/assets/expressive-senior.png') }}"
								alt="expressive-senior-woman">
						</div>
					</div>
					<div class="itc-slider-item">
						<!-- Контент 3 слайда -->
						<div class="itc-slider-content">
							<h3 class="slider-title">Всі види аналізів <br />для дітей та дорослих</h3>
							<p class="slider-description">Достовірні результати лабораторних досліджень у власній
								лабораторії на діагностичному обладнанні експертного класу.</p>
							<a href="{{ route('price') }}" class="btn btn-green">Перелік всіх аналізів</a>
						</div>
						<div class="itc-slider-image"><img
								src="{{ asset('/assets/medium-shot-scientist-with-chemical-substance 1.png') }}"
								alt="scientist-with-chemical-substance">
						</div>
					</div>
				</div>
			</div>
			<ol class="itc-slider-indicators">
				<!-- data-slide-to="0" – для перехода к 1 слайду -->
				<li class="itc-slider-indicator" data-slide-to="0"></li>
				<!-- data-slide-to="1" – для перехода к 2 слайду -->
				<li class="itc-slider-indicator" data-slide-to="1"></li>
				<!-- data-slide-to="2" – для перехода к 3 слайду -->
				<li class="itc-slider-indicator" data-slide-to="2"></li>
			</ol>
			<!-- Кнопки для перехода к предыдущему и следующему слайду -->
			<button class="itc-slider-btn itc-slider-btn-prev"></button>
			<button class="itc-slider-btn itc-slider-btn-next"></button>
		</div>
		<!--end slider-->
	</div>
</section>