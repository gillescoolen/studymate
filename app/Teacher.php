<?php

namespace App;

use Illuminate\Support\Facades\Crypt;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $table = 'teacher';
    protected $primaryKey = 'id';

    protected $fillable = [
        'firstname',
        'lastname',
    ];

    public function modules() {
        return $this->hasMany('App\Teacher');
    }

    public function setFirstnameAttribute($string) {
        $this->attributes['firstname'] = Crypt::encryptString($string);
    }

    public function setLastnameAttribute($string) {
        $this->attributes['lastname'] = Crypt::encryptString($string);
    }

    public function getFirstnameAttribute($string) {
        return Crypt::decryptString($string);
    }

    public function getLastnameAttribute($string) {
        return Crypt::decryptString($string);
    }
}