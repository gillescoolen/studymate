<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Period extends Model
{
    protected $table = 'period';
    protected $primaryKey = 'id';

    protected $fillable = [
        'semester',
        'period',
    ];

    public function modules()
    {
        return $this->hasMany('App\Module');
    }

    // public function getPercentageAttribute()
    // {
    //     $modules = $this->modules;
    //     $exams = 0;
    //     $passed = 0;

    //     foreach ($modules as $module) {
    //         $exams += $module->exams()->count();
    //         $passed += $module->exams()->where('grade', '>=', 5.5)->count('grade');
    //     }

    //     if ($exams === 0) {
    //         return 0;
    //     }

    //     $result = ($passed / $exams) * 100;

    //     return $result;
    // }

    public function getPercentageAttribute()
    {
        $modules = $this->modules;
        $completedModules = $this->filterCompleted($modules->all());

        $ec = 0;
        $completedEc = 0;

        foreach ($modules as $module) $ec += $module->ec;
        
        foreach ($completedModules as $module) $completedEc += $module->ec;

        if ($ec === 0) return $ec;

        return ($completedEc / $ec) * 100;
    }

    private function filterCompleted($modules) {
        return array_filter($modules, function($module) {
            return $module->grade !== null && $module->grade >= 5.5;
        });
    }

    public function getEcAttribute()
    {
        return $this->modules()->sum('ec');
    }
}
