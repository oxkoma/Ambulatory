@extends('user.home')
@section('header', 'Редагування даних')
@section('content')
<!-- <x-loader></x-loader> -->
<section>
	<div class="d-flex justify-content-between mb-5">
		<a href="{{ route('user-data') }}">Назад</a>
	</div>
	<div class="wrapper">
		@if ($errors->any())
		<div class="alert alert-danger">
			<strong>Упс!</strong> Проблеми з введенням даних.<br><br>
			<ul>
				@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
		@endif

		<form action="{{ route('update-user-data', $user->id) }}" method="POST">
			@csrf
			@method('PUT')

			<div class="row col-md-6">
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<strong>Ім'я:</strong>
						<input type="text" name="name" value="{{ $user->name }}" class="form-control">
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<strong>Email:</strong>
						<input type="text" name="email" value="{{ $user->email }}" class="form-control">
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<strong>Телефон:</strong>
						<input type="text" name="phone" value="{{ $user->phone }}" class="form-control">
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12 text-center">
					<button type="submit" class="btn btn-primary mb-3">Зберегти</button>
				</div>
			</div>
		</form>
	</div>
</section>
@endsection