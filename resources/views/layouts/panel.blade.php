            <div class="container">

                            <div class="row">
                                <div class="col-md-8">
                                        @yield('content')
                                </div>
                <!--            </div>
                    <div class="row">
-->
                        <div class="col-md-4">
                            <div class="panel panel-default">
                                <div class="panel-heading">{{ __('Users panel')}}</div>
                                    <div class="panel-body">

                                        
                                        <p> <b>{{ __('Logged as')}}:</b> {{ Auth::user()->name }}</p>
                                        <p> <b>{{ __('E-mail')}}:</b> {{ Auth::user()->email }}</p>

@if($employees != null)
    <p><b>{{ __('My employees')}} :</b></p>                                  
    @foreach($employees as $dept)
    
        
        {{ $dept->name }}
        {{ $dept->email }}
        <br>
        @endforeach
        <a href="/task">{{ __('More')}}</a>
@endif



                                       @if($task != null)
                             <p> <b>{{ __('My tasks')}} :</b></p>

                                         @foreach($task as $tasks)

                                            {{ $tasks->deadline}}
                                            {{ $tasks->description}}
                                            <br>
                                            @endforeach
                                                    <a href="/mytask">{{ __('More') }}</a>
                                        @endif



  
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
             <!-- end container -->