<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       // $this->middleware('auth');
                 $this->middleware('dir');
                          $this->middleware('lang');


    }


    public function store()
    {
        //echo"blabla";
        //validation of the form
        $this->validate(request(),[

            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'branch' =>'required'
        ]);


          $result_explode = explode('|', request('branch'));
            $primary= $result_explode[0];
            $depends = $result_explode[1];

                $user = User::create([ 
                'name' => request('name'),
                'email' => request('email'),
                'password' => bcrypt(request('password')),
                'depends_on'=> $primary,
                'range'=> $depends
                ]);

//echo request('branch');

                return redirect($this->redirectTo);
    }


    public function create()
    {

       //$userR = User::where('user_level', '>', \Auth::user()->user_level)->distinct()->orderBy('user_level', 'desc')->pluck('user_level'); 

        $userR = \App\Profession::select('position', 'pos_level', 'id')
                                    ->where('pos_level', '>', \Auth::user()->range)// reikia keisti
                                    ->distinct()->orderBy('position', 'desc')
                                    ->get();

        
        return view('auth.register', compact('userR'));

    }
}
