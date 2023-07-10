@extends('user.home')
@section('header', 'Особисті дані')
@section('content')
<section>

	<div class="wrapper">
		<div class="d-flex flex-column mx-lg-4">
			@if(session()->has('success'))
			<div class="alert alert-success">
				{{ session()->get('success') }}
			</div>
			@endif
			<a href="{{ route('edit-user-data',  $user->id) }}">Редагувати</a>
			<div class="container-fluid border mx-auto my-3 ">

				<div class="row mx-4 d-flex flex-column ">
					<div class="d-flex flex-row p-2 bd-highlight justify-content-between ">
						<div class="col-4 mr-5">Ім'я:</div>
						<div class="col-8">{{ $user->name }}</div>
					</div>
					<div class=" d-flex flex-row p-2 bd-highlight justify-content-between">
						<div class="col-4 mr-5">Email:</div>
						<div class="col-8">{{ $user->email }}</div>
					</div>
					<div class=" d-flex flex-row p-2 bd-highlight justify-content-between">
						<div class="col-4 mr-5">Телефон:</div>
						<div class="col-8">{{ $user->phone }}</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection