			<!--section min-card-->
			<section>
				<div class="row min-card">
					<div class="container-fluid">
						<div class="min-card-header">
							<img src="{{ asset('/assets/c-bag.png') }}" alt="icon doctor">
							<h3>Прийом лікарів</h3>
						</div>
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
						<div class="min-card-button">
							<a href="{{  route('all') }}" class="btn btn-green">Знайти лікаря</a>
							<!-- <a class="btn btn-green" href="{{ route('search-sp') }}">Всі лікарі</a> -->
						</div>
					</div>
				</div>
			</section>