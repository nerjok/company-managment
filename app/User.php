<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use Notifiable;

     use SoftDeletes;
    
    protected $dates = ['deleted_at']; //the field for sof delete

    protected $fillable = [
        'name', 'email', 'password', 'depends_on', 'range'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];




            public function profession()

            {


                                return $this->belongsTo(Profession::class, 'depends_on');//keitimas

            }

            public function bossTo()

            {

                   // $bossto = \App\Profession::select('position')->where();

                return $this->hasMany(Profession::class, 'depends_on', 'id');

            }


            public function tasks()
            {

             return $this->hasMany(\App\Task::class, 'id', 'taskwhom');

            }


            public function worker()
            {

                return  User::max('range');

                return (Auth::user()->range < $levels);
            }



}
