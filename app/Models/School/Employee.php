<?php

namespace App\Models\School;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table    = 'employees';
    public $primaryKey  = 'id';
    public $timestamps  = true;
    protected $fillable 	= array('first_name','last_name','school_id','unique_id','phone',
     'email','address','pincode','dob','doj','dor','employee_type','remarks');  
    public static $rules 	= [ 
        
        'first_name' 				=> 'required|max:100',  
        'last_name' 				=> 'required|max:100',   
        'school_id' 				=> 'required|numeric',   
        'unique_id'                 => 'required|unique:employees,unique_id, school_id',   
        'phone' 				    => 'required|max:15',    
        'dor' 				        => 'required|date',   
        'employee_type' 			=> 'required|numeric'    
    ]; 
    public $messsages = array(
        'unique_id.unique'          =>  'this biometric code is already available',
	);
    public function school()
    {
        return $this->belongsTo('App\Models\Admin\School','school_id'); 
    } 
    public function employee_types()
    {
        return $this->belongsTo('App\Models\School\EmployeeType','employee_type'); 
    }
    public function emp()
    {
        return $this->hasMany('App\Models\School\EmpLocal','unique_id'); 
    }
}
