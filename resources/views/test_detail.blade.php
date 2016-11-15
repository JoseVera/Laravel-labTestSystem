@extends('layouts.app')

@section('content')
    <div class="panel panel-primary">
        <div class="panel-heading">Test Analisys</div>
        <div class="panel-body" style="margin: 10px;">
                <div class="form-group">
                    <label>Study Name</label>
                    <input type="input" name="name" value="{{ $name }}" class="form-control" disabled>
                </div>
                <div class="form-group">
                    <label>Results Analisys</label>
                    <input type="textarea" rows="4" name="results" value="{{ $results }}" class="form-control" disabled>
                </div>
                <div class="form-group">
                    <label>Patient</label>
                    <input type="input" name="user" value="{{ $user }}" class="form-control" disabled>
                </div>
                
                <div class="text-right">
                    <a href="{{url('test')}}" type="button" class="btn btn-danger">Back</a>
                </div>
           
        </div>
    </div>
@stop