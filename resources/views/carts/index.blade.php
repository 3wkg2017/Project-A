@extends('layouts.app')
@section('content')
	<main class="container">
	<div class="row">
				<div class="col-xs-12 col-md-4">
						

					@foreach($carts as $cart)

							<?php $dish = $cart->dishes;?>
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
								
							<div class="card-block">
						  	<p class="card-text">{{$dish->dish_price}}</p>
						
					@endforeach

			
					
						@if(Auth::check()) 
							
					  		@if(count($carts)==0)
					  			<br />
								<div class="alert alert-info">
						  			<strong>Note: </strong> No more dishes left in your bascket
								</div>
									<a href="{{ route('welcome') }}">
										<button class="btn btn-default">Back to Dishes</button>
									</a>
							@else
							<form action="{{ route('orders.store') }}" method="post">
								{{ csrf_field() }}
					  			<button class="btn btn-success">Check out</button>
					  		</form>
							@endif


						@else
							@if(count($carts)==0)
								<br />
								<div class="alert alert-info">
						  			<strong>Note: </strong> No more dishes left in your bascket
								</div>
									<a href="{{ route('welcome') }}">
										<button class="btn btn-default">Back to Dishes</button>
									</a>
							@else
							<a href="{{ route('login') }}">
								<button class="btn btn-default">Check out</button>
							</a>
							@endif		
						@endif
					  	<br>
					 </div>
				</div>
	</div>
</main>
@endsection