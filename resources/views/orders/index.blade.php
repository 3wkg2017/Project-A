@extends('layouts.app')
@section('content')
<div id="orders" class="container-fluid text-center">
 <div class="row">
			<div class="col-xs-12 col-md-12">
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
					
					@foreach($carts)

						<tr>
							<td>
								
							</td>
							<td>
						
							</td>
							<td>

							</td>
							<td>
								
							</td>
							<td>
								
							</td>
							<td>
								
							</td>
							<td>
								
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
			</div> 

</div>
@endsection
