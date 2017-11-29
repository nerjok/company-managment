<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;

use \App\User;
use \App\Profession;
use \App\Question;

use App\Repositories\TaskRepository;


class TaskController extends Controller
{


     public function __construct()
     {

         $this->middleware('auth');
                  $this->middleware('lang');

     }



    /*****************************************************
    *
    * index page of tasks
    *
    ****************************************************/
    public function index(TaskRepository $taskRepository)
    {

        $userTask = $taskRepository->indRep();

        return view('tasks.index', compact('userTask'));
    }

    /*******************************************************
    *
    *   show task creation panel
    *
    *******************************************************/
    public function create(User $user)
    {
        $reportsTo =  User::where('depends_on', '=', \Auth::user()->depends_on)
                                ->first();

        $taskList =Task::where('from', '=', \Auth::user()->id)
                            ->where('taskwhom', '=', $user->id)
                            ->orderBy('deadline', 'asc')
                            ->paginate(15);
                                if ( count($taskList) <=0) {

                                    $taskList = null;
                                }
        
        return view('tasks.create', compact('user', 'reportsTo', 'taskList'));
    }

    /************************************************************
    *
    * Store created tasks
    *
    ************************************************************/
    public function store(Request $request,
                            Task $task,  
                            TaskRepository $taskRepository
                            )
    {



                     $taskRepository->save($request, $task);
             return redirect('/task');
    }



    /*******************************************************
    *
    *   Edit task
    *
    ********************************************************/
    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    /*******************************************************
    *
    *   Updating task
    *
    ********************************************************/
    public function update(Request $request, Task $task, TaskRepository $taskRepository)
    {
            $this->validate(request(), [

            'time' => 'required|date|max:255',
            'status' => 'required|string|',
            'descr' =>'required'

            ]);
        $taskRepository->upTask($task, $request);

                return redirect('/task');

    }

  

}
