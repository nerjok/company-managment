<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

use Illuminate\Support\Facades\View;
use \App\User;
//use App\Http\Controllers\MyTaskController;
//use \App\Repositories\TaskRepository;


class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot(User $user)
    {
        $this->registerPolicies();


        view()->composer('layouts.panel', function($view){

            $view->with('mytasks', "\App\User@tasks");
        });// these 4 line to delete


        View::composer(
            'layouts.panel', 'App\Http\ViewComposers\ProfileComposer'
        );

    }
}
