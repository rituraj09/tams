<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $table    	= 'states'; 

    public function districts()
    {
        return $this->hasMany('App\Models\Admin\District','state_id'); 
    } 

    public function schools()
    {
        return $this->hasMany('App\Models\Admin\School','state'); 
    } 
}
