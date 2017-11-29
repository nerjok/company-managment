@extends('layouts.app')

@section('content')

 {{-- var_dump($taskList[0]) --}}

<div class="panel panel-default">
            <div class="panel-heading">{{ __('Edit my Tasks')}}</div>
                        <div class="panel-body">
   
<div class="table-responsive">

                <table  class="table table-striped">

                <tr>
                    <th>{{ __('Id')}}</th>
                    <th>{{ __('Deadline')}}</th>
                    <th>{{ __('Description')}}</th>
                    <th>{{ __('Status')}}</th>
                    <th>{{ __('Questions')}}</th>

                </tr>
                <tr>
                    <td>{{ $task->id }}</td>
                    <td>{{ $task->deadline }}</td>
                    <td>{{ $task->description }}</td>
                    <td>{{ $task->status }}</td>
                    <td>{{ $task->questions }}</td>

                </tr>
                </table>
</div>



                    <form method="POST" action="/mytask/{{ $task->id }}" class="form-horizontal">
                            {{ csrf_field() }}


                    <input type="hidden" name="taskid" value="{{ $task->id }}">
                    <input type="hidden" name="from" value="{{ $task->from }}">
                    <input type="hidden" name="whom" value="{{ $task->taskwhom }}">



                                <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label">{{ __('Question')}}</label>
                                            <div class="col-sm-10">
                                                <textarea class="form-control" name="quest"></textarea>
                                                </div>
                                </div>
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label">{{ _('Stations') }}</label>
                                            <div class="col-sm-10">
                                            <select name="status" class="form-control">
                                                        <option value='executing'>{{ __('Executing') }}</option>
                                                        <option value='done'>{{ __('Done') }}</option>
                                                    </select>
                                            </div>
                                    </div>

                        <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label">Data</label>
                                        <div class="col-sm-10">
                                            <input type="submit" value="{{ __('Submit')}}" >

                                        </div>
                        </div>
                    </form>

                                @include('layouts.errors')
        </div>
    </div>
@endsection