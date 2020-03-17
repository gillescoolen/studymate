<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    protected $table = 'final';
    protected $primaryKey = 'id';

    public function type() {
        return $this->belongsTo('App\Type');
    }

    public function module() {
        return $this->belongsTo('App\Module');
    }
}