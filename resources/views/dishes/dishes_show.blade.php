@extends('layouts.layout')
@section('content')
<main class="container">
	<div class="row">
	
			@foreach($dishes as $dish)
			<div class="col-xs-12 col-md-4">
			<div class="card" style="width: 300px;">
			  <img class="card-img-top" style="max-width: 100%" src="{{$dish->dish_picture}}" alt="">
			  <div class="card-block">
			    <h4 class="card-title">{{$dish->dish_name}}</h4>
			    <p class="card-text">{{$dish->dish_description}}</p>
			  </div>
			  <div class="card-block">
			      <p class="card-text">{{$dish->dish_price}}</p>
			  	  <button class="btn btn-success">Add to Cart</button>
			  	  <br>
			  </div>

				@if(Auth::user()->role == 'admin')
				<div class="card-block">
					<a href="{{ route('dishes_edit', $dish->id) }}">
						<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
					</a>
					<a href="{{route('dishes_destroy', $dish->id) }}">
						<i class="fa fa-trash-o" aria-hidden="true"></i>
					</a>
				</div>
				@endif
			</div>
			</div>
			@endforeach
		
	</div>
</main>
@endsection