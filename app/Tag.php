<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table = 'tag';
    protected $primaryKey = 'name';
    protected $keyType = 'string';
    public $incrementing = false;
    
    public function deadlines()
    {
        return $this->belongsToMany('App\Deadline');
    }
}
