@extends('admin.home')
@section('header', 'Лікарі')
@section('content')
<section>
	<a href="{{ route('doctors.create') }}" class="d-flex justify-content-end">+ Додати лікаря</a>
	<div class="wrapper">
		@if(count($doctors))
		<table class="table table-striped" style="text-align: center;">
			<thead>
				<tr>
					<th></th>
					<th>ПІБ</th>
					<th>Спеціальність</th>
					<th>Стаж</th>
					<th>Категорія</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				@foreach($doctors as $doctor)
				<tr>
					<td><img src="{{asset('storage/image')}}/{{ $doctor->img}}" style="width: 100px;"
							alt="{{ $doctor->fname }}">
					</td>
					<td>{{ $doctor->fname }} {{ $doctor->lname }} {{ $doctor->mname }}</td>
					<td>{{ $specialities[$doctor->speciality_id - 1]->name }}</td>
					<td>{{ $doctor->experience }}</td>
					<td>{{ $doctor->category }}</td>
					<td>
						<form action="{{ route('doctors.destroy', $doctor->id) }}" method="POST">
							<a class="" href="{{ route('doctors.show', $doctor->id) }}" class=""><img
									src="">Детально</a>
							@csrf
							@method('DELETE')
							<button type="submit" class="btn btn-danger ml-2" onclick="return
								confirm('Видалити запис?')"><img src="" class="">Видалити</button>
						</form>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
		{{ $doctors->links('site.template-parts.custom-paginate') }}
		@else
		<p>Жодного запису не знайдено</p>
		@endif
	</div>


</section>

@endsection