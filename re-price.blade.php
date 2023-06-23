@extends('site.layouts.master')
@section('content')
			<!--section breadcrumbs-->
			<section>
				<div class="row breadcrumbs">
					<div class="container-fluid ">
						<div class="breadcrumbs-wrapper">
						<li><a href="{{  route('index') }}"><img src="{{ asset('/assets/home.png') }}" alt=""></a></li>
							<ul class="breadcrumbs-ul">
								<li><i class="arrow-li"></i><a href="">Діагностика</a></li>
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
									<form name="search-analise" action="" method="GET" class="select-body">
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
									@foreach($researches as $research)
										<tr class="tr_title">
											<th colspan="3" class="th_title">
												{{ $categories[$research->category_research_id-1]->name}}
											</th>
										</tr>	
										@if($subcategories[$research->subcategory_research_id-1]->name != 'null')
											<tr class="tr_title">
											<th colspan="3" class="th_title">
												{{ $subcategories[$research->subcategory_research_id-1]->name}}
											</th>
										@endif
								</thead>
								<tbody>
									@foreach($prices as $price)
										@if(($price->category == $research->category_research_id) && ($price->sub_category == $research->subcategory_research_id))
											<tr>
												<td class="td_analise">{{ $price->research }}</span> 
												/@if($price->material) <span class="td_material">{{ $price->material}}</span> /@endif 
												<span class="td_code">{{ $price->kod }}</span></td>
													<td class="td_price">{{ $price->price }}</td>
													<td class="td_term">{{ $price->term }}</td>
											</tr>
										@endif
									@endforeach
								</tbody>
								
									@endforeach
							</table>
							@else
								<p>Жодного запису не знайдено</p>
							@endif
						</div>
					</div>

				</div>
			</section>

@endsection