@extends('layouts.app')
@section('content')
	<main class="container">
	<div class="row">


			<form method="POST" action="">
				@foreach($carts as $cart)
				<div class="col-xs-12 col-md-4">
				<div class="card" style="width: 300px;">
				  <img class="card-img-top" style="max-width: 100%" src="{{$dish->dish_picture}}" alt="">
				  <div class="card-block">
				    <h4 class="card-title">{{$order->user_id}}</h4>
				    <p class="card-text">{{$order->total_amount}}</p>
            <h4 class="card-title">{{$order->user_id}}</h4>
            <p class="card-text">{{$order->total_amount}}</p>
            <h4 class="card-title">{{$order->user_id}}</h4>
            <p class="card-text">{{$order->total_amount}}</p>
				  </div>
				  <!-- <div class="card-block">
				      <p class="card-text">{{$dish->dish_price}}</p>
				  	  <button class="btn btn-success">Check out</button>
				  	  <br>
				  </div> -->


			</div>
			</div>
			@endforeach
		</form>
	</div>
</main>
@endsection
