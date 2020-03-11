<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    protected $table = 'module';
    protected $primaryKey = 'id';
    
    public function Period(){
        return $this->belongsTo('App\Period');
    }
}
