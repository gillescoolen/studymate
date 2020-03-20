<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table = 'tag';
    protected $primaryKey = 'name';

    public function deadlines()
    {
        return $this->belongsToMany('App\Deadline');
    }
}
