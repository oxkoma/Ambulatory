@extends('admin.home')
@section('header', 'Перегляд публікації')
@section('content')
<section>



	<div class="wrapper" style="width: 70%; ">
		<div class="d-flex justify-content-between mb-5">
			<a href="{{ route('posts.index') }}">Назад</a>
			<a href="{{ route('posts.edit',  $post->id) }}">Редагувати</a>
		</div>
		<div class="">
			<img src="{{ asset('storage/post') }}/{{ $post->img }}" alt="{{ $post->alt }}">
		</div>
		<div>
			<h3>{{ $post->title }}</h3>
			<p>{!! $post->description !!}</p>
		</div>
	</div>
</section>
@endsection