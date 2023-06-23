@extends('site.layouts.master')
@section('content')
			<!--section breadcrumbs-->
			<section>
				<div class="row breadcrumbs">
					<div class="container-fluid ">
						<div class="breadcrumbs-wrapper">
							<ul class="breadcrumbs-ul">
							<li><a href="{{  route('index') }}"><img src="{{ asset('/assets/home.png') }}" alt=""></a></li>
								<li><i class="arrow-li"></i>Аналізи</li>
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
							<h1>Аналізи</h1>
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
								<div class="search-doctor">
									<form name="search-analise" action="{{ route('price-search') }}" method="GET" class="select-body">
										<input type="text" class="search-input form-control" name="s" id="s" value="{{request()->s}}">
										<input type="submit" value="Знайти" class="btn-green">
									</form>
								</div>	
							</div>
						</div>
					</div>
				</div>
			</section>
			<!--section price-list-->
			<section>
				<div class="row price-list">
					<div class="container-fluid">
						<div class="wrapper">
							@if(count($prices))
							<table class="table table-striped">
								<thead>
									<tr>
										<th>Перелік аналізів / матеріал / код</th>
										<th class="th_price">Ціна, грн</th>
										<th class="th_term">Строк<br><span class="span_term">(робочих днів)</span></th>
									</tr>
									
								</thead>
								<tbody>
									@foreach($prices as $price)
											<tr>
												<td class="td_analise">{{ $price->research }}</span> /
												@if($price->material) <span class="td_material">{{ $price->material }}</span> /@endif 
												<span class="td_code">{{ $price->kod }}</span></td>
													<td class="td_price">{{ $price->price }}</td>
													<td class="td_term">{{ $price->term }}</td>
											</tr>
									@endforeach
								</tbody>
							</table>
							{{ $prices->links('site.template-parts.custom-paginate') }}
							@else
								<p>Жодного запису не знайдено</p>
							@endif
						</div>
					</div>

				</div>
			</section>

@endsection