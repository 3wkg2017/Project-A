	<!DOCTYPE html>
	<html lang="en">
	<head>


<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- <title>{{ config('app.name', 'RMC') }}</title> -->
 	<link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
	  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	</head>
	<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">
		<header>
			@include('layouts.menu')
		<div class="jumbotron text-center">
			  <h1>Red Meat Cafe</h1>
			  <p>We serve red meat only for real mens!</p>
			</div>
		</header>
		<br>
	    	@yield('content')
	    <footer class="container-fluid text-center">
	  <a href="#myPage" title="To Top">
	    <span class="glyphicon glyphicon-chevron-up"></span>
	  </a>
	  <p>Design by mens Konstantinas & Hugonas <a href="" title="Design"></a></p>
	</footer>
	 		@yield('js')
	</body>
	</html>
