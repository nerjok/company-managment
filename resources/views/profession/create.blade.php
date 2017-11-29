@extends('layouts.app')

@section('content')
<!-- new position registration -->



  
            <div class="panel panel-default">
                <div class="panel-heading">{{ __('Register new work position') }}</div>
                <div class="panel-body">
                    <form class="form-horizontal"  method="post" action="/posreg">
                        {{ csrf_field() }}


                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">{{ __('Position name') }}</label>

                            <div class="col-md-6">
                                <input id="position" type="text" class="form-control" name="position">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">{{ __('Depends to this executive') }}</label>

                            <div class="col-md-6">
                                        <select name="depends" id="depends" class="form-control">

                                       @foreach( $depends as $user)

                                                <option value="{{ $user->id }}">{{ $user->position }} <b>{{-- $user->pos_level --}}</b></option>

                                        @endforeach 
                                        </select>

                                
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                                @include('layouts.errors')

                </div>
            </div>


@endsection