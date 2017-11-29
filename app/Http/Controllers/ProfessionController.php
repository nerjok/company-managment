<?php

namespace App\Http\Controllers;

use App\Profession;
use Illuminate\Http\Request;
use App\Repositories\ProfessionsRepository;

class ProfessionController extends Controller
{


    public function __construct()
     {

         $this->middleware('auth')->except(['index', 'show', 'entryCnt']);;

              $this->middleware('dir', ['only' =>['create', 'edit', 'store']]);
                       $this->middleware('lang');


     }

    /********************************************
    *
    * users index page
    *
    *********************************************/
    public function index(ProfessionsRepository $professionsRepository)
    {

            $professions= $professionsRepository->indRep();

        return view('profession.index', compact('professions'));
    }

    /*******************************************************
    *
    *   Create proffesion profesion
    *
    ********************************************************/
    public function create()
    {


        $depends = Profession::select('id', 'pos_level', 'position')
                                ->where('pos_level', '>=', \Auth::user()->range)// reikia keisti
                                ->distinct()->orderBy('position', 'desc')
                                 ->get();

        return view('profession.create', compact('depends'));
    }

    /*******************************************************
    *
    *   Create proffesion profesion
    *
    ********************************************************/
    public function store(Request $request, ProfessionsRepository $professionsRepository)
    {
    
                $this->validate(request(),[

                    'position' => 'required|string|max:255',
                    'depends' =>'required|Integer'
                ]);
    
            $professionsRepository->profCreate();

        return redirect('positions');


    }



    /*******************************************************
    *
    *   Edit profesion
    *
    ********************************************************/

    public function edit(Profession $profession)
    {
        
            return view('profession.edit', compact('profession'));

    }
    /*******************************************************
    *
    *   update profesion
    *
    ********************************************************/
    public function update(Request $request, Profession $profession)
    {
        return redirect('positions');
    }



    /*******************************************************
    *
    *   Delete position
    *
    ********************************************************/
    public function destroy(Profession $profession)
    {
        //
    }
}
