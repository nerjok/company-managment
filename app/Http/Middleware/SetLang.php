<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;


class SetLang
{
    /******************************************************
     * 
     *  Seting up the language
     *  
     ******************************************************/
  



    public function handle($request, Closure $next)
    {

        if ( session('lang') != null  )
        {
            $getLoc = session('lang');

            \App::setLocale($getLoc);

            return $next($request);
        } else {

       // $languages = explode(',', $_SERVER['HTTP_ACCEPT_LANGUAGE']);
        //    \App::setLocale($languages[0]);
        $language = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'],0,2);
         \App::setLocale($language);
        
        return $next($request);
        }


    }


}