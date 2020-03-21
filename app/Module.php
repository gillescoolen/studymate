<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    protected $table = 'module';
    protected $primaryKey = 'id';
    
    protected $fillable = [
        'name',
        'ec',
        'period_id',
        'teacher_id',
    ];

    public function period() {
        return $this->belongsTo('App\Period');
    }

    public function teacher()
    {
        return $this->belongsTo('App\Teacher');
    }
   
    public function exams()
    {
        return $this->hasMany('App\Exam');
    }

    public function getModuleTotalAttribute() {
        return $this->exams()->sum('ec');
    }
}