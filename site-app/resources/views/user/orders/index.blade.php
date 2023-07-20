@extends('user.home')
@section('header', 'Мої записи')
@section('content')
<section>
	<div class="wrapper">
		<div class="d-flex flex-column mx-lg-4">
			@if(session()->has('success'))
			<div class="alert alert-success">
				{{ session()->get('success') }}
			</div>
			@endif
			@if(count($orders))

			@foreach($orders as $order)
			<div class="container-fluid border-bottom border-info mx-auto mb-5 pb-3">
				<div class="row mx-4 d-flex flex-column">
					<div class="d-flex flex-row p-2 bd-highlight justify-content-between ">
						<div class="col-4 mr-5">Дата:</div>
						<div class="col-8">{{ $order->date-format('d-m-Y') }}</div>
					</div>
					<div class=" d-flex flex-row p-2 bd-highlight justify-content-between">
						<div class="col-4 mr-5">Час:</div>
						<div class="col-8">{{ $order->time->format('H:i') }}</div>
					</div>
					<div class=" d-flex flex-row p-2 bd-highlight justify-content-between">
						<div class="col-4 mr-5">Амбулаторія:</div>
						<div class="col-8">{{ $ambulatories[$order->ambulatory_id-1]->name }},
							{{ $ambulatories[$order->ambulatory_id-1]->address }}</div>
					</div>
					<div class=" d-flex flex-row p-2 bd-highlight justify-content-between">
						<div class="col-4 mr-5">Лікар:</div>
						<div class="col-8">{{ $doctors[$order->doctor_id-1]->fname }}
							{{ $doctors[$order->doctor_id-1]->lname }} {{ $doctors[$order->doctor_id-1]->mname }}</div>
					</div>
					<div class=" d-flex flex-row p-2 bd-highlight justify-content-between">
						<div class="col-4 mr-5">Статус:</div>
						<div class="col-8">{{ $statuses[$order->status_id-1]->status }}</div>
					</div>
				</div>

			</div>

			@endforeach
			@else
			<p>Жодного запису не знайдено</p>
			@endif
		</div>
	</div>
</section>
@endsection