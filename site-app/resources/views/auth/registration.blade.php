@extends('site.layouts.master')
@section('content')
<!--section title-->
<section>
	<div class="row title">
		<div class="container-fluid">
			<div class="title-wrapper">
				<h1>Реєстрація</h1>
			</div>
		</div>
	</div>
</section>
<!--section login-->
<section>
	<div class="row login">
		<div class="container-fluid">
			<div class="wrapper">
				<div class="login-items">
					<form action=" {{ route('user.registration') }}" name="login-form" class="login-form" method="POST">
						@csrf
						<div class="login-item">
							<label for="name">Ваше ім'я <sup><img src="{{ asset('assets/asterisk.png')}}"><sup> </label>
							<input type="text" name="name" value="" required>

						</div>
						@error('name')
						<span class="text-danger">{{ $message }}
						</span>
						@enderror
						<div class="login-item">
							<label for="phone">Ваш номер телефону <sup><img
										src="{{ asset('assets/asterisk.png')}}"><sup> </label>
							<input type="text" name="phone" required>

						</div>
						@error('phone')
						<span class="text-danger">{{ $message }}
						</span>
						@enderror
						<div class="login-item">
							<label for="email">Ваш email <sup><img src="{{ asset('assets/asterisk.png')}}"><sup>
							</label>
							<input type="email" name="email" required>

						</div>
						@error('email')
						<span class="text-danger">{{ $message }}
						</span>
						@enderror
						<div class="login-item">
							<label for="password">Ваш пароль <sup><img src="{{ asset('assets/asterisk.png')}}"><sup>
							</label>
							<input type="password" name="password" required>
						</div>
						@error('password')
						<span class="text-danger">{{ $message }}
						</span>
						@enderror
						<div class="login-item">
							<label for="password_confirmation">Підтвердіть пароль <sup><img
										src="{{ asset('assets/asterisk.png')}}"><sup> </label>
							<input type="password" name="password_confirmation" required>
						</div>

						<input type="submit" value="Зареєструватися" name="btn-submit" class="btn-green btn-appoint">
					</form>
				</div>
			</div>


		</div>
	</div>
</section>
@endsection