			<!--news section-->
			<section>
				<div class="row news">
					<div class="container-fluid news-fluid">
						<div class="card-items card-news">
							@foreach ($posts as $post)
							<div class="card-item card-wrapper">
								<div class="image-content">
									<div class="card-image">
										<img src="{{ asset('')}}{{$post->img}}" alt="{{ $post->alt }}" class="card-img">
									</div>
								</div>
								<div class="card-content">
									<h3 class="card-title">{{ $post->title }}</h3>
									<p class="card-description">{{ $post->description }}</p>
									<a href="{{ url ('/blog') }}/{{$post->id }}">Детальніше<i class="arrow_right"></i></a>
								</div>
							</div>
							@endforeach
						</div>	
						<div class="min-card-button">
							<a class="btn btn-white " href="{{ url('/blog') }}">Поради фахівців</a>
						</div>

					</div>
				</div>
			</section>