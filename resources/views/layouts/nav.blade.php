<!-- navigation file -->

<?php       
/*  $languages = explode(',', $_SERVER['HTTP_ACCEPT_LANGUAGE']);
echo $_SERVER['HTTP_ACCEPT_LANGUAGE']."<br>";
echo $languages[0];
echo substr($_SERVER['HTTP_ACCEPT_LANGUAGE'],0,2);
*/
?>
<div class="alert alert-success" role="alert"><p>Companies' managment test system. <b>Login email:</b> aaa@a.a, bbb@a.a, ccc@a.a, ddd@a.a, eee@a.a, fff@a.a. <b>Password:</b>123456</p> </div>
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">

                        @if (Auth::user())
                        <li><a href="/mytask">{{ __('My tasks') }}</a></li>
                        
                        <li><a href="/task">{{ __('Create task') }}</a></li>

                        <li><a href="{{ route('register') }}">{{ __('Register user') }}</a></li>
                        <li><a href="/positions/new">{{ __('New Position') }}</a></li>
                        <li><a href="/employees">{{ __('Manage employees') }}</a></li>

                        @endif
                        <li><a href="/positions">{{ __('Available possitions') }}</a></li>
                     @if (Auth::guest())
                        <li><a href="">{{ __('Employees') }}</a></li>
                        @endif

                        <li>
                        
        <form method="post" action="/lang" class="form-horizontal">
        {{ csrf_field() }}
        <select name="lang" class="form-control">
             <option value='lt'>Lt</option>
              <option value='eng'>Eng</option>
     </select>

  <input type='submit' value="{{ __('Save')}}" class="form-control" >

            </form>
                        
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">{{ __('Login') }}</a></li>
                       <!--     <li><a href="{{-- route('register') --}}">Register</a></li> -->
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>