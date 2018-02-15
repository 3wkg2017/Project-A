@extends('layouts.app')
@section('content')
	<div class="alert alert-danger" >
  		<strong>Order was unsuccessul</strong> 
  		<a href="{{ route('welcome') }}">
  			<button class="btn btn-success">To Dish</button>
  		</a>
	</div>
@endsection