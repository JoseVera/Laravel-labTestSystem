@extends('layouts.app')

@section('content')
    <div class="panel panel-primary">
        <div class="panel-heading">Add Test Analisys</div>
        <div class="panel-body" style="margin: 10px;">
             <form method="post">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                    <label>Study Name</label>
                    <input type="input" name="name" value="{{ $name or Input::old('name') }}" class="form-control">
                    @if( $errors->first('name') )
                    <small class="error">{{ $errors->first('name') }}</small>
                    @endif
                </div>
                <div class="form-group">
                    <label>Results Analisys</label>
                    <input type="textarea" rows="4" name="results" value="{{ $results or Input::old('results') }}" class="form-control">
                    @if( $errors->first('results') )
                    <small class="error">{{ $errors->first('results') }}</small>
                    @endif
                </div>
                <div class="form-group">
                    <label>Patiences</label>
                    <select name="user" class="form-control">
                    <option value="" >Select</option>
                    @foreach ($users as $user)
                      <option value="{{ $user->id }}" >{{ $user->name }}</option>
                    @endforeach 
                    </select>
                    @if( $errors->first('user') )
                    <small class="error">{{ $errors->first('user') }}</small>
                    @endif
                </div>
                <div class="text-right">
                    <a href="{{url('test')}}" type="button" class="btn btn-danger">Cancel</a>
                    <button type="submit" class="btn btn-success">Add</button>
                </div>
            </form>
        </div>
    </div>
@stop