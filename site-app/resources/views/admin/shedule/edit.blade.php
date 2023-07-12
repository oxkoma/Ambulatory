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

			<div class="row col-md-6">
				<div class="col-xs-12 col-sm-12 col-md-12 ">
					<div class="form-group d-flex flex-row">
						<span style="width: 120px;">Дата</span>
						<input type="date" id="date" name="date" value="{{ $order->date }}">
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group d-flex flex-row ">
						<span style="width: 120px;">Час</span>
						<input type="time" name="time" value="{{ $order->time }}">
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group d-flex flex-row ">
						<span style="width: 120px;">Статус</span>
						<select name="status_id" id="">
							@foreach($statuses as $status)
							@if($status->id == $order->status_id)
							<option value="{{ $status->id }}" selected>{{ $status->status }}</option>
							@else
							<option value="{{ $status->id }}">{{ $status->status }}</option>
							@endif
							@endforeach
						</select>
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group d-flex flex-row ">
						<span style="width: 120px;">Амбулаторія</span>
						<select name="ambulatory_id" id="">
							@foreach($ambulatories as $ambulatory)
							@if($ambulatory->id == $order->ambulatory_id)
							<option value="{{ $ambulatory->id }}" selected>{{ $ambulatory->name }},
								{{ $ambulatory->address }}
							</option>
							@else
							<option value="{{ $ambulatory->id }}">{{ $ambulatory->name }},
								{{ $ambulatory->address }}
							</option>
							@endif
							@endforeach
						</select>
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group d-flex flex-row ">
						<span style="width: 120px;">Доктор</span>
						<select name="doctor_id" id="">
							@foreach($doctors as $doctor)
							@if($doctor->id == $order->doctor_id)
							<option value="{{ $doctor->id }}" selected>{{ $doctor->fname }}
								{{ $doctor->lname }}
							</option>
							@else
							<option value="{{ $doctor->id }}">{{ $doctor->fname }}
								{{ $doctor->lname }}
							</option>
							@endif
							@endforeach
						</select>
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group d-flex flex-row ">
						<span style="width: 120px;">Ім'я</span>
						{{ $order->fname }}
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group d-flex flex-row ">
						<span style="width: 120px;">Прізвище</span>
						{{ $order->lname }}
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group d-flex flex-row ">
						<span style="width: 120px;">Телефон</span>
						{{ $order->phone }}
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group d-flex flex-row ">
						<span style="width: 120px;">Email</span>
						{{ $order->email }}
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group d-flex flex-row ">
						<span style="width: 120px;">Опис</span>
						{{ $order->description }}
					</div>
				</div>
				<button type="submit" class="btn btn-primary mb-3">Зберегти</button>
			</div>
		</form>
	</div>
</section>
@endsection