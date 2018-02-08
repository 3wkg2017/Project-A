@extends('layouts.app')
@section('content')

<div id="reservations" class="container-fluid text-center">

				<table class="table table-striped table-dark table-bordered table-responsive">
					<thead class="blue-grey lighten-4">
					<tr>
						<th class="thead-dark">#</th>
						<th class="thead-dark">Name</th>
						<th class="thead-dark">Number of persons</th>
						<th class="thead-dark">Date</th>
						<th class="thead-dark">Time</th>
						<th class="thead-dark">Phone</th>

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
					@foreach($reservations as $reservation)
						<tr>
							<td>
								{{$loop->iteration}}
							</td>
							<td>
								{{$reservation->name}}
							</td>
              <td>
								{{$reservation->persons}}
							</td>
							<td>
								{{$reservation->date}}
							</td>
							<td>
								{{$reservation->time}}
							</td>
							<td>
								{{$reservation->phone}}
							</td>


						@if(Auth::check() && Auth::user()->role == 'admin')
							
             				<td>
								<a href="{{ route('reservations.edit', $reservation) }}">
									<button class="btn btn-success">Edit</button>
								</a>
							</td>

							<td>
							<form class="order_form" action="{{ route('reservations.destroy', $reservation) }}" method="post" >
									{{ method_field('DELETE') }}
				    				{{ csrf_field() }}
				    			<button class="btn btn-danger">Delete</button>
							</form>
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
