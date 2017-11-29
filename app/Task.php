<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
        protected $fillable = [
        'deadline', 'description', 'files', 'status','taskwhom', 'questions', 'questdate', 'for',
    ];



//Task dependency to the person who it is aimed
            public function createdby()

            {


                                return $this->belongsTo(User::class, 'from');//keitimas

            }

//Task dependency to the person who has written it
            public function operatedby()
            {

                                return $this->belongsTo(User::class, 'taskwhom');//keitimas

            }

            public function question()
            {

                    return $this->hasmany(\App\Question::class, 'task_id');
            }
}
