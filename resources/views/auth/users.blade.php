@extends('layouts.app')
@section('content')
<div id="users" class="container-fluid text-center">

				<table class="table table-striped table-dark table-bordered table-responsive">
					<thead class="blue-grey lighten-4">
					<tr>
						<th class="thead-dark">User ID</th>
						<th class="thead-dark">Name Surname</th>
						<th class="thead-dark">EMail</th>
						<th class="thead-dark">Date of birth</th>
						<th class="thead-dark">Phone number</th>
						<th class="thead-dark">Address</th>

						@if(Auth::check() && Auth::user()->role == 'admin')
							<th>
								<i class="fa fa-trash-o" aria-hidden="true"></i>
							</th>
						@endif
					</tr>
				</thead>
				<tbody>
					@foreach($users as $user)
						<tr>
							<td>
								{{$user->id}}
							</td>
							<td>
								{{$user->name}} {{$user->surname}}
							</td>

							<td>
								{{$user->email}}
							</td>
							<td>
								{{$user->date_of_birth}}
							</td>
							<td>
								{{$user->phone_number}}
							</td>
							<td>
								{{$user->address}} {{$user->city}} {{$user->zip_code}} {{$user->c_name}}
							</td>


						@if(Auth::check() && Auth::user()->role == 'admin')
							<td>
								@if($user->role != 'admin')
								<a href="{{ route('profile.destroy', $user->id) }}">
									<button class="btn btn-danger">Delete</button>
								</a>
								@endif

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
