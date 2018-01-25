@extends('layouts.app')
@section('content')
<main>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                         </div>
                    @endif
               
                
                <a href="{{route('profile.edit')}}"><button class="btn btn-success">Edit Profile</button></a>
                 @if(Auth::user()->role == 'admin')
                          <a href="{{route('dishes_create')}}"><button class="btn btn-success">Cook Dish</button></a>
                          <button class="btn btn-success hide">View Orders</button>
                          <button class="btn btn-success hide">Edit Customers</button>
                 @endif


                </div>
          
              
               </a>
            </div>
        </div>
    </div>
</div>
</main>
@endsection
