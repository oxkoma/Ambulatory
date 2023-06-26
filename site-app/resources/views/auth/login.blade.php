@extends('site.layouts.master')
@section('content')
<!--section title-->
<section>
	<div class="row title">
		<div class="container-fluid">
			<div class="title-wrapper">
				<h1>Ауторизація</h1>
			</div>
		</div>
	</div>
</section>
<!--section login-->
<section>
	<div class="row login">
		<div class="container-fluid">
			<div class="wrapper login-wrapper">
				<div class="login-items">
					<form action=" {{ route('user.login') }}" name="login-form" class="login-form" method="POST">
						@csrf
						<div class="login-item">
							<label for="login">Ваш email <sup><img src="{{ asset('assets/asterisk.png')}}"><sup> </label>
							<input type="email" name="login" require>
							
						</div>
						@error('email')
							<div class="alert alert-danger">{{ $message }}
							</div>
							@enderror
						<div class="login-item">
							<label for="password">Ваш пароль <sup><img src="{{ asset('assets/asterisk.png')}}"><sup> </label>
							<input type="text" name="password" require>
							
						</div>
						@error('password')
							<div class="alert alert-danger">{{ $message }}
							</div>
							@enderror
						<a href="{{ route('user.registration') }}">Зареєструватися</a>
						<input type="submit" value="Увійти" name="btn-submit" class="btn-green btn-appoint">
					</form>
				</div>
			</div>
			

		</div>
	</div>
</section>
@endsection