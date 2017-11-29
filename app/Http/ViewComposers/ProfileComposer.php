<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;

use App\Repositories\UsersRepository;
use App\Repositories\TaskRepository;

use App\User;

class ProfileComposer
{

    protected $users;
    protected $task;

    /*************************************************
     *
     * Create a new profile composer.
     *
     *************************************************/

    public function __construct(UsersRepository $users, 
                                TaskRepository $task
                                )
    {
        $this->users = $users; //userlist
                $this->task = $task;//my tasks
    }

    /*****************************************************
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     ***************************************************/
    public function compose(View $view)
    {
                $view->with('count', $this->users->indRep());

                $view->with('task', $this->task->indRep2());

                $view->with('employees', $this->task->indRep());
    }
}
