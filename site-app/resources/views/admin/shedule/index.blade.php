@extends('admin.home')
@section('header', 'Розклад')
@section('content')
<section>
	<div class="wrapper">
		@if(session()->has('success'))
		<div class="alert alert-success">
			{{ session()->get('success') }}
		</div>
		@endif
		<a href="{{ route('doctors.create') }}" class="d-flex justify-content-end">+ Додати розклад</a>
		<table class="table table-striped text-center" style="width: 100%;">
			<thead>
				<tr>
					<th>Амбулаторія<br />
						<form action="{{ route('ambulatories-sort') }}" method="GET">
							@csrf
							<select name="ambulatory" id="status" onchange="this.form.submit()">
								<option value="0">Всі</option>
								@foreach($ambulatories as $ambulatory)
								@if ($ambulatory->id == $ambulatory_id)
								<option value="{{ $ambulatory->id }}" selected>{{ $ambulatory->name }}</option>
								@else
								<option value="{{ $ambulatory->id }}">{{ $ambulatory->name }}</option>
								@endif
								@endforeach
							</select>
						</form>

					</th>
					<th>Доктор</th>
					<th>Дата (початок)</th>
					<th>Дата (кінець)</th>
					<th>Час (початок)</th>
					<th>Час (кінець)</th>
					<th>Интервал</th>
					<th></th>
				</tr>
			</thead>

			<tbody>
				@if(count($shedules))
				@foreach($shedules as $shedule)
				<tr class="text-center">
					<td> {{ $shedule->ambulatory->name }}
					</td>
					<td> {{ $shedule->doctor->fname }} <br />
						{{ $shedule->doctor->lname }} {{ $shedule->doctor->mname }}
					</td>
					<td> {{ $shedule->date_start }}
					</td>
					<td> {{ $shedule->date_end }}
					</td>
					<td> {{ $shedule->time_start }}
					</td>
					<td> {{ $shedule->time_end }}
					</td>
					<td> {{ $shedule->time_interval }}
					</td>
					<td>
						<form action="{{ route('shedules.destroy', $shedule->id) }}" method="POST"><a class=""
								href="{{ route('shedules.edit', $shedule->id) }}" class=""><img src="">Змінити</a>
							@csrf
							@method('DELETE')
							<button type="submit" class="btn btn-danger ml-2" onclick="return
								confirm('Видалити запис?')">
								<img src="" class="">Видалити
							</button>
						</form>
					</td>
				</tr>
				@endforeach
				@else <p>Жодного запису не знайдено</p>@endif
			</tbody>
		</table> {{	$shedules->links('site.template-parts.custom-paginate') }}


	</div>
</section>


@endsection