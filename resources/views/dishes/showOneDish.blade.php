@extends('layouts.app')
@section('content')
<div id="dishes" class="container-fluid text-center">
  <div class="row">
			<div class="col-xs-12 col-md-12">
    			<div class="card">
    			  <img class="card-img-top" style="max-width: 100%" src="{{ $dish[0]->dish_picture }}" class="img-responsive">
    			  <div class="card-block">
    			    <h4 class="card-title">{{ $dish[0]->dish_name }}</h4>
    			    <p class="card-text">{{ $dish[0]->dish_description }}</p>
    			  </div>
    			  <div class="card-block">
                    
    			     <p class="card-text">{{ $dish[0]->dish_price }}</p>
    			  	 <a href="{{ route('orders.index') }}"><button class="btn btn-success">Back to Orders</button></a>
    			  	 <a href="{{ route('welcome') }}"> <button class="btn btn-success">Back to Dishes</button></a>

    			  	 <br>
    			  </div>
				
			</div>
			</div>
			
	</div>
</div>
@endsection

