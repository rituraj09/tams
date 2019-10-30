<?php
namespace App\Helpers;
use DB, Validator, Redirect, Auth, Crypt;
use App\Models\School\EmployeeType;
use App\Models\School\Employee;
use App\Models\School\Attendance;
use Carbon\Carbon;
 
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

    public static function getattand($date, $school_id)
    {         
        $date =  date('Y-m-d', strtotime($date));  
        $attnd = Attendance::whereStatus(1)->where('date', $date)->where('school_id', $school_id)->count(); 
        if( $attnd > 0)
        {
            return "1";
        }  
        else
        {
            return "0";  
        }
    }
    public static function firsthalf($date)
    {        
        $date =  date('Y-m-d', strtotime($date));  
        $currdate = Carbon::now(); 
        $dte= Carbon::today()->toDateString();
        $date2= Carbon::parse("11:00:00");  
        if($currdate < $date2 && $date ==  $dte) 
        {
            $diff="0";
        }
        else
        {
            $diff= "1";
        }
        return  $diff;   
    }
    public static function secondhalf($date)
    {        
        $date =  date('Y-m-d', strtotime($date));  
        $currdate = Carbon::now(); 
        $dte= Carbon::today()->toDateString();
        $date2= Carbon::parse("23:00:00");  
        if($currdate < $date2 && $date ==  $dte) 
        {
            $diff="0";
        }
        else
        {
            $diff= "1";
        }
        return  $diff;   
    }
}