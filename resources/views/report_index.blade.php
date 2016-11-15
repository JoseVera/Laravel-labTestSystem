@extends('layouts.app')

@section('content')
<div class="panel panel-primary">
        <div class="panel-heading">Reports list</div>
        <div class="panel-body" style="margin: 10px;">
             <table class="table table-striped">
			    <thead>
			      <tr>
			        <th>Name</th>
			        <th>Patient</th>
			        <th>Date</th>
			        <th>Action</th>			        
			      </tr>
			    </thead>
			    <tbody>
			      @foreach ($reports as $report)	
			      <tr>
			      	<td>{{ $report->name }}</td>
			        <td>{{ $report->user_name }}</td>
			        <td>{{ $report->create_date }}</td>
			        <td>
			        	<a class="btn btn-success" href="{{url('report/detail/')}}/{{$report->id}}" role="button">View</a>
			        	<a class="btn btn-warning" href="{{url('report/')}}/{{$report->id}}" role="button">Modify</a>
			        	<a class="btn btn-danger" href="{{url('report/destroy/')}}/{{$report->id}}" role="button">Delete</a>
			        </td>
			      </tr>
			      @endforeach
			    </tbody>
			  </table>
        </div>
        <div class="panel-footer">
            <div class="text-right">
                <a href="{{url('report/create')}}" type="button" class="btn btn-success" >New Report</a>
            </div>
        </div>
    </div>
@stop