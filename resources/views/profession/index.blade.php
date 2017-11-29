<!-- Professions list -->

@extends('layouts.app')

@section('content')


<div class="panel panel-default">
            <div class="panel-heading">{{ __('Companies positions')}}</div>
                        <div class="panel-body">


{{-- var_dump($userList) --}}

{{-- $userList[1]['name']--}}

@if($professions != null)
    <table class="table table-striped">
    <tr>
        <th>{{ __('Pozision') }}</th>
        <th>{{ __('Pozision') }}</th>
      <!--  <th>Pozision depends on</th> -->
        <th>{{ __('Pozision level') }}</th> 
        <th>{{ __('Employees') }}</th>       
        <th>{{ __('Created') }}</th>
        <th>{{ __('Actions') }}</th>
    </tr>

    @foreach($professions as $employee)

        <tr>
        <td>{{ $employee->id}}</td>
        <td>{{ $employee->position}}</td>
      <!--  <td>{{-- $employee->depends_on --}}</td> -->
        <td>{{ $employee->pos_level}}</td>
        <td>
                                        @foreach($employee->users as $many)
                                         {{$many->name }},  
                                                
                                        @endforeach
        </td>

        <td>{{ $employee->created_at}}</td>
        <td>
        <a href="/posupd/{{ $employee->id }}">{{ __('Update') }}</a>
       <!-- <a href="/delete/{{-- $employee->id --}}">Delete</a>
       --> </td>
        </tr>
        @endforeach

        </table>
              

                          {{ $professions->links() }}
  @include('layouts.entryCount')
@endif
</div>
</div>
@endsection
