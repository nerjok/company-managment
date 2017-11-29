@extends('layouts.app')

@section('content')
<div class="panel panel-default">
            <div class="panel-heading">{{ __('Companies positions')}}</div>
                        <div class="panel-body">

           <form method='post' action="{{ url('/posupd', $profession->id) }}" class="form-horizontal">

            {{-- method_field('PUT') --}}
           {{ csrf_field() }}
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Pavadinimas</label>
                    <div class="col-sm-10">
                        <input type='text' name='position'  required placeholder="vardas" value="{{ $profession->position }}" >
                    </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Depends  on</label>
                    <div class="col-sm-10">
                        <input type='text' name='email' required  value="{{ $profession->depends_on }}">
                    </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Position level</label>
                    <div class="col-sm-10">
                        <input type='text' name='branch' required  value="{{ $profession->pos_level }}">
                    </div>
            </div>


            <input type='submit' value='Issaugoti' class="btn btn-default">
            </form>

            @include('layouts.errors')
</div>
</div>
@endsection