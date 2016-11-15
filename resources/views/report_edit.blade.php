@extends('layouts.app')

@section('content')
    <div class="panel panel-primary">
        <div class="panel-heading">Report</div>
        <div class="panel-body" style="margin: 10px;">
            <form method="post">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                    <label>Report Name</label>
                    <input type="input" name="name" value="{{ $name }}" class="form-control" >
                    @if( $errors->first('name') )
                    <small class="error">{{ $errors->first('name') }}</small>
                    @endif
                </div>
                <div class="form-group">
                    <label>Patient Name</label>
                    <select name="user" class="form-control">
                    <option value="" >Select</option>
                    @foreach ($users as $user)
                      <option value="{{ $user->id }}" @if($user->id == $userSel) selected @endif >{{ $user->name }}</option>
                    @endforeach 
                    </select>
                    @if( $errors->first('user') )
                    <small class="error">{{ $errors->first('user') }}</small>
                    @endif
                </div>
                <div class="form-group">
                    <label>Report Date</label>
                    <input type="input" name="date" value="{{ $date }}" class="form-control datepicker" >
                    @if( $errors->first('date') )
                    <small class="error">{{ $errors->first('date') }}</small>
                    @endif
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
                    <a href="{{url('report')}}" type="button" class="btn btn-danger">Back</a>
                    <button type="submit" class="btn btn-success">Modify</button>
                </div>
            </form>        
               


           
        </div>
    </div>
@stop

@section('scripts')
<script>
    $('.datepicker').datepicker({
        format: "yyyy/mm/dd",
        language: "en",
        autoclose: true
    });
</script>
@stop