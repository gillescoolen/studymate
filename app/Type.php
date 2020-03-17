<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $table = 'type';
    protected $primaryKey = 'id';

    public function exam()
    {
        return $this->hasMany('App\Exam');
    }
}
