@extends('site.layouts.master')
@section('content')
<!--section breadcrumbs-->
<section>
	<div class="row breadcrumbs">
		<div class="container-fluid ">
			<div class="breadcrumbs-wrapper">

				<ul class="breadcrumbs-ul">
					<li><a href="{{ url('/') }}"><img src="./assets/home.png" alt="home"></a></li>
					<li><i class="arrow-li"></i>Поради фахівців</li>
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
				<h1>Поради фахівців</h1>
			</div>
		</div>
	</div>
</section>
<!--section blog-list-->
<section>
	<div class="row blog-list">
		<div class="container-fluid">
			<div class="blog-list-wrapper">
				@foreach ($posts as $post)
				<div class="blog-list-item">
					<div class="blog-item-image">
						<img src="{{ asset('storage/post')}}/{{ $post->img }}" alt="{{ $post->alt }}">
					</div>
					<div class="blog-item-content">
						<h4><a href="{{ url ('/blog') }}/{{$post->id }}" class="title-h4">{{ $post->title }}</a></h4>
						<div class="blog-content-text">{!! $post->description !!}</div>

						<a href="{{ url ('/blog') }}/{{$post->id }}">Детальніше<i class="arrow_right"></i></a>
					</div>
				</div>
				@endforeach
			</div>
			{{ $posts->links() }}
		</div>
	</div>
</section>
@endsection