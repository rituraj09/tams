<?php
namespace App\Helpers;
use DB, Validator, Redirect, Auth, Crypt;
use App\Models\School\EmployeeType;
 
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
}