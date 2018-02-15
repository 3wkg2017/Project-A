<div class="">
	<a class="pull-right" href="{{ route('dishes_reorder', 1) }}">
		<i class="fa fa-sort-amount-desc fa-2x" aria-hidden="true"></i>
    </a>
    
    <a class="pull-right" href="{{ route('dishes_reorder', 0) }}">
        <i class="fa fa-sort-amount-asc fa-2x" aria-hidden="true"></i>
    </a>
</div>

<div id="dishes" class="container-fluid text-center">

			@foreach($dishes->chunk(3) as $chunk)
            <div class="row">
                @foreach($chunk as $dish)
            			<div class="col-xs-12 col-md-4">
            			<div class="card text-center center-block" style="width: 300px;">
            			  <img class="img-responsive" style="max-width: 100%;"  src="{{$dish->dish_picture}}" alt="">
                        </div>
            			  <div class="card-block">
            			    <h4 class="card-title">{{$dish->dish_name}}</h4>
            			    <p class="card-text">{!! $dish->dish_description !!}</p>
            			  </div>
            			  <div class="card-block">
            			      <p class="card-text">{{$dish->dish_price}}</p>
            			  	 <form class="cart_form" method="POST" action="{{route('carts.store')}}">
            			  	  <button class="btn btn-danger bloody">Add to Cart</button>
            			  	  	<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
            			  	  	<input type="hidden" name="dish_id" value="{{$dish->id}}">
            			  	 </form>
            			  	 <br>
            			  </div>
            				@if(Auth::check() && Auth::user()->role == 'admin')
            				<div class="card-block">
            					<a href="{{ route('dishes_edit', $dish->id) }}">
            						<i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i>
            					</a>
            					<a href="{{route('dishes_destroy', $dish->id) }}">
            						<i class="fa fa-trash-o fa-2x" aria-hidden="true"></i>
            					</a>

            				</div>
            			 @endif
                  </div>
                @endforeach
                </div>
			@endforeach
      {{ $dishes->render() }}
</div>

@section('js')
  <script type="text/javascript">
    $(document).ready(function(){
        $('.btn').on('click', function(e){
            // console.log('clicked cart');
            e.preventDefault();
			var form = $(this).parent();
            //console.log(form.serialize());
            $.ajax({
                url: form.attr('action'),
                method: 'POST',
                data: form.serialize(),
                success: function(data){

                    var cartTotal = $('#cart .cart-total'),
                        cartSize = $('#cart .cart-size'),
                        currentPrice = cartTotal.text(),
                        currentSize = cartSize.text(),
                        totalPrice = (currentPrice*1) + data.price,
                        totalSize = (currentSize*1) + 1;

                        cartTotal.text(totalPrice.toFixed(2));
                        cartSize.text(totalSize);

                  //  console.log(data);
                },
                error: function(msg){
                      console.log(msg.responseText);
                    $('html').prepend(msg.responseText);
                }
            })

            /* form.ajaxForm({
                url: form.attr('action'),
                type: 'post'
            }); */
        });

    });
    </script>
@endsection
