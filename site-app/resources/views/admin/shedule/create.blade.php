@extends('admin.home')
@section('header', 'Створити запис')
@section('content')
<section>
	<div class="d-flex justify-content-between mb-5">
		<a href="{{ route('shedules.index') }}">Назад</a>
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
		<form action="{{ route('shedules.store') }}" method="POST">
			@csrf

			<div class="col-xs-12 col-sm-12 col-md-12">
				<div class="form-group d-flex flex-row ">
					<span class="col-md-2">Амбулаторія</span>
					<select name="ambulatory_id" id="ambulatory_id" class="col-md-3">
						@foreach($ambulatories as $ambulatory)
						<option value="{{ $ambulatory->id }}">{{ $ambulatory->name }},
							{{ $ambulatory->address }}</option>
						@endforeach
					</select>
				</div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-12">
				<div class="form-group d-flex flex-row ">
					<span class="col-md-2">Доктор</span>
					<select name="doctor_id" id="doctor_id" class="col-md-3">
						@foreach($doctors as $doctor)
						<option value="{{ $doctor->id }}">{{ $doctor->fname }}<br />
							{{ $doctor->lname }} {{ $doctor->mname }}</option>
						@endforeach
					</select>
				</div>
			</div>
			<div class="row col-md-12">
				<div class="col-xs-12 col-sm-12 col-md-12 ">
					<div class="form-group d-flex flex-row">
						<span class="col-md-2">Дата (початок)</span>
						<input type="date" name="date_start" class="col-md-3" value="{{ old('date_start') }}">
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12 ">
					<div class="form-group d-flex flex-row">
						<span class="col-md-2">Дата (кінець)</span>
						<input type="date" name="date_end" class="col-md-3" value="{{ old('date_end') }}">
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group d-flex flex-row ">
						<span class="col-md-2">Час (початок)</span>
						<input type="time" name="time_start" class="col-md-3" value="{{ old('time_start') }}">
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group d-flex flex-row ">
						<span class="col-md-2">Час (кінець)</span>
						<input type="time" name="time_end" class="col-md-3" value="{{ old('time_end') }}">
					</div>
				</div>

				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group d-flex flex-row ">
						<span class="col-md-2">Інтервал</span>
						<input type="text" name="time_interval" class="col-md-3" value="{{ old('time_interva') }}">
					</div>
				</div>
				<button type="submit" class="btn btn-primary mb-3">Зберегти</button>
			</div>
		</form>
	</div>
</section>
@endsection