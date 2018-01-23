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
                  You are logged in!
                
                <a href="{{route('profile.edit')}}"><i class="fa fa-user" aria-hidden="true"></i></a>
                </div>
          
                Edit
               </a>
            </div>
        </div>
    </div>
</div>
</main>
@endsection
