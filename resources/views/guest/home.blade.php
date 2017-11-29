@extends('layouts.app')

@section('content')
<div class="panel panel-default">
            <div class="panel-heading">{{ __('Employees list')}}</div>
                        <div class="panel-body">
@if($userList != null)
    <table class="table table-striped">
    <tr>
        <th>{{ __('Employees id') }}</th>
        <th>{{ __('Employees name') }} </th>
        
        <th>{{ __('Profession') }}</th>
    </tr>

    @foreach($userList as $employee)

        <tr>
        <td>{{ $employee->id}}</td>
        <td>{{ $employee->name}}</td>
        <td>{{-- $employee->depends_on --}}
        {{-- $employee->profession --}}
                          <b>  {{ $employee->profession ? $employee->profession->position : " "}}</b>

        
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
