@extends('admin.home')
@section('header', 'Додати лікаря')
@section('content')
<section>
	<div class="d-flex justify-content-between mb-5">
		<a href="{{ route('doctors.index') }}">Назад</a>
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

		<form action="{{ route('doctors.store') }}" method="POST" enctype="multipart/form-data">
			@csrf

			<div class="row col-md-6">
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<strong>Прізвище:</strong>
						<input type="text" name="fname" value="{{ old('fname') }}" class="form-control">
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<strong>Ім'я:</strong>
						<input type="text" name="lname" value="{{ old('lname') }}" class="form-control">
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<strong>По-батькові:</strong>
						<input type="text" name="mname" value="{{ old('mname') }}" class="form-control">
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group w-100">
						<strong>Спеціальність:</strong>
						<select name="speciality_id" id="speciality_id" class="w-100 py-2">
							@foreach($specialities as $speciality)
							<option value="{{ $speciality->id }}">
								{{ $speciality->name }}</option>
							@endforeach
						</select>
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12 ">
					<div class="form-group">
						<strong>Опис:</strong><br />
						<textarea class="form-select w-100" name="description" id="description" rows="3">
						{{ old('description') }}</textarea>
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<strong>Ключові слова:</strong>
						<input type="text" name="keywords" value="{{ old('keywords') }}" class="form-control">
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<strong>Стаж:</strong>
						<input type="text" name="experience" value="{{ old('experience') }}" class="form-control">
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<strong>Лікарська категорія:</strong>

						<input type="text" name="category" value="{{ old('category') }}" class="form-control">
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<strong>Працює онлайн </strong>
						<input type="checkbox" name="isOnline" id="" class="ml-2">
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12 mt-3">
					<div class="form-group d-flex flex-column ">
						<strong class="py-2">Завантажити фото </strong>
						<input type="file" name="img" class="form-control">
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