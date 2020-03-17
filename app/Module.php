<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    protected $table = 'module';
    protected $primaryKey = 'id';
    
    public function period() {
        return $this->belongsTo('App\Period');
    }

    public function teacher()
    {
        return $this->belongsTo('App\Teacher');
    }

    
    public function finals()
    {
        return $this->hasMany('App\Exam');
    }
}
