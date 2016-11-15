@extends('layouts.app')

@section('content')
<div class="panel panel-primary">
        <div class="panel-heading">Test Analisys</div>
        <div class="panel-body" style="margin: 10px;">
             <table class="table table-striped">
			    <thead>
			      <tr>
			        <th>Patience</th>
			        <th>Study</th>
			        <th>Results</th>
			        <th>Date</th>
			        <th>Action</th>			        
			      </tr>
			    </thead>
			    <tbody>
			      @foreach ($tests as $test)	
			      <tr>
			      	<td>{{ $test->user_name }}</td>
			        <td>{{ $test->name }}</td>
			        <td>{{ $test->result }}</td>
			        <td>{{ $test->create_date }}</td>
			        <td>
			        	<a class="btn btn-success" href="{{url('test/detail/')}}/{{$test->id}}" role="button">View</a>
			        	<a class="btn btn-warning" href="{{url('test/')}}/{{$test->id}}" role="button">Modify</a>
			        	<a class="btn btn-danger" href="{{url('test/destroy/')}}/{{$test->id}}" role="button">Delete</a>
			        </td>
			      </tr>
			      @endforeach
			    </tbody>
			  </table>
        </div>
        <div class="panel-footer">
            <div class="text-right">
                <a href="{{url('test/create')}}" type="button" class="btn btn-success" >New Test</a>
            </div>
        </div>
    </div>
@stop