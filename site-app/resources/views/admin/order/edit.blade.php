@extends('admin.home')
@section('header', 'Редагувати запис')
@section('content')
<section>
	<div class="d-flex justify-content-between mb-5">
		<a href="{{ route('orders.index') }}">Назад</a>
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
		<form action="{{ route('orders.update', $order->id) }}" method="POST" enctype="multipart/form-data">
			@csrf
			@method('PUT')

			<div class="row col-md-6">
				<div class="col-xs-12 col-sm-12 col-md-12 ">
					<div class="form-group d-flex flex-row">
						<span class="col-md-3">Дата</span>
						<input type="date" id="date" class="col-md-6" name="date"
							value="{{ $order->date->format('Y-m-d') }}">
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group d-flex flex-row ">
						<span class="col-md-3">Час</span>
						<input type="time" name="time" class="col-md-6"
							value="{{ $order->time ? $order->time->format('H:i:s') : $order->time }}">
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group d-flex flex-row ">
						<span class="col-md-3">Статус</span>
						<select name="status_id" id="" class="col-md-6">
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
						<span class="col-md-3">Амбулаторія</span>
						<select name="ambulatory_id" id="" class="col-md-6">
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
						<span class="col-md-3">Доктор</span>
						<select name="doctor_id" id="" class="col-md-6">
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
						<span class="col-md-3">Ім'я</span>
						{{ $order->fname }}
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group d-flex flex-row ">
						<span class="col-md-3">Прізвище</span>
						{{ $order->lname }}
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group d-flex flex-row ">
						<span class="col-md-3">Телефон</span>
						{{ $order->phone }}
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group d-flex flex-row ">
						<span class="col-md-3">Email</span>
						{{ $order->email }}
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group d-flex flex-row ">
						<span class="col-md-3">Опис</span>
						{{ $order->description }}
					</div>
				</div>
				<button type="submit" class="btn btn-primary mb-3">Зберегти</button>
			</div>
		</form>
	</div>
</section>
@endsection