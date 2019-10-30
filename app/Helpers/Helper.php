<?php
namespace App\Helpers;
use DB, Validator, Redirect, Auth, Crypt;
use App\Models\School\EmployeeType;
use App\Models\School\Employee;
 
class Helper
{
    public static function shout(string $string)
    {
        return strtoupper($string);
    }
    
	public static function empType($list = false)
    {
    	if($list) return DB::table('employee_types')->orderBy('id','asc')->pluck('name','id');
		return DB::table('employee_types')->orderBy('id','asc')->get();
        
    } 
    public static function getname($id, $school_id)
    {         
        $emp = Employee::whereStatus(1)->where('unique_id', $id)->where('school_id', $school_id)->first();
     
        return  $emp;     
    }
}