@extends('site.layouts.master')
@section('content')
<!--section breadcrumbs-->
<section>
	<div class="row breadcrumbs">
		<div class="container-fluid ">
			<div class="breadcrumbs-wrapper">
				<ul class="breadcrumbs-ul">
					<li><a href="{{  route('index') }}"><img src="{{ asset('/assets/home.png') }}" alt=""></a></li>
					<li><i class="arrow-li"></i><a href="{{ route('all') }}">Прийом лікарів</a></li>
					<li><i class="arrow-li"></i>{{$doctor->fname}} {{$doctor->lname}} {{$doctor->mname}}</li>
				</ul>
			</div>

		</div>
	</div>
</section>
<!--section title-->
<section>
	@if(session()->has('success'))
	<div class="alert alert-success">
		{{ session()->get('success') }}
	</div>
	@endif
	<div class="row title">
		<div class="container-fluid">
			<div class="title-wrapper">
				<h1>{{$doctor->fname}} {{$doctor->lname}} {{$doctor->mname}}</h1>
			</div>
		</div>
	</div>
</section>
<!--section employee-->
<section>
	<div class="row employee">
		<div class="container-fluid">
			<div class="employee-wrapper">
				<div class="employee-item">
					<div class="employee-item-image">
						<img src="{{ asset('storage/image') }}/{{ $doctor->img }}" alt="{{ $doctor->fname }}">
					</div>
					<div class="employee-item-description">
						<p>{{ $specialities[$doctor->speciality_id-1]->name }}<br />
							Кваліфікаційна категорія: {{ $doctor->category }}<br />
							Стаж: {{ $doctor->experience }} років</p>
						<div>{!! $doctor->description !!}</div>
					</div>
				</div>
				<div class="employee-services">
					<div class="keywords-item">
						<div class="keyword">
							<p>{{ $specialities[$doctor->speciality_id-1]->name }}</p>

							<p class="kw">{{ $doctor->keywords }}</p>

						</div>
					</div>
					<div class="price">
						@foreach($prices as $price)
						@if ($doctor->speciality_id == $price->speciality_id)
						<div class="price-item">

							<div class="price-description">
								{{ $price->name }}
							</div>
							<div class="price-value">
								{{ $price->price }} грн
							</div>
						</div>
						@endif
						@endforeach

						<!-- <div class="price-detail">
										<a href="">Всі послуги та ціни<i class="arrow_right"></i></a>
									</div> -->
					</div>

					<div class="services-button">
						<a href="{{ route('online') }}" class="btn btn-green">Онлайн-консультація</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!--section doctor-appointment-->
<section>

	<div class="row appoint">
		<div class="doctor-appoint">


			<div class="doctor-slot">
				<div class="doctor-slot-title">
					<h4> Попередній запис </h4>
				</div>
				<div class="doctor-slot-description">
					<span>Заповніть форму та чекайте підтвердження<br>Поля із зірочкою обов'язкові для заповнення</span>
				</div>
				<form action="{{ url('/appointment/{doctor_id}') }}" name="appoint-form" class="appoint-form"
					method="POST">
					@csrf
					<div class="doctor-slot-date">
						<label for="date">Оберіть дату <sup><img src="{{ asset('assets/asterisk.png')}}"></sup> </label>
						<input type="date" id="date" name="date" value="date"
							min="{{ $shedules[$doctor->id-1]->date_start }}" max="" required>
					</div>

					<div class="doctor-slot-address">
						<span>Оберіть амбулаторію <sup><img src="{{ asset('assets/asterisk.png')}}"></sup> </span>
						<div class="doctor-slot-select-address">
							<select name="ambulatory_id" id="ambulatory_id" class="slot-select-address">
								@foreach ($shedules as $shedule)
								@if ($shedule->doctor_id == $doctor->id)
								<option value="{{ $shedule->ambulatory_id }}">
									{{ $ambulatories[$shedule->ambulatory_id-1]->address }}</option>
								@endif
								@endforeach
							</select>
						</div>
					</div>
					<div class="doctor-slot-contact">
						<div class="slot-contact-item">
							<label for="fname">Ваше ім'я <sup><img src="{{ asset('assets/asterisk.png')}}"></sup>
							</label>
							<input type="text" name="fname" style="text-align: left;"
								value="{{ auth()->user() ? auth()->user()->name : '' }}" required>
						</div>
						<div class=" slot-contact-item">
							<label for="lname">Ваше прізвище</label>
							<input type="text" name="lname">
						</div>
						<div class="slot-contact-item">
							<label for="phone">Номер телефона <sup><img src="{{ asset('assets/asterisk.png')}}"></sup>
							</label>
							<input type="tel" name="phone" placeholder="+38050-123-34-56"
								pattern="+380[0-9]{2}-[0-9]{3}-[0-9]{2}-[0-9]{2}"
								value="{{ auth()->user() ? auth()->user()->phone : '' }}" required>
						</div>
						<div class=" slot-contact-item">
							<label for="email">Email <sup>
									<img src="{{ asset('assets/asterisk.png')}}"></sup></label>
							<input type="email" name="email" value="{{ auth()->user() ? auth()->user()->email : '' }}">
						</div>
						<div class="slot-contact-item">
							<label for="description">Додатково</label>
							<textarea name="description" resize="none"></textarea>
						</div>
						<!-- <input type="hidden" name="email" value="{{ auth()->user() ? auth()->user()->email : '' }}"> -->
						<input type="hidden" name="user_id" value="{{ auth()->user()  ? auth()->user()->id : '' }}">
						<input type="hidden" name="doctor_id" value="{{$doctor->id}}">
					</div>
					<input type="submit" value="Відправити" name="btn-submit" class="btn-green btn-appoint">
				</form>
			</div>
		</div>

	</div>
</section>

@endsection