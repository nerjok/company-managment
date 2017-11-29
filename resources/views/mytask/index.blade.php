<!-- Professions list -->

@extends('layouts.app')

@section('content')


<div class="panel panel-default">
            <div class="panel-heading">{{ __('My tasks list')}}</div>
                        <div class="panel-body">
            
            
            @if($myTask != null) 
                    <div class="table-responsive">

                    <table  class="table table-striped">
                        <tr>
                            <th>{{ __('Id')}}</th>
                            <th>{{ __('Task manage')}}</th>
                            <th>{{ __('Deadline')}}</th>
                            <th>{{ __('Description')}}</th>
                            <th>{{ __('Files')}}</th>
                            <th>{{ __('Status')}}</th>
                            <th>{{ __('Questions')}}</th>
                            <th>{{ __('Actions')}}</th>
                        </tr>
                        @foreach ($myTask as $task)
                        <tr>
                                <td>{{ $task->id }}</td>
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
                                                    <b>{{ __('Question') }}:</b>   {{$many->question }},
                                                    <b>{{ __('Date') }}:</b>{{$many->created_at }} <br>
                                                                
                                                        @endforeach
                                </td>
                                <td>
                                <a href="/mytask/{{$task->id}}">{{ __('Edit task')}}</a>
                                </td>
                        </tr>
                        @endforeach
                        </table>
                                                {{ $myTask->links() }}
                @include('layouts.entryCount')
</div>
            @else

            <p>{{ __('Here\'s no undone task to do')}}</p>

            @endif
        </div>
    </div>
@endsection