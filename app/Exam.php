<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    protected $table = 'exam';
    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'ec',
        'module_id',
        'type_id',
    ];

    public function type() {
        return $this->belongsTo('App\Type');
    }

    public function module() {
        return $this->belongsTo('App\Module');
    }

    public function deadline() {
        return $this->hasOne('App\Deadline');
    }
}