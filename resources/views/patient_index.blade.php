@extends('layouts.app')

@section('content')
<div class="panel panel-primary">
        <div class="panel-heading">Users</div>
        <div class="panel-body" style="margin: 10px;">
             <table class="table table-striped">
			    <thead>
			      <tr>
			        <th>Name</th>
			        <th>Group</th>
			        <th>EMail</th>
			        <th>Create</th>
			        <th>Action</th>			        
			      </tr>
			    </thead>
			    <tbody>
			      @foreach ($patients as $patient)	
			      <tr>
			      	<td>{{ $patient->name }}</td>
			      	<td>{{ $patient->group }}</td>
			        <td>{{ $patient->email }}</td>
			        <td>{{ $patient->created_at }}</td>
			        <td>
			        	<a class="btn btn-success" href="{{url('patient/detail/')}}/{{$patient->id}}" role="button">View</a>
			        	<a class="btn btn-warning" href="{{url('patient/')}}/{{$patient->id}}" role="button">Modify</a>
			        	<a class="btn btn-danger" href="{{url('patient/destroy/')}}/{{$patient->id}}" role="button">Delete</a>
			        </td>
			      </tr>
			      @endforeach
			    </tbody>
			  </table>
        </div>
        <div class="panel-footer">
            <div class="text-right">
                <a href="{{url('test/create')}}" type="button" class="btn btn-success" >New User</a>
            </div>
        </div>
    </div>
@stop