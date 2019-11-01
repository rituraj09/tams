<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;   
use App\Models\Admin\School;
use App\Models\School\Employee;
use App\Models\School\EmployeeType;
use App\Models\School\Attendance;
use App\Models\School\AttendanceEmployee;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Cache; 
use App\Models\School\Test;
use Excel;
use App\Helpers\Helper;


use DB, Validator,  Redirect, Auth, Crypt, Hash; 

class HomeController extends Controller
{
  /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $activemenu = '01';
        $activelink='01'; 
        $date = now(); 
        $date =  date('Y-m-d', strtotime($date));  
        $school = School::whereStatus(1)->where('isactive',1)->count(); 
        $teacher = Employee::whereStatus(1)->where('isactive',1)->count();
      
        $attendance = AttendanceEmployee::join('attendances', 'attendances.id', '=', 'attendance_employees.attendance_id')
        ->where('attendances.status','1')->where('attendances.date',$date)
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
        $percent_of_Present = $present*100/$teacher;

        $lastattnd = AttendanceEmployee::join('attendances', 'attendances.id', '=', 'attendance_employees.attendance_id')
        ->where('attendances.status','1')
        ->where('attendance_type','1')->orWhere('attendance_type','4')
        ->select('date' ,DB::raw('count(attendance_employees.id) as val') )
        ->groupBy('date')->orderBy('attendances.date', 'DESC')->take(5)->get(); 

        $schools_id = Attendance::where('date', $date)->select('school_id')->get();
        $miss = School::whereNotIn('id', $schools_id)->select('name','id')->get();    
        $results = School::whereStatus(1)->where('isactive',1)->get(); 
         return view('admin.home',compact('activelink','activemenu', 'teacher', 'results','school','present','absent', 'leave', 'p', 'mis','percent_of_Present','date','lastattnd','miss' ));
    
    }
}
