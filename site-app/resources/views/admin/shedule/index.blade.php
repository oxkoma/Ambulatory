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

		<!-- <div class="search-doctor d-flex flex-row mb-3">
			<form name="search-doctor" action="{{ route('search') }}" method="GET"
				class="select-body d-flex flex-row col-md-12">
				<div class="d-flex col-md-11">
					<input type="text" class="search-input form-control" name="s" id="s" value="{{request()->s}}">
				</div>
				<div class="d-flex col-md-1">
					<input type="submit" value="Знайти" class="btn btn-primary">
				</div>
			</form>
		</div> -->
		<a href="{{ route('shedules.create') }}" class="d-flex justify-content-end">+ Додати розклад</a>
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
					<td> {{ $shedule->date_start->format('d-m-Y') }}
					</td>
					<td> {{ $shedule->date_end->format('d-m-Y') }}
					</td>
					<td> {{ $shedule->time_start->format('H:i') }}
					</td>
					<td> {{ $shedule->time_end->format('H:i') }}
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