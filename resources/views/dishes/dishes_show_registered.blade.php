@extends('layouts.app')
@section('content')
<main class="container">
				  	  <br>
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
			  	 <form class="cart_form" method="POST" action="{{route('carts.store')}}">
			  	  <button class="btn btn-success">Add to Cart</button>
			  	  	<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
			  	  	<input type="hidden" name="dish_id" value="{{$dish->id}}">
			  	 </form>
			  	  <br>
			  </div>

				@if(Auth::check() && Auth::user()->role == 'admin')
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

			
            {{ $dishes->render() }}


	</div>
</main>
<script type="text/javascript">

$(document).ready(function(){
  $("btn").on('click', function (e) {
  	 e.preventDefault();
  	 $.ajax({
  	 		url: $('.cart_form').attr('action'),
  	 		method: "POST",
            data: {
            	"dish_id": jQuery(".dish_id").html(),
            	"_token": jQuery("._token").html()
            },
              success: function (data) {

                var parsed = JSON.parse(data);
                console.log(parsed);
            },
             error: function(msg){
                    console.log(msg.responseText);
                    $('html').prepend(msg.responseText);
                }
  	 });

  });
});

</script>
@endsection
