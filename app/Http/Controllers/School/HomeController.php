<?php

namespace App\Http\Controllers\School;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller; 
use App\Models\School\Employee;
use App\Models\School\EmployeeType;
use App\Models\School\Attendance;
use App\Models\School\AttendanceEmployee;
use App\Models\School\Emplocal;
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
        $school_id=  Auth::user()->id; 
        $date = now(); 
        $date =  date('Y-m-d', strtotime($date));  
        $teacher = Employee::whereStatus(1)->where('school_id',$school_id)->count();

      
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
            $present =$attendance[0]["val"];
            $p = $present;
        } 
        if(!empty($attendance[3]["val"]))
        {
            $mis = $attendance[3]["val"];
        } 
        if(!empty($attendance[1]["val"]))
        {
            $absent =$attendance[1]["val"];
        } 
        if(!empty($attendance[2]["val"]))
        {
            $leave =$attendance[2]["val"];
        } 
        $present =   $present+$mis;
     
    
         

         $results = AttendanceEmployee::join('attendances', 'attendances.id', '=', 'attendance_employees.attendance_id')
        ->where('attendances.status','1')->where('attendances.date',$date)->where('attendances.school_id',$school_id)
        ->select('attendance_employees.unique_id','shift_start','attendance_employees.shift_end',
        'attendance_employees.in_time','attendance_employees.out_time',
         'attendance_employees.attendance_type','attendance_employees.remarks','attendances.upload_status')->orderBy('attendance_employees.id','ASC')->get();
       
         return view('school.home',compact('activelink','activemenu',  'results','teacher','present','absent', 'leave', 'p', 'mis' ));
    }
}
