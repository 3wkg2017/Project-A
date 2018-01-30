<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Theme Made By www.w3schools.com - No Copyright -->
  <title>Red Meat Cafe</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">
	<header>
		<nav class="navbar navbar-default navbar-fixed-top">
		  <div class="container">
		    <div class="navbar-header">
		      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </button>
		      <a class="navbar-brand" href="#myPage">RMC</a>
		    </div>
		    <div class="collapse navbar-collapse" id="myNavbar">
		      <ul class="nav navbar-nav navbar-right">
		        <li><a href="#about">ABOUT</a></li>
		        <li><a href="#portfolio">MEAT</a></li>
		        <li><a href="#contact">CONTACT</a></li>
		        <li><a href="{{ route('login') }}">LOGIN</a></li>
		        <li><a href="{{ route('register') }}">REGISTER</a></li>
		        <li><a  id="cart" href="{{ route('carts.index') }}">Cart (<span  class="cart-size">0</span>)-<span class="cart-total">0</span>$</a></li>
		       </ul>
		 
		      
		    </div>
		  </div>
		</nav>

		<div class="jumbotron text-center">
		  <h1>Red Meat Cafe</h1>
		  <p>We serve red meat only for real mens!</p>
		</div>
	</header>
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