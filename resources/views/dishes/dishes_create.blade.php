@section('content')
@extends('layouts.app')


<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Add new dish</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('dishes_store') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}


                        <div class="form-group{{ $errors->has('dish_name') ? ' has-error' : '' }}">
                            <label for="dish_name" class="col-md-4 control-label">Dish name</label>

                            <div class="col-md-6">
                                <input id="dish_name" type="text" class="form-control" name="dish_name" value="{{ old('dish_name') }}" required autofocus>

                                @if ($errors->has('dish_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('dish_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                          <div class="form-group{{ $errors->has('dish_price') ? ' has-error' : '' }}">
                            <label for="dish_price" class="col-md-4 control-label">Dish price</label>

                            <div class="col-md-6">
                                <input id="dish_price" type="number" step="0.01" class="form-control" name="dish_price" value="{{ old('dish_price') }}" required autofocus>

                                @if ($errors->has('dish_price'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('dish_price') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                         <div class="form-group{{ $errors->has('dish_description') ? ' has-error' : '' }}">
                            <label for="dish_description" class="col-md-4 control-label">Dish Description</label>

                         <div class="col-md-6">
                                <textarea id="dish_description" type="text" class="form-control" name="dish_description" required>
                                {{ old('dish_description') }}
                            	</textarea>

                                @if ($errors->has('dish_description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('dish_description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

   						 <div class="form-group{{ $errors->has('dish_picture') ? ' has-error' : '' }}">
                            <label for="dish_picture" class="col-md-4 control-label">Dish picture</label>

                            <div class="col-md-6">
                                <input id="dish_picture" type="file" class="form-control" name="dish_picture" value="{{ old('dish_picture') }}" required autofocus>

                                @if ($errors->has('dish_picture'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('dish_picture') }}</strong>
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