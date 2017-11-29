<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use \App\User;
use App\Repositories\UsersRepository;


class UsersController extends Controller
{

   // public $usersRepository;

     public function __construct()
     {

         //$this->middleware('auth');
         $this->middleware('dir');
                  $this->middleware('lang');


         //$this->usersRepository = $usersRepository;
     
     }



    /********************************************
    *
    * list of all dependent co-employees
    *
    *********************************************/
    public function index(UsersRepository $usersRepository)
    {

                        $userList = $usersRepository->indRep();
                  return view('boss.employees', compact('userList'));
 
    }



    /*****************************************
    *
    *   Edit user view
    *
    ******************************************/
    public function edit(User $user)
    {
        
            return view('boss.edit', compact('user'));

    }

    /********************************************
    *
    * edit user
    *
    *********************************************/
    public function update(Request $request, User $user, UsersRepository $usersRepository)
    {
            return redirect('/employees');//not allowing to delete

            $this->validate(request(), [

            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'branch' =>'required|Integer'

            ]);
            $usersRepository->edit($user);
            return redirect('/employees');

    }

    /********************************************
    *
    * soft delete of user
    *
    *********************************************/
    public function destroy(User $user)
    {
            return redirect('/employees');//not allowing to delete

        $user->delete();
         
         return redirect()->home();
    }
}
