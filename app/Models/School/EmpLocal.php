<?php

namespace App\Models\School;

use Illuminate\Database\Eloquent\Model;

class EmpLocal extends Model
{
    protected $table    = 'employees';
    public $primaryKey  = 'unique_id';
    public $timestamps  = true;
    protected $fillable 	= array('first_name','last_name','school_id','unique_id','phone',
     'email','address','pincode','dob','doj','dor','employee_type','remarks');  
    
    public function attnd()
    {
        return $this->hasMany('App\Models\School\AttendanceEmployee','unique_id'); 
    }
}
