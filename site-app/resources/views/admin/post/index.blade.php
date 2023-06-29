@extends('admin.home')
@section('header', 'Публікації')
@section('content')
<section>
	<a href="{{ route('posts.create') }}" class="d-flex justify-content-end">+ Додати публікацію</a>
	<div class="wrapper">
		@if(count($posts))
		<table class="table table-striped">
			<thead class="text-center">
				<tr>

					<th>№</th>
					<th>Назва</th>
					<th>Ключові слова</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				@foreach($posts as $post)
				<tr>
					<td class="text-center">{{ $post->id }}</td>
					<td class="w-50 text-start">{{ $post->title }}</td>
					<td>{{ $post->keywords }}</td>
					<td class="d-flex flex-row align-items-center justify-content-around">
						<a class="" href=" {{ route('posts.show', $post->id) }}" class=""><img src="">Детально</a>
						<form action="{{ route('posts.destroy', $post->id) }}" method="POST"
							onclick=" return confirm('Видалити запис?')">
							@csrf
							@method('DELETE')
							<button type="submit" class="btn btn-danger ml-2"><img src="" class="">Видалити</button>
						</form>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
		{{ $posts->links() }}
		@else
		<p>Жодного запису не знайдено</p>
		@endif
	</div>


</section>

@endsection