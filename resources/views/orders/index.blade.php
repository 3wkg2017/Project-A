@extends('layouts.app')
@section('content')
<div id="orders" class="container-fluid text-center">

				<table class="table table-striped table-dark table-bordered table-responsive">
					<thead class="blue-grey lighten-4">
					<tr>
						<th class="thead-dark">#</th>
						<th class="thead-dark">Orders</th>
						<th class="thead-dark">Customer</th>
						<th class="thead-dark">Address</th>
						<th class="thead-dark">Total Amount</th>
						<th class="thead-dark">Tax Amount</th>
						<th class="thead-dark">Date</th>

						@if(Auth::check() && Auth::user()->role == 'admin')
							<th>
								<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
							</th>
							<th>
								<i class="fa fa-trash-o" aria-hidden="true"></i>
							</th>
						@endif

					</tr>
				</thead>
				<tbody>
					@foreach($orders as $order)

						<tr>
							<td>
								{{$loop->iteration}}
							</td>
							<td>

							@if(count($carts)>0)
								<ul>
								@foreach($carts as $cart)
									@if($order->id == $cart->order_id)
										<?php $dish = $cart->dishes;?>
										<li>
											<a href="{{ route('welcome') }}">{{$dish->dish_name}}	</a>
										</li>
									@endif
								@endforeach
								</ul>
							@endif

							</td>
							<td>
								{{$user->name}}
							</td>

							<td>
								{{$user->address}}
							</td>
							<td>
								{{$order->total_amount}}
							</td>
							<td>
								{{$order->tax_amount}}
							</td>
							<td>
								{{$order->created_at}}
							</td>


						@if(Auth::check() && Auth::user()->role == 'admin')
							<td>
								<a href="#">
									<button class="btn btn-success">Edit</button>
								</a>
							</td>

							<td>
								<a href="#">
									<button class="btn btn-danger">Delete</button>
								</a>
							</td>

						@endif
						</tr>

					@endforeach
				</tbody>
					</table>
					<div class="">
						<a href="{{ route('welcome') }}">
							<button class="btn btn-default">To Dishes</button>
						</a>
					</div>

</div>
@endsection
