@extends('admin.home')
@section('header', 'Особисті дані')
@section('content')
<section>
	<div class="d-flex justify-content-between mb-5">
		<a href="{{ route('doctors.index') }}">Назад</a>
		<a href="{{ route('doctors.edit',  $doctor->id) }}">Редагувати</a>
	</div>


	<div class="wrapper">
		<div class="">
			<img src="{{ asset('storage/image') }}/{{ $doctor->img }}" alt="{{ $doctor->fname }}" style="width: 150px;">
		</div>
		<div class="">
			<p> {{ $doctor->fname }} {{ $doctor->lname }} {{ $doctor->mname }}</p>
			<p>Спеціальність: {{ $specialities[$doctor->speciality_id-1]->name }}</p>
			<p>Кваліфікаційна категорія: {{ $doctor->category }}</p>
			<p> Стаж: {{ $doctor->experience }} років</p>
			<div>Опис: {!! $doctor->description !!}</div>
			@if($doctor->isOnline == 'on')
			<p> Працює онлайн</p>
			@endif
			<p>Ключові слова:
				<span class="">{{ $doctor->keywords }}</span>
			</p>
		</div>
	</div>
</section>
@endsection