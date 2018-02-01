@extends('layouts.app')
@section('content')
<div id="orders" class="container-fluid text-center">

				<table>
					<tr>
						<th>
							#
						</th>
						<th>
							Orders
						</th>
						<th>
							Customer
						</th>
						<th>
							Address
						</th>
						<th>
							Total Amount
						</th>
						<th>
							Tax Amount
						</th>
						<th>
							Date
						</th>

						@if(Auth::check() && Auth::user()->role == 'admin')
							<th>
								<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
							</th>

							<th>
								<i class="fa fa-trash-o" aria-hidden="true"></i>
							</th>
							
						@endif

					</tr>		
					
					@foreach($orders as $order)

						<tr>
							<td>
								{{$loop->iteration}}
							</td>
							<td>
								
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
									
					</table>
			
	

</div>
@endsection
