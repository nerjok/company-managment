<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GuestController extends Controller
{


     public function __construct()
     {

         $this->middleware('lang');

     }
    /********************************************
    *
    * list of all dependent co-employees
    *
    *********************************************/
    public function index()
    {
        
            if (session('entryCount') !== null) {

            $pageCount =  session('entryCount');

            } else {

                $pageCount = 5;
            }



                  $userList = \App\User::paginate($pageCount);


                  return view('guest.home', compact('userList'));
 
    }
}
