<?php
namespace App\Helpers;
use DB, Validator, Redirect, Auth, Crypt;
use App\Models\School\EmployeeType;
use App\Models\School\Employee;
use App\Models\School\Attendance;
use App\Models\School\AttendanceEmployee;
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
        $attnd = Attendance::whereStatus(1)->where('date', $date)->where('school_id', $school_id)->first(); 
        if(!empty($attnd))
        {
            $id = $attnd->id;
            return $id ;
        }  
        else
        {
            return "0";  
        }
    }
    public static function getAttendanceType( $unique_id, $id )
    {         
        $emp = AttendanceEmployee::whereStatus(1)->where('unique_id', $unique_id)->where('attendance_id', $id)->first();     
        return  $emp;     
    }
    public static function firsthalf($date)
    {        
        $date =  date('Y-m-d', strtotime($date));  
        $currdate = now(); 
        $currdate =$currdate->setTimezone('Asia/Kolkata');
        $dte= now()->toDateString();
        $shiftstart = date('Y-m-d H:i:s', strtotime("11:00:00"));   
        
        if($shiftstart > $currdate && $date ==  $dte) 
        {
            $diff=  "0" ; 
        }
        else
        {
            $diff= "1";
        }
        return  $diff;   
    }
    public static function dateformatcontrol($date)
    {
        $date = Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('H:i:s');
      //  $date = date('d-m-Y H:i:s', strtotime($date)); 
        return $date;
    }
    
    
}