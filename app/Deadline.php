<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deadline extends Model
{
    protected $table = 'deadline';
    protected $primaryKey = 'id';

    protected $fillable = [
        'date',
        'final_id',
    ];

    public function final()
    {
        return $this->belongsTo('App\Exam');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }
}
