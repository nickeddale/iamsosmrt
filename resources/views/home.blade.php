@extends('app')

@section('content')

<div class="container-fluid">
		<div class="content col-md-12">

			@foreach( $posts as $index => $post )

			@if ( $index == 0 )

				<section id="nav-reveal">
			
					<div class="post-cover" style="background-image: url(' {{ asset('img/uploads/' . $post->photo_name) }} ')" ></div>

					<span class="scrim scrim-first"></span>

					<div class="title-container">
						<div class="title title-first">
							<a class="color-inherit" href="{{ url('post', $post->id) }}">
								<strong>
									<h1 class="post-title">{{ str_limit($post->title, 40, '...') }}</h1>
								</strong>
							</a>
							<h3 class="post-tagline">{{ $post->title }}</h3>
							<time class="post-date">{{ $post->created_at->format('F j Y') }}</time>
						</div>	
					</div>

				</section>

			@endif

			@unless ( $index == 0 )

				<section class="post">

					<hr>

					<ul class="category">
						<a href="{{ url('category', ['category' => $post->category->name] ) }}"><li><strong>{{ $post->category->name }}</strong></li></a>
					</ul>

					<div class="post-cover" style="background-image: url(' {{ asset('img/uploads/' . $post->photo_name) }} ')" ></div>

					<div class="title-container">

						<div class="title title-card">
							<a href="{{ url('post', $post->id) }}">
								<strong>
									<h1 class="post-title">{{ str_limit($post->title, 40, '...') }}</h1>
								</strong>
							</a>
							<h3 class="post-tagline">{{ $post->title }}</h3>
							<time class="post-date">{{ $post->created_at->format('F j Y') }}</time>
						</div>
						<span class="scrim scrim-card"></span>
					</div>

				</section>	

			@endunless	


			@endforeach	

		</div>
</div>
@endsection
