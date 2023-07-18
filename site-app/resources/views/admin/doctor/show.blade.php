@extends('admin.home')
@section('header', 'Особисті дані')
@section('content')
<section class="col-md-12 mr-4">
	<div class="d-flex justify-content-between mb-5">
		<a href="{{ route('doctors.index') }}">Назад</a>

	</div>


	<div class="wrapper d-flex flex-column mb-4">
		<div class="d-flex flex-row col-md-12">
			<div class="col-md-2 mr-4">
				<img src="{{ asset('storage/image') }}/{{ $doctor->img }}" alt="{{ $doctor->fname }}"
					style="width: 100%; ">
			</div>
			<div class="col-md-8">
				<h4> {{ $doctor->fname }} {{ $doctor->lname }} {{ $doctor->mname }}</h4>
				<p>Спеціальність: {{ $specialities[$doctor->speciality_id-1]->name }}</p>
				<p>Кваліфікаційна категорія: {{ $doctor->category }}</p>
				<p> Стаж: {{ $doctor->experience }} років</p>
				@if($doctor->isOnline == 'on')
				<p style="color: teal;"> Працює онлайн</p>
				@endif
				<p>Ключові слова:
					<span class="">{{ $doctor->keywords }}</span>
				</p>
			</div>
		</div>

		<div class="my-5 col-md-6">Опис: <br />{!! $doctor->description !!}</div>
		<a href="{{ route('doctors.edit',  $doctor->id) }}" class="btn mb-4 col-md-2"
			style="background-color:#17a2b8; color: white;">
			Редагувати</a>
	</div>
</section>
@endsection