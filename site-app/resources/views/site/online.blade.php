@extends('site.layouts.master')
@section('content')
	<!--section breadcrumbs-->
	<section>
		<div class="row breadcrumbs">
			<div class="container-fluid ">
				<div class="breadcrumbs-wrapper">
					<ul class="breadcrumbs-ul">
						<li><a href="{{  route('index') }}"><img src="{{ asset('/assets/home.png') }}" alt=""></a></li>
						<li><i class="arrow-li"></i>Онлайн-консультації лікарів</li>
					</ul>
				</div>	
			</div>		
		</div>		
	</section>

	<!--section online-info-->
	<section>
		<div class="row online">
			<div class="container-fluid">
				<div class="online-wrapper">
					<div class="col-md-6 col-sm-12 online-description">
						<h3>Онлайн-консультації лікарів</h3>
						<p>Онлайн-консультації лікарів – це можливість отримати консультацію фахівця без відвідування клініки за допомогою відеозв'язку.
							Для проведення онлайн консультації, вам необхідно завантажити на Ваш смартфон програму Medcard24, за допомогою якої буде проведена онлайн консультація:</p>
						<ul class="online-app">
							<li><a href=""><img src="{{ asset('/assets/gplay.png') }}" alt=""></a></li>
							<li><a href=""><img src="{{ asset('/assets/appstore.png') }}" alt=""></a></li>
						</ul>
							<a class="btn btn-green">Інструкція з підключення</a>
					</div>
					<div class="online-img">
						<img src="{{ asset('/assets/female-doctor-hospital-wearing-mask 1.png') }}" alt="">
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection