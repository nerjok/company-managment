@extends('layouts.app')

@section('content')
<div class="panel panel-default">
            <div class="panel-heading">{{ __('My employees')}}</div>
                        <div class="panel-body">

           <form method='post' action="{{ url('/update', $user->id) }}" class="form-horizontal">

            {{-- method_field('PUT') --}}
           {{ csrf_field() }}
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Vardas</label>
                    <div class="col-sm-10">
                        <input type='text' name='name'  required placeholder="vardas" value="{{ $user->name }}" >
                    </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">E-mail</label>
                    <div class="col-sm-10">
                        <input type='text' name='email' required  value="{{ $user->email }}">
                    </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Branch</label>
                    <div class="col-sm-10">
                        <input type='text' name='branch' required  value="{{ $user->depends_on }}">
                    </div>
            </div>


            <input type='submit' value='Issaugoti' class="btn btn-default">
            </form>

            @include('layouts.errors')
            </div>
            </div>

@endsection