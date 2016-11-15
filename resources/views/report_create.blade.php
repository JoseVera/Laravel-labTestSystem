@extends('layouts.app')

@section('content')
    <div class="panel panel-primary">
        <div class="panel-heading">Add Report</div>
        <div class="panel-body" style="margin: 10px;">
             <form method="post">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                    <label>Report Name</label>
                    <input type="input" name="name" value="{{ $name or Input::old('name') }}" class="form-control">
                    @if( $errors->first('name') )
                    <small class="error">{{ $errors->first('name') }}</small>
                    @endif
                </div>
                <div class="form-group">
                    <label>Patient</label>
                    <select name="user" class="form-control" id="user_id">
                    <option value="" >Select</option>
                    @foreach ($users as $user)
                      <option value="{{ $user->id }}" >{{ $user->name }}</option>
                    @endforeach 
                    </select>
                    @if( $errors->first('user') )
                    <small class="error">{{ $errors->first('user') }}</small>
                    @endif
                </div>
                <div class="form-group">
                       <label>Test</label>
                       <select class="form-control" name="test_id" id="test_id">
                           <option value="">First Select Patience</option>
                       </select>
                       @if( $errors->first('user') )
                        <small class="error">{{ $errors->first('user') }}</small>
                        @endif
                </div>
                
                <div class="text-right">
                    <a href="{{url('report')}}" type="button" class="btn btn-danger">Cancel</a>
                    <button type="submit" class="btn btn-success">Add</button>
                </div>
            </form>
        </div>
    </div>
@stop


@section('scripts')

<script>

   $('#user_id').on('change', function(e){

    var test_id = e.target.value;

       //ajax

       $.get('userDropDownData/' + test_id, function(data){

           //success data
           $('#test_id').empty();

           $('#test_id').append('<option value=""> Please choose one</option>');

           $.each(data, function(index, subcatObj){

               $('#test_id').append('<option value="' + subcatObj.id+'">'
               + subcatObj.name + '</option>');


           });



       });


   });


</script>

@stop