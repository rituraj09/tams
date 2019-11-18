<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $table    	= 'districts'; 

    public function schools()
    {
        return $this->hasMany('App\Models\Admin\School','district'); 
    } 
}
