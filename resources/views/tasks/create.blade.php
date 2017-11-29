@extends('layouts.app')

@section('content')
<div class="panel panel-default">
            <div class="panel-heading">{{ __('Create tasks for my employees')}}</div>
                        <div class="panel-body">
 {{-- var_dump($taskList[0]) --}}

@if($user != null)
        <table class="table table-striped">
                        <th>{{ __('Employees name') }}</th>

                        <th> {{ __('E-mail') }}</th>

                        <th>{{ __('Profession') }}</th>
                        <th>{{ __('Task manage') }}</th>



        <tr><td> {{ $user->name }}  </td>
        <td> {{ $user->email }} </td>
        <td> {{ $user->profession->position }} </td>
        <td> {{ $reportsTo->name }} </td></tr>

    </table>
@endif

    @if($taskList != null)
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
                <th>{{ __('Update') }}</th>

                </tr>
                @foreach ($taskList as $task)
                <tr>
                <td>{{ $task->id }}</td>
                <td>{{ $task->operatedby->name  }}</td>
                <td>{{ $task->createdby->name }}</td>
                <td>{{ $task->deadline }}</td>
                <td>{{ $task->description }}</td>
                <td>
                @if (unserialize($task->files) != null)
                    @foreach(unserialize($task->files) as $key=> $filepath)
                    <a href="/{{$filepath}}" download>
                        {{$key}} </a>
                    @endforeach
                @endif
                </td>
                <td>{{ $task->status }}</td>
                <td>{{-- $task->questions --}}

                            @foreach($task->question as $many)
                                    <b>{{ __('Klausimas') }}:</b>   {{$many->question }},
                                    <b>{{ __('Uzduotas') }}:</b>{{$many->created_at }} <br>
                                                
                            @endforeach
                
                </td>
        <td><a href="/task/edit/{{ $task->id}}"> {{ __('Update') }}</a> </td>

                </tr>
                @endforeach
                </table>
                </div>

                                          {{ $taskList->links() }}

        @endif




<form method="POST" action="/task" class="form-horizontal" enctype="multipart/form-data">
           {{ csrf_field() }}
            {{ method_field('PUT') }}


<input type="hidden" name="whom" value="{{ $user->id }}">

             <div class="form-group">
                     <label for="inputEmail3" class="col-sm-2 control-label">Data</label>
                        <div class="col-sm-10">
                         <input type="datetime-local" name="time"  class="form-control" value="{{ old('time') }}">
                        </div>
            </div>
             <div class="form-group">
                     <label for="inputEmail3" class="col-sm-2 control-label">{{ __('Task')}}</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" name="descr" >{{ old('descr') }}</textarea>
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
                <div class="form-group">
                     <label for="inputEmail3" class="col-sm-2 control-label">Failai</label>
                        <div class="col-sm-10">
                        <input type="file" name="file[]" multiple class="form-control">
                </div></div>

                <div class="form-group">
                     <label for="inputEmail3" class="col-sm-2 control-label"></label>
                     <div class="col-sm-10">
<input type="submit" value="{{ __('Submit')}}">
                            </div>
                        </div>
</form>
            @include('layouts.errors')
</div>
</div>
@endsection