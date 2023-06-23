@extends('site.layouts.master')
@section('content')
			<!--section breadcrumbs-->
			<section>
				<div class="row breadcrumbs">
					<div class="container-fluid ">
						<div class="breadcrumbs-wrapper">
							<ul class="breadcrumbs-ul">
								<li><a href="{{  route('index') }}"><img src="{{ asset('/assets/home.png') }}" alt=""></a></li>
								<li><i class="arrow-li"></i>Прийом лікарів</li>
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
							<h1>Прийом лікарів</h1>
						</div>
					</div>
				</div>
			</section>
			<!--section search-->
			<section>
				<div class="row select-container">
					<div class="container-fluid">
						<div class="select-items">
							<div class="select-item">
								<div class="select-header">
									<h4>Знайти лікаря</h4>
								</div>
								<div class="search-doctor">
									<form name="search-doctor" action="{{ route('search') }}" method="GET" class="select-body">
									
									<input type="text" class="search-input form-control" name="s" id="s" value="{{request()->s}}">
									<input type="submit" value="Знайти" class="btn-green">
									
								</form>
									<!-- <a href="{{  route('all') }}" class="btn-green">Всі лікарі</a> -->
								</div>	
							</div>
						</div>
					</div>
				</div>
			</section>
@include('site.template-parts.doctor-list')
@endsection	
