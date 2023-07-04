@extends('site.layouts.master')
@section('content')
<!--single-post-->
<!--section breadcrumbs-->
<section>
	<div class="row breadcrumbs">
		<div class="container-fluid ">
			<div class="breadcrumbs-wrapper">
				<ul class="breadcrumbs-ul">
					<li><a href="{{ url('/') }}"><img src="{{ asset('/assets/home.png') }}" alt="{{ $post->alt }}"></a>
					</li>
					<li><i class="arrow-li"></i><a href="{{url('/blog') }}">Поради фахівців</a></li>
					<li><i class="arrow-li"></i>{{ $post->title }}</li>
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
				<h1>{{ $post->title }}</h1>
			</div>
		</div>
	</div>
</section>
<!--section blog-list-->
<section>
	<div class="row post">
		<div class="container-fluid">
			<div class="post-wrapper">
				<div class="post-item">
					<img src="{{ asset('storage/post')}}/{{ $post->img }}" alt="">
					{!! $post->description !!}

				</div>
			</div>
		</div>
	</div>
</section>


@endsection