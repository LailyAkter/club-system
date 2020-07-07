<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;

class designation extends Model implements Auditable
{
    use SoftDeletes ,\OwenIt\Auditing\Auditable;

    protected $auiditInclude = ['designation', 'country_id'];

    public function country (){
        return $this->belongsTo(Country::class);
    }
    
}
