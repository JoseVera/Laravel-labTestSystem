@extends('layouts.app')

@section('content')
    <div class="panel panel-primary">
        <div class="panel-heading">Report</div>
        <div class="panel-body" style="margin: 10px;">
                <div class="form-group">
                    <label>Report Name</label>
                    <input type="input" name="name" value="{{ $name }}" class="form-control" disabled>
                </div>
                <div class="form-group">
                    <label>Patient Name</label>
                    <input type="input" name="patient_name" value="{{ $patient_name }}" class="form-control" disabled>
                </div>
                <div class="form-group">
                    <label>Report Date</label>
                    <input type="input" name="date" value="{{ $date }}" class="form-control" disabled>
                </div>

                <label>Lastest Test</label>
                @foreach ($tests as $test)
                 <div class="table-responsive table-bordered" style="margin-bottom: 20px;">
                    <table class="table"  >
                        <tr>
                            <td class="active">
                                Test Analisys:
                            </td>
                            <td >
                                {{ $test->name }}
                            </td>
                            <td class="active">
                                Date:
                            </td>
                            <td >
                                {{ $test->create_date }}
                            </td>
                        <tr>
                        <tr>
                            <td colspan="4" class="active">
                                Results
                            </td>
                        </tr>
                        <tr>
                            <td colspan="4" >
                                {{ $test->result }}
                            </td>
                        </tr>    
                    </table >
                </div>
                @endforeach
                <div class="text-right">
                    <a href="{{url('pdfview')}}/{{$report_id}}" type="button" class="btn btn-success">PDF</a>
                    <a href="{{url('reportPacient')}}" type="button" class="btn btn-danger">Back</a>
                </div>

               


           
        </div>
    </div>
@stop

@section('css')
<style>


</style>
@stop