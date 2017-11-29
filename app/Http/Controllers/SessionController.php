<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;


class SessionController extends Controller
{


/*********************************************************
*
* Select how many entrys to show, retained in sessions
*
*********************************************************/
    public static function entryCnt()
     {
            $labas=  request(['entryCnt']);

            session(['entryCount'=> $labas['entryCnt']]);


        return redirect()->back();
     }

/******************************************************
*
* Setting the language
*
******************************************************/

     public function lang(Request $request)
     {

            $ab = $request->input('lang');

            if ($ab)
            {
                session(['lang' => $ab]);

            } 

         return redirect()->back();
     }
}
