@extends('layouts.layout')
@section('content')
	<main class="container">
	<div class="row">
			
			<form method="POST" action=""> 
				<div class="col-xs-12 col-md-4">
					@foreach($carts as $cart)
					<?php
						$dish = $cart->dishes;
						//dd($dish);
					?>

				
					<div class="card" style="width: 300px;">
					  <img class="card-img-top" style="max-width: 100%" src="{{$dish->dish_picture}}" alt="">
					  <div class="card-block">
					    <h4 class="card-title">{{$dish->dish_name}}</h4>
					    <p class="card-text">{{$dish->dish_description}}</p>
					  </div>
					 
					</div>
				
					@endforeach
					 <div class="card-block">
					  	<p class="card-text">{{$dish->dish_price}}</p>
					  	<button class="btn btn-success">Check out</button>
					  	<br>
					 </div>
					
				</div>
			</form>
	</div>
</main>
@endsection