@extends('app')

@section('meta-tags')

	<meta property="og:title"
		content="{{ $post->title }}" />
	<meta property="og:description" 
		content="{{ $post->tagline }}" />
	<meta property="og:type" 
		content="article" />
	<meta property="og:image"
	content="{{ asset('img/uploads/' . $post->photo_name) }}" />


@endsection

@section('content')

	<div class="post-cover" id="nav-reveal" style="background-image: url(' {{ asset('img/uploads/' . $post->photo_name) }} ')" ></div>

	<div class="container-fluid">

			
			<div class="post-full col-md-10 col-md-offset-1">
				<div class="socialShare"></div>
				<article id="article" class="">	
					<div class="post-header" >
						<h1 class="post-title">{{ $post->title }}</h1>
						<h4 class="post-tagline">{{ $post->title }}</h4>
						<time class="post-date">{{ $post->created_at->format('F j Y') }}</time>
					</div>
					
					

					<section class="post-content">
						{!! $post->content !!}
					</section>
					
				</article>
			</div>
		
		<hr>


		<div class="col-md-10 col-md-offset-1">
			@include('partials.disqus')
		</div>
	</div>



@endsection

@section('post-scripts')

	<script>

		var options = {
			twitter: true,
			facebook: true,
			googlePlus: true
		};

		$('.socialShare').shareButtons(options);

	</script>

@endsection


