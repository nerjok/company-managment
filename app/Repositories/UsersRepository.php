<?php

namespace App\Repositories;


use Illuminate\Http\Request;

use \App\User;


class UsersRepository
{

    /********************************************
    *
    * users index page
    *
    *********************************************/
    public function indRep()
    {

            if (session('entryCount') !== null) {

            $pageCount =  session('entryCount');

            } else {

                $pageCount = 5;
            }


                  return User::where('range', '>', \Auth::user()->range) // reikia keisti
                                ->paginate($pageCount);

    }

    /********************************************
    *
    * edit user
    *
    *********************************************/
    public function edit(User $user)
    {
        

            $request = request();


            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->depends_on = $request->input('branch');

            $user->save();
    }
}