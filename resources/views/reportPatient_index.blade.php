@extends('layouts.app')

@section('content')
<div class="panel panel-primary">
        <div class="panel-heading">Reports list</div>
        <div class="panel-body" style="margin: 10px;">
             <table class="table table-striped">
			    <thead>
			      <tr>
			        <th>Name</th>
			        <th>Date</th>
			        <th>Action</th>			        
			      </tr>
			    </thead>
			    <tbody>
			      @foreach ($reports as $report)	
			      <tr>
			      	<td>{{ $report->name }}</td>
			        <td>{{ $report->create_date }}</td>
			        <td>
			        	<a class="btn btn-success" href="{{url('reportPacient/detail/')}}/{{$report->id}}" role="button">View</a>
			        </td>
			      </tr>
			      @endforeach
			    </tbody>
			  </table>
        </div>
</div>
@stop