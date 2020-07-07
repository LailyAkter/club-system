<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;

class Country extends Model implements Auditable
{
    use SoftDeletes,\OwenIt\Auditing\Auditable;

    protected $auiditInclude = ['country', 'embassy', 'address'];

    public function designations (){
        return $this->hasMany(Designation::class);
    }

    public function persons (){
        return $this->hasMany(Person::class);
    }
}
