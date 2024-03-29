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

    public function getGradeAttribute()
    {
        // Stop if there are no grades or exams.
        if ($this->exams()->where('grade', '=', null)->count() > 0 || $this->exams()->count() === 0) return null;

        return $this->exams()->sum('grade') / $this->exams()->where('grade', '!=', null)->count('grade');
    }
}