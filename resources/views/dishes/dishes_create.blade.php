@section('content')
@extends('layouts.app')


<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Add new dish</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}


                        <div class="form-group{{ $errors->has('dish-name') ? ' has-error' : '' }}">
                            <label for="dish-name" class="col-md-4 control-label">Dish name</label>

                            <div class="col-md-6">
                                <input id="dish-name" type="text" class="form-control" name="dish-name" value="{{ old('dish-name') }}" required autofocus>

                                @if ($errors->has('dish-name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('dish-name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                          <div class="form-group{{ $errors->has('dish-price') ? ' has-error' : '' }}">
                            <label for="dish-price" class="col-md-4 control-label">Dish price</label>

                            <div class="col-md-6">
                                <input id="dish-price" type="number" class="form-control" name="dish-price" value="{{ old('dish-price') }}" required autofocus>

                                @if ($errors->has('dish-price'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('dish-price') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                         <div class="form-group{{ $errors->has('dish-description') ? ' has-error' : '' }}">
                            <label for="dish-description" class="col-md-4 control-label">Dish Description</label>

                         <div class="col-md-6">
                                <textarea id="dish-description" type="text" class="form-control" name="dish-description" required>
                                {{ old('dish-description') }}
                            	</textarea>

                                @if ($errors->has('dish-description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('dish-description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

   						 <div class="form-group{{ $errors->has('dish-picture') ? ' has-error' : '' }}">
                            <label for="dish-picture" class="col-md-4 control-label">Dish picture</label>

                            <div class="col-md-6">
                                <input id="dish-picture" type="file" class="form-control" name="dish-picture" value="{{ old('dish-picture') }}" required autofocus>

                                @if ($errors->has('dish-picture'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('dish-picture') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Add
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection