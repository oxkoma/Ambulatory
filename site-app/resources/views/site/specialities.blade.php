@extends('site.layouts.master')
@section('content')
			<!--section breadcrumbs-->
			<section>
				<div class="row breadcrumbs">
					<div class="container-fluid ">
						<div class="breadcrumbs-wrapper">
							<ul class="breadcrumbs-ul">
							<li><a href="{{  route('index') }}"><img src="{{ asset('/assets/home.png') }}" alt=""></a></li>
								<li><i class="arrow-li"></i>Всі лікарі</li>
							</ul>
						</div>	
					</div>		
				</div>		
			</section>
			<!--section title-->
			<section>
				<div class="row title">
					<div class="container-fluid">
						<div class="title-wrapper">
							<h1>Всі лікарі</h1>
						</div>
					</div>
				</div>
				
			</section>
			<!--section main-card-->
			<section>
			<div class="row min-card">
					<div class="container-fluid">						
						<div class="min-card-items">
							@foreach ($specialities as $speciality)
							<div class="min-card-item">
								<a href="{{ url('/search') }}?s={{ $speciality->name }}">
									<img src="{{ asset('/assets/speciality.png') }}" alt="icon">
									<p class="p-title">{{$speciality->name}}</p>
								</a>
							</div>
							@endforeach
						</div>
					</div>
				</div>
			</section>


@endsection