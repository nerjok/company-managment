@extends('layouts.app')

@section('content')
<div class="panel panel-default">
            <div class="panel-heading">{{ __('Create tasks for my employees')}}</div>
                        <div class="panel-body">
 {{-- var_dump($taskList[0]) --}}


   <div class="table-responsive">

                <table  class="table table-striped">
                <tr>
                <th>{{ __('Id')}}</th>
                <th>{{ __('Task pursues')}}</th>
                <th>{{ __('Task manage')}}</th>
                <th>{{ __('Deadline')}}</th>
                <th>{{ __('Description')}}</th>
                <th>{{ __('Files')}}</th>
                <th>{{ __('Status')}}</th>
                <th>{{ __('Questions')}}</th>

                </tr>
                <tr>
                <td>{{ $task->id }}</td>
                <td>{{ $task->taskwhom  }}</td>
                <td>{{ $task->from }}</td>
                <td>{{ $task->deadline }}</td>
                <td>{{ $task->description }}</td>
                <td></td>
                <td>{{ $task->status }}</td>
                <td>{{ $task->questions }}</td>

                </tr>
                </table>
</div>



<form method="POST" action="/task/{{ $task->id }}" class="form-horizontal">
           {{ csrf_field() }}


<input type="hidden" name="whom" value="{{ $task->id }}">

             <div class="form-group">
                     <label for="inputEmail3" class="col-sm-2 control-label">Data</label>
                        <div class="col-sm-10">
                         <input type="date" name="time"  class="form-control" value="{{ $task->deadline }}">
                        </div>
            </div>
             <div class="form-group">
                     <label for="inputEmail3" class="col-sm-2 control-label">{{ __('Task')}}</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" name="descr">{{ $task->description }}</textarea>
                            </div>
            </div>
                <div class="form-group">
                     <label for="inputEmail3" class="col-sm-2 control-label">{{ _('Stations') }}</label>
                        <div class="col-sm-10">
                         <select name="status" class="form-control">
                                    <option value='none'>{{ __('None') }}</option>
                                    <option value='ready'>{{ __('Ready') }}</option>
                                    <option value='executing'>{{ __('Executing') }}</option>
                                    <option value='done'>{{ __('Done') }}</option>
                                    <option value='completed'>{{ __('Completed') }}</option>
                                </select>
                </div>
                </div>
          <!--      <div class="form-group">
                     <label for="inputEmail3" class="col-sm-2 control-label">Data</label>
                        <div class="col-sm-10">
                         <input type="file" name="file"  class="form-control" multiple>
                </div>
--> <div class="form-group">
                     <label for="inputEmail3" class="col-sm-2 control-label"></label>
                     <div class="col-sm-10">
<input type="submit" value="{{ __('Submit')}}" >

</div></div></form>

            @include('layouts.errors')
</div>
</div>
@endsection