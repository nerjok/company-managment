<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use \App\Task;
use \App\User;
use \App\Profession;
use \App\Question;
use \App\Repositories\TaskRepository;

class MyTaskController extends Controller
{
public $taskRepository;


     public function __construct(TaskRepository $taskRepository)
     {

         $this->middleware('auth');
         $this->middleware('lang');
         $this->taskRepository =$taskRepository;

     }


    public function index()//TaskRepository $taskRepository)
    {



        $myTask = $this->taskRepository->indRep2();


        return view('mytask.index', compact( 'myTask'));
    }



    /****************************************
    *
    * edit task
    *
    ****************************************/
    public function edit(Task $task)
    {
                return view('mytask.edit', compact('task'));

    }

    /*******************************************************
    *
    *   Updating task
    *
    ********************************************************/
    public function update(Request $request, 
                            Task $task, 
                            TaskRepository $taskRepository,
                            Question $question)
    {




    $taskRepository->upMyTask($request, $task, $question);
                return redirect('/mytask');

    }


    /********************************************
    *
    * Retrieve uploaded file
    *
    **********************************************/
    public function retrieve(Request $request)
    {
       // echo url()->current().'<br>';
        $file = substr($_SERVER['REQUEST_URI'],1);
        $down = \Storage::get($file);
        return $down;


    }
}
