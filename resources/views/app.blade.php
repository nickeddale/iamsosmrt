<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="theme-color" content="#333"> {{-- android status bar color --}}

	<meta property="og:site_name" 
		content="IAMSOSMRT"/>
	<meta property="og:url"
		content="{{ Request::url() }}" />
	<meta property="og:locale" 
		content="en_US" />
	<meta property="article:author" 
		content="http://iamsosmrt.ca" />
	<meta property="article:publisher" 
		content="http://iamsosmrt.ca" />    


	@yield('meta-tags')

	<title>
		@yield('title')
	</title>

	<link href="{{ asset('/css/app.css') }}" rel="stylesheet">
	<link href="{{ asset('/css/style.css') }}" rel="stylesheet">

	<!-- Fonts -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'>
	<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" />

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>

	@include('partials.nav')	
	
	@yield('content')



	<!-- Scripts -->

	@yield('pre-scripts')

	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
	<script src="/js/tinymce/tinymce.min.js"></script>
	<script src="/js/min.js"></script>
	<script src="/js/cool-share/plugin.js"></script>

	@yield('post-scripts')

</body>
</html>
