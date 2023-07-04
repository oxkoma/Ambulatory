<!--section doctors-card-->
<section>
	<div class="row doctors">
		<div class="container-fluid">
			<div class="doctor-wrapper">
				@if(count($doctors))
				@foreach ($doctors as $doctor)
				<div class="doctor-card-list">
					<div class="doctor-card-wrapper">
						<div class="doctor-card-content">
							<div class="doctor-card-online">
								@if($doctor->isOnline == 'on')
								<a href="" class="btn-blink"><img src="{{ asset('/assets/vector-online.png') }}"></a>
								@endif
							</div>
							<div class="doctor-card-image">
								<img src="{{ asset('storage/image') }}/{{ $doctor->img }}" alt="{{ $doctor->fname }}">
								<div class="btn-write">
									<a href="{{ url('/appointment/'.$doctor->id) }}" class="btn-green">Записатись</a>
								</div>
							</div>
							<div class="doctor-card-main">
								<h4>{{ $doctor->fname }} {{ $doctor->lname }} {{ $doctor->mname }}</h4>
								<p>{{ $specialities[$doctor->speciality_id-1]->name }}</p>
								<p>Кваліфікаційна категорія: <span>{{  $doctor->category }}</span></p>
								<p>Стаж: <span>{{ $doctor->experience}} років</span></p>
								<div>{!! $doctor->description !!}</div>

							</div>
						</div>
					</div>
				</div>
				@endforeach
				{{ $doctors->links() }}
				@else
				<p>Жодного запису не знайдено</p>
				@endif
			</div>
		</div>
	</div>
</section>