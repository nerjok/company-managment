<?php

namespace App\Repositories;


use Illuminate\Http\Request;
    //use Validator;


use \App\Profession;

    use Illuminate\Foundation\Validation\ValidatesRequests;
    //use Illuminate\Contracts\Validation\ValidatesWhenResolved;

class TaskRepository
{

    use ValidatesRequests;

    /********************************************
    *
    * users list for tasks index page
    *
    *********************************************/
    public function indRep()
    {
            if (session('entryCount') !== null) {

            $pageCount =  session('entryCount');

            } else {

                $pageCount = 5;
            }


                          $userTask = \App\User::where('range', '=', \Auth::user()->range+1) // depends_on +1 - setting up user's level
                                ->paginate($pageCount);
                                
                                if ( count($userTask) <=0) {

                                    $userTask = null;
                                }


                return $userTask;
    }


    /********************************************
    *
    * mytasks index page
    *
    *********************************************/
    public function indRep2()
    {
            if (session('entryCount') !== null) {

            $pageCount =  session('entryCount');

            } else {

                $pageCount = 5;
            }

                                $myTask = \App\Task::where('taskwhom', '=', \Auth::user()->id)
                                                ->whereIn('status', ['ready', 'executing', 'done'])
                                                ->orderBy('deadline', 'asc')
                                                 ->paginate($pageCount);

                                if ( count($myTask) <=0) {

                                    $myTask = null;
                                }

                                return $myTask;
    }

    /********************************************
    *
    * save task
    *
    *********************************************/
    public function save($request)
    {

            $this->validate(request(), [

            'status' => 'required|string|',
            'descr' =>'required',
            'time' => 'required|date',
            'file.*' => 'nullable|file|max:10240|mimes:pdf,doc',
            ]);
        // ************ saving files generating array to db ******
                $file = $request->file('file');
                    $fileAr=[];

                if ($request->hasFile('file')) {
                    $fileAr= $this->upFile($file);
       
                }

                $fileAr =  serialize($fileAr);
                $task = new \App\Task();

                $task->taskwhom = $request->input('whom');
                $task->from = \Auth::user()->id;
                $task->description = $request->input('descr');
                $task->deadline = $request->input('time');
                $task->files = $fileAr;
                $task->status = $request->input('status');

                $task->save();
    }


    /*******************************************************
    *
    *   upload file task
    *
    ********************************************************/
        public function upFile($file)
        {
                        $fileAr=[];
                            foreach($file as $files) {

                                echo '<br>'.$files;
                                $path = $files->store('testfiles');
                                    echo '<br>'.$path;
                                $fileAr[]=$path;

                            }
                    return $fileAr;
        }
                
    /*******************************************************
    *
    *   Updating task
    *
    ********************************************************/
    public function upTask($task, $request)
    {


        $task->description = $request->input('descr');
        $task->deadline = $request->input('time');
       // $task->files = null;
        $task->status = $request->input('status');

        $task->save();
    }


    /*******************************************************
    *
    *   Updating task
    *
    ********************************************************/
    public function upMyTask($request, $task, $question)
    {

                    $this->validate(request(), [

            'status' => 'required|string|',
            //'quest' =>'required',
            'taskid' => 'required|integer',
            'from' => 'required|integer',
            'whom'=>'required|integer',
            ]);

        $task->questions = $request->input('quest');
        $task->status = $request->input('status');

        $task->save();

        if($request->input('quest') != null) {
                $question->question = $request->input('quest');
                $question->questfrom = $request->input('from');
                $question->questto = $request->input('whom');
                $question->task_id = $request->input('taskid');


                $question->save();
        }


    }
}