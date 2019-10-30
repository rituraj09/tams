<?php

namespace App\Models\School;

use Illuminate\Database\Eloquent\Model;

class EmployeeType extends Model
{
    protected $table        = 'employee_types';
    public $primaryKey      = 'id';
    public $timestamps      = true;
    protected $fillable 	= array('name');  
    public static $rules 	= [
        'name' 				=> 'required|max:227',   
    ]; 
    public function employees()
    {
        return $this->hasMany('App\Models\School\Employee','employee_type'); 
	} 
}
