@extends('site.layouts.master')
@section('content')
<section>
	<div class="row title">
		<div class="container-fluid">
			<div class="title-wrapper">
				<h1>Контакти</h1>
			</div>
		</div>
	</div>
</section>
<section>
	<div class="row contact-block">
		<div class="container-fluid">
			<div class="wrapper">
				<div class="contact-block-items">
					<div class="contact-block-item">
						<div class="contact-item-title">
							<img src="{{ asset('assets/location.png') }}" alt="">
							<span>Адреса:</span>
						</div>
						<hr class="contact-block-hr">
						<div class="contact-item-content">
							<p>49009 м. Дніпро</p>
							<p>площа Соборна, 5</p>
						</div>
					</div>
					<div class="contact-block-item">
						<div class="contact-item-title">
							<img src="{{ asset('assets/clock.png') }}" alt="">
							<span>Графік роботи:</span>
						</div>
						<hr class="contact-block-hr">
						<div class="contact-item-content">
							<p><span>Пн-пт:</span> 7:30-13:00</p>
							<p><span>Сб:</span> 8:00-12:00</p>
							<p><span>Нд:</span> вихідний</p>
						</div>
					</div>
					<div class="contact-block-item">
						<div class="contact-item-title">
							<img src="{{ asset('assets/telephone.png') }}" alt="">
							<span>Телефони:</span>
						</div>
						<hr class="contact-block-hr">
						<div class="contact-item-content">
							<p>(098) 007-34-09</p>
							<p>(095) 146-87-57</p>
							<p>(056) 370-24-93</p>
							<p>(056) 373-70-04</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!--section google-map-->
<section>
	<div class="row map">
		<div class="container-fluid">
			<div class="wrapper">
				<div class="map-container">
					<iframe
						src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2645.869333724416!2d35.06178037682882!3d48.459036571280784!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40dbe2d04b66d909%3A0xe81512e44671a8f4!2z0L_Quy4g0KHQvtCx0L7RgNC90LDRjywgNSwg0JTQvdC10L_RgCwg0JTQvdC10L_RgNC-0L_QtdGC0YDQvtCy0YHQutCw0Y8g0L7QsdC70LDRgdGC0YwsIDQ5MDAw!5e0!3m2!1sru!2sua!4v1687259658431!5m2!1sru!2sua"
						height="450" style="border:0;" allowfullscreen="" loading="lazy"
						referrerpolicy="no-referrer-when-downgrade"></iframe>
				</div>
			</div>
		</div>
	</div>
</section>
<!--section contact form-->
<section>
	<div class="row contact-block">
		<div class="container-fluid">
			<div class="wrapper">
				<div class="contact-form">
					<h3>У Вас є запитання?</h3>
					<p>Заповніть форму і ми з Вами зв’яжемося!</p>
					<form action="" method="GET" class="frm">
						<div class="contact-data-item">
							<div class="contact-data">
								<input type="text" placeholder="Ваше ім’я" class="c-name">
								<input type="tel" placeholder="Ваш телефонний номер" class="c-phone">
								<input type="email" placeholder="Ваш email" class="c-email">
							</div>
							<div class="textarea-container">
								<textarea name="message" id="" placeholder="Ваше питання" class="c-text"></textarea>
							</div>

						</div>
						<input type="submit" class="btn-green" value="Надіслати">
					</form>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection