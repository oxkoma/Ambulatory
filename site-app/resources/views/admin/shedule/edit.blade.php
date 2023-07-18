@extends('admin.home')
@section('header', 'Редагувати запис')
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
		<form action="{{ route('shedules.update', $shedule->id) }}" method="POST">
			@csrf
			@method('PUT')

			<div class="col-xs-12 col-sm-12 col-md-12">
				<div class="form-group d-flex flex-row ">
					<span class="col-md-2">Амбулаторія</span>
					<select name="ambulatory_id" id="ambulatory_id" class="col-md-3">
						@foreach($ambulatories as $ambulatory)
						@if($ambulatory->id == $shedule->ambulatory_id)
						<option value="{{ $ambulatory->id }}" selected>{{ $ambulatory->name }},
							{{ $ambulatory->address }}
						</option>
						@else
						<option value="{{ $ambulatory->id }}">{{ $ambulatory->name }},
							{{ $ambulatory->address }}</option>
						@endif
						@endforeach
					</select>
				</div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-12">
				<div class="form-group d-flex flex-row ">
					<span class="col-md-2">Доктор</span>
					<select name="doctor_id" id="doctor_id" class="col-md-3">
						@foreach($doctors as $doctor)
						@if($doctor->id == $shedule->doctor_id)
						<option value="{{ $doctor->id }}" selected>{{ $doctor->fname }}<br />
							{{ $doctor->lname }} {{ $doctor->mname }}</option>
						@else
						<option value="{{ $doctor->id }}">{{ $doctor->fname }}<br />
							{{ $doctor->lname }} {{ $doctor->mname }}</option>
						@endif
						@endforeach
					</select>
				</div>
			</div>
			<div class="row col-md-12">
				<div class="col-xs-12 col-sm-12 col-md-12 ">
					<div class="form-group d-flex flex-row">
						<span class="col-md-2">Дата (початок)</span>
						<input type="date" name="date_start" class="col-md-3"
							value="{{  $shedule->date_start->format('Y-m-d')  }}">
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12 ">
					<div class="form-group d-flex flex-row">
						<span class="col-md-2">Дата (кінець)</span>
						<input type="date" name="date_end" class="col-md-3"
							value="{{ $shedule->date_end->format('Y-m-d') }}">
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group d-flex flex-row ">
						<span class="col-md-2">Час (початок)</span>
						<input type="time" name="time_start" class="col-md-3" value="{{ $timeStart }}">
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group d-flex flex-row ">
						<span class="col-md-2">Час (кінець)</span>
						<input type="time" name="time_end" class="col-md-3" value="{{ $timeEnd }}">
					</div>
				</div>

				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group d-flex flex-row ">
						<span class="col-md-2">Інтервал</span>
						<input type="text" name="time_interval" class="col-md-3" value="{{ old(time_interval) }}">

					</div>
				</div>
				<button type="submit" class="btn mb-3" style="background-color:#17a2b8; color: white;">Зберегти</button>
			</div>
		</form>
	</div>
</section>
@endsection