@extends('admin.home')
@section('header', 'Редагування даних')
@section('content')
<section>
	<div class="d-flex justify-content-between mb-5">
		<a href="{{ route('posts.show', $post->id) }}">Назад</a>
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

		<form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
			@csrf
			@method('PUT')

			<div class="row col-md-6">
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<strong>Заголовок</strong>
						<input type="text" name="title" value="{{ $post->title }}" class="form-control">
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<strong>Ключові слова</strong>
						<input type="text" name="keywords" value="{{ $post->keywords }}" class="form-control">
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<strong>Текст</strong>
						<textarea class="form-select w-100" name="description" id="description" rows="10">
						{{ $post->description }}
					</textarea>
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12 mt-3">
					<div class="form-group d-flex flex-column ">
						<strong class="py-2">Змінити фото </strong>
						<img src="{{asset('storage/post')}}/{{ $post->img}}" alt="{{ $post->alt }}"
							style="width: 150px;">
						<input type="file" name="img" class="form-control">
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<strong>Альтернативний текст до фотографії</strong>
						<input type="text" name="alt" value="{{ $post->alt }}" class="form-control">
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12 text-center">
					<button type="submit" class="btn mb-3"
						style="background-color:#17a2b8; color: white;">Зберегти</button>
				</div>
			</div>
		</form>
	</div>
</section>
@endsection
@push('styles')
<link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.min.css') }}">
@endpush


@push('scripts')
<script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}">
</script>
<script src="{{ asset('plugins/summernote/lang/summernote-uk-UA.min.js') }}"></script>
<script>
$(function() {
	$("#description").summernote({
		lang: 'uk-UA',
		height: 200
	});
});
</script>

@endpush