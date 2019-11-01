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
    public static function getAttendanceType( $emp_id, $id )
    {         
        $emp = AttendanceEmployee::whereStatus(1)->where('unique_id', $emp_id)->where('attendance_id', $id)->first();     
        return  $emp;     
    }
    public static function totalattendance( $date )
    {         
        $emp = AttendanceEmployee::join('attendances', 'attendances.id', '=', 'attendance_employees.attendance_id')
        ->where('attendances.status','1')->where('attendances.status', 1)->where('date', $date)->count();     
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
    public static function teachers($school_id)
    {
       
        $teacher = Employee::whereStatus(1)->where('isactive',1)->where('school_id',$school_id)->count();
        return $teacher;
    }
    public static function attendance( $school_id,$date)
    {
        $attend = Attendance::whereStatus(1)->where('date',$date)->where('school_id',$school_id)->first();
        if($attend)
        {
            $attendance = AttendanceEmployee::join('attendances', 'attendances.id', '=', 'attendance_employees.attendance_id')
            ->where('attendances.status','1')->where('attendances.date',$date)->where('attendances.school_id',$school_id)
            ->select('attendance_employees.attendance_type as status_count' ,DB::raw('count(attendance_employees.id) as val') )
            ->groupBy('attendance_type')->orderBy('attendance_type', 'ASC')->get();
        
            $mis=0;
            $present=0;
            $absent=0;
            $leave=0;  
            $p = 0;
            if(!empty($attendance[0]["val"]))
            {
                if($attendance[0]["status_count"]=="1")
                { 
                    $present =$attendance[0]["val"];
                    $p = $present;
                }
                if($attendance[0]["status_count"]=="2")
                { 
                    $absent =$attendance[0]["val"];
                }
                if($attendance[0]["status_count"]=="3")
                { 
                    $leave =$attendance[0]["val"];
                }
                if($attendance[0]["status_count"]=="4")
                { 
                    $mis =$attendance[0]["val"];
                } 
            } 
            if(!empty($attendance[3]["val"]))
            {
                if($attendance[3]["status_count"]=="1")
                { 
                    $present =$attendance[3]["val"];
                    $p = $present;
                }
                if($attendance[3]["status_count"]=="2")
                { 
                    $absent =$attendance[3]["val"];
                }
                if($attendance[3]["status_count"]=="3")
                { 
                    $leave =$attendance[3]["val"];
                }
                if($attendance[3]["status_count"]=="4")
                { 
                    $mis =$attendance[3]["val"];
                } 
            } 
            if(!empty($attendance[1]["val"]))
            {
                if($attendance[1]["status_count"]=="1")
                { 
                    $present =$attendance[1]["val"];
                    $p = $present;
                }
                if($attendance[1]["status_count"]=="2")
                { 
                    $absent =$attendance[1]["val"];
                }
                if($attendance[1]["status_count"]=="3")
                { 
                    $leave =$attendance[1]["val"];
                }
                if($attendance[1]["status_count"]=="4")
                { 
                    $mis =$attendance[1]["val"];
                } 
            } 
            if(!empty($attendance[2]["val"]))
            {
                if($attendance[2]["status_count"]=="1")
                { 
                    $present =$attendance[2]["val"];
                    $p = $present;
                }
                if($attendance[2]["status_count"]=="2")
                { 
                    $absent =$attendance[2]["val"];
                }
                if($attendance[2]["status_count"]=="3")
                { 
                    $leave =$attendance[2]["val"];
                }
                if($attendance[2]["status_count"]=="4")
                { 
                    $mis =$attendance[2]["val"];
                } 
            } 
                $present =   $present+$mis;    
                $arr = []; 
                $arr['status'] = 1;
                $arr['p'] = $present;
                $arr['a'] = $absent;
                $arr['l'] = $leave;
                $arr['m'] = $mis;
                return $arr; 
        } 
        else { 
            $arr = []; 
            $arr['status'] = 0;
            return $arr; 
        }
        
    
    }
    
}