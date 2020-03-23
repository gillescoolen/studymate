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

    public function getEcAttribute()
    {
        return $this->modules()->sum('ec');
    }

    /**
     * Get percentage of received EC.
     *
     * @return float
     */
    public function getPercentageAttribute()
    {
        $ec = 0;
        $modules = $this->modules;

        $completedEc = 0;
        $completedModules = $this->filterCompleted($modules->all());

        foreach ($modules as $module) $ec += $module->ec;
        
        foreach ($completedModules as $module) $completedEc += $module->ec;

        // Stop if there is no EC to devide with.
        if ($ec === 0) return $ec;

        return ($completedEc / $ec) * 100;
    }

    /**
     * Filter the passed modules from the un-passed modules.
     * 
     * @return array
     */
    private function filterCompleted($modules) {
        return array_filter($modules, function($module) {
            return $module->grade !== null && $module->grade >= 5.5;
        });
    }

}
