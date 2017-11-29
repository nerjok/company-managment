<!-- Professions list -->

@extends('layouts.app')

@section('content')
<div class="panel panel-default">
            <div class="panel-heading">{{ __('Create tasks for my employees')}}</div>
                        <div class="panel-body">

{{-- var_dump($myTask) --}}

 @if($userTask != null) 
 <div class="table-responsive">

        <table class="table table-striped">
            <tr>
                <th>{{ __('Position  id') }}</th>
                <th>{{ __('Employees name') }}	</th>
                <th>{{ __('E-mail') }}</th>
                <th>{{ __('Pozision') }}</th> 
                <th>{{ __('Create task') }}</th>       

            </tr>

            @foreach($userTask as $employee)

                <tr>
                <td>{{ $employee->id}}</td>


                <td>{{ $employee->name}}</td>

                <td>{{ $employee->email}}</td>

                <td> {{ $employee->profession ? $employee->profession->position : " "}} </td>

                <td><a href="/task/{{$employee->id}}">{{ __('Create task')}}</a></td>
        
                </tr>
                @endforeach

        </table>
</div>
                          {{ $userTask->links() }}
 @include('layouts.entryCount')
@endif
    
    
  

     </div>
     </div>    

@endsection