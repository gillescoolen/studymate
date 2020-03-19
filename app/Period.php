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

    public function modules() {
        return $this->hasMany('App\Module');
    }

    public function getPercentageAttribute()
    {
        // foreach () {
        //     return $this->hasMany('App\Module')->sum('ec');
        // }
        return $this->hasMany('App\Module')->sum('ec');
    }
}
