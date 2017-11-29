@extends('layouts.app')

@section('content')



<div class="panel panel-default">
            <div class="panel-heading">{{ __('My employees')}}</div>
                        <div class="panel-body">

{{-- var_dump($userList) --}}

{{-- $userList[1]['name']--}}

@if($userList != null)
    <table class="table table-striped">
    <tr>
        <th>{{ __('Employees id') }}</th>
        <th>{{ __('Employees name') }}</th>
        <th>{{ __('E-mail') }}</th>
        
        <th>{{ __('Profession') }}</th>
        <th>{{ __('Actions') }}</th>
    </tr>

    @foreach($userList as $employee)

        <tr>
        <td>{{ $employee->id}}</td>
        <td>{{ $employee->name}}</td>
        <td>{{ $employee->email}}</td>
        <td>{{-- $employee->depends_on --}}
        {{-- $employee->profession --}}
                          <b>  {{ $employee->profession ? $employee->profession->position : " "}}</b>

        
        </td>
        <td>
        <a href="/update/{{ $employee->id }}">{{ __('Update') }}</a>
        <a href="/delete/{{ $employee->id }}">{{ __('Delete') }}</a>
        </td>
        </tr>
        @endforeach

        </table>
              

                          {{ $userList->links() }}
  @include('layouts.entryCount')
@endif
</div>
</div>
@endsection
