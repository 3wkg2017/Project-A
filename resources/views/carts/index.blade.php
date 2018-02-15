@extends('layouts.app')
@section('content')
	<main class="container">
	<div class="row">
		<br />
					@foreach($carts as $cart)
						<div class="col-xs-12 col-md-4">
							<?php $dish = $cart->dishes;?>
								<div class="card" style="width: 300px;">
									  <img class="card-img-top" style="max-width: 100%" src="{{$dish->dish_picture}}" alt="">
									  <div class="card-block">
									    <h4 class="card-title">{{$dish->dish_name}}</h4>
									    <p class="card-text">{{$dish->dish_description}}</p>

									  <br />
									 	<form class="cart_form" action="{{ route('carts.destroy', $cart) }}" method="post" >
									 		    {{ method_field('DELETE') }}
				    							{{ csrf_field() }}
				    					<button class="btn btn-danger">X</button>
									 	</form>
									  <br />
									</div>
								</div>
							<div class="card-block">
						  	<p class="card-text">{{$dish->dish_price}}</p>
							</div>
						</div>
					@endforeach


	</div>
						<div class="row">
						@if(Auth::check())

					  		@if(count($carts)==0)
					  			<br />
								<div class="alert alert-info">
						  			<strong>Note: </strong> There are no dishes in your basket
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
						  			<strong>Note: </strong> There are no dishes in your basket
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

</main>
@endsection
