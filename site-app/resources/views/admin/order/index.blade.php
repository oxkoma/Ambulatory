@extends('admin.home')
@section('header', 'Записи на прийом')
@section('content')
<section>
	<div class="wrapper">
		@if(session()->has('success'))
		<div class="alert alert-success">
			{{ session()->get('success') }}
		</div>
		@endif
		@if(count($orders))
		<table class="table table-striped" style="text-align: center; width: 100%;">
			<thead>
				<tr>
					<th></th>
					<th>Статус</th>
					<th>Дата</th>
					<th>Час</th>
					<th>Амбулаторія</th>
					<th>Доктор</th>
					<th>Ім'я</th>
					<th>Прізвище</th>
					<th>Телефон</th>
					<th>Email</th>
					<th>Додатково</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				@foreach($orders as $order)
				<tr>
					<td> {{ $order->id }} </td>
					<td>
						@if($order->status->id == '1')
						<strong style="color: green;">
							{{ $order->status->status }}
						</strong>
						@else {{ $order->status->status	}}
						@endif
					</td>
					<td> {{ $order->date }}
					</td>
					<td> {{ $order->time }}
					</td>
					<td> {{ $order->ambulatory->name }}
					</td>
					<td> {{ $order->doctor->fname }}
					</td>
					<td> {{ $order->fname }}
					</td>
					<td> {{ $order->lname }}
					</td>
					<td> {{ $order->phone }}
					</td>
					<td> {{ $order->email }}
					</td>
					<td> {{ $order->description	}}
					</td>
					<td>
						<form action="{{ route('orders.destroy', $order->id) }}" method="POST"><a class=""
								href="{{ route('orders.edit', $order->id) }}" class=""><img src="">Змінити</a>
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
			</tbody>
		</table> {{	$orders->links('site.template-parts.custom-paginate') }}

		@else <p>Жодного запису не знайдено</p>@endif
	</div>
</section>@endsection