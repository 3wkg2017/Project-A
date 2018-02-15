@extends('layouts.app')
@section('content')
	<div class="alert alert-success">
  		<strong>Order successfully ordered</strong> 
  		<a href="{{ route('welcome') }}">
  			<button class="btn btn-success">To Dish</button>
  		</a>
	</div>
@endsection