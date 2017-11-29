<?php

namespace App\Repositories;


use Illuminate\Http\Request;
use Validator;

use \App\Profession;


class ProfessionsRepository
{


    /********************************************
    *
    * users index page
    *
    *********************************************/
    public function indRep()
    {            if (session('entryCount') !== null) {

            $pageCount =  session('entryCount');

            } else {

                $pageCount = 5;
            }

        return Profession::orderBy('pos_level', 'asc')->paginate($pageCount);

    }



    /*******************************************************
    *
    *   Create proffesion profesion
    *
    ********************************************************/

    public function profCreate()
    {



        $pos_Lev = Profession::select('pos_level')->where('id', '=', request('depends'))->first();


                $profession = Profession::create([ 
                'position' => request('position'),
                'depends_on' => request('depends'),
                'pos_level' => $pos_Lev->pos_level+1,
                ]);
    }
}