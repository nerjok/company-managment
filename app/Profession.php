<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;


class Profession extends Model
{
         use SoftDeletes;
    
    protected $dates = ['deleted_at']; //the field for sof delete

    protected $fillable = [
        'position', 'depends_on', 'pos_level',
    ];




        public function users()
        {


               return $this->hasMany(\App\User::class, 'depends_on');
        }
}
