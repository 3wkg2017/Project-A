@extends('layouts.layout')
@section('content')
	<main class="container">
	<div class="row">
			
			
				<div class="col-xs-12 col-md-4">
					@foreach($carts as $cart)
					<?php
						$dish = $cart->dishes;
						//dd($cart);
					?>

				
					<div class="card">
					  <img class="card-img-top" style="max-width: 100%" src="{{$dish->dish_picture}}" alt="">
					  <div class="card-block">
					    <h4 class="card-title">{{$dish->dish_name}}</h4>
					    <p class="card-text">{{$dish->dish_description}}</p>
					  </div>
					  <br />
					 	<form action="{{ route('carts.destroy', $cart) }}" method="post" >
					 		    {{ method_field('DELETE') }}
    							{{ csrf_field() }}
    					<button class="btn btn-danger">X</button>
					 	</form>
					  <br />
					</div>
				
					@endforeach
					 <div class="card-block">
					  	<p class="card-text">{{$dish->dish_price}}</p>

						@if(Auth::check() && Auth::user()->role == 'user') <--------------------------------BAIGEM CIA
								<form action="{{route('orders.create', $carts)}}" method="post">
					  				<button class="btn btn-success">Check out</button>
					  			</form>
						@else
								{{route('login'}}
						@endif

					  	
					  	<br>
					 </div>
					
				</div>
			
	</div>
</main>
@endsection