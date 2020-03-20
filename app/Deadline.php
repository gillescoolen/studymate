<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deadline extends Model
{
    protected $table = 'deadline';
    protected $primaryKey = 'id';

    protected $fillable = [
        'date',
        'exam_id',
    ];

    public function exam()
    {
        return $this->belongsTo('App\Exam');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }
}
