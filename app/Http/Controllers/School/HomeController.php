<?php

namespace App\Http\Controllers\School;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller; 
use App\Models\School\Employee;
use App\Models\School\EmployeeType;
use App\Models\School\Attendance;
use App\Models\Admin\School;
use App\Models\School\AttendanceEmployee; 
use App\Models\School\AttendanceType;
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
    protected $user;
    public function __construct()
    { 
        $this->middleware('auth'); 
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function setpassword()
    {
        $activemenu = '';
        $activelink=''; 
        if(Auth::user()->set_password==0)
        {
            return view('school.setpassword', compact('activelink','activemenu' ));
        }
        return Redirect::route('school.home');
    }
    public function savepassword(Request $request)
    {
        $msg    = $class = '';
        $data = $request->all();  
        $id     = Auth::user()->id; 
        $validator = Validator::make($data, School::$rulespassword); 
        if ($validator->fails())
        {
            return Redirect::back()->withErrors($validator)->withInput();  
        } 
        else
        {  
            DB::beginTransaction(); 
            $School = School::find($id);                  
            $data['password'] = bcrypt($data['password']); 
            $data['set_password'] = 1; 
            $School->fill($data);  
            $School->save();   
            if($School) {
                $class      = 'success'; 
                $msg      = 'Password has been updated successfully.';          
            }
            else
            {
                $class      = 'failed'; 
                $msg      = 'Unable to updated password!'; 
            }    
            DB::commit();    
            return Redirect::route('school.home')->with('class', $class)->with('msg', $msg);   
            
        } 
    }
    public function index()
    {
        $setpwd=Auth::user()->set_password ; 
        if($setpwd==0)
        {
            return redirect('school/setpassword');
        }     
        $activemenu = '01';
        $activelink='01';
        $school_id=  Auth::user()->id ; 
        $date = now(); 
        $date =  date('Y-m-d', strtotime($date));  
       
        $teacher = Employee::whereStatus(1)->where('school_id',$school_id)->count();
        $attendance = AttendanceEmployee::join('attendances', 'attendances.id', '=', 'attendance_employees.attendance_id')
        ->leftjoin('attendance_types', 'attendance_types.id', '=', 'attendance_employees.attendance_type')
        ->where('attendances.status','1')->where('attendances.date',$date)->where('attendances.school_id',$school_id)
        ->select('attendance_employees.attendance_type as status_count' ,DB::raw('count(attendance_employees.id) as val') )
        ->groupBy('attendance_type')->orderBy('attendance_type', 'ASC')->get();
 
            $val1=0;
            $val2=0;
            $val3=0;
            $val4=0; 
        
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
    
         

         $results = AttendanceEmployee::join('attendances', 'attendances.id', '=', 'attendance_employees.attendance_id')
        ->where('attendances.status','1')->where('attendances.date',$date)->where('attendances.school_id',$school_id)
        ->select('attendance_employees.unique_id','shift_start','attendance_employees.shift_end',
        'attendance_employees.in_time','attendance_employees.out_time',
         'attendance_employees.attendance_type','attendance_employees.remarks','attendances.upload_status')->orderBy('attendance_employees.id','ASC')->get();
 
         return view('school.home',compact('activelink','activemenu',  'results','teacher','present','absent', 'leave', 'p', 'mis' ));
    }

    public function changepassword()
    {
        $activemenu = '';
        $activelink='';      
    	return view('school.changepassword', compact('activelink','activemenu'));
    }
    public function update_password(Request $request)
    {  
      
        if (!(Hash::check($request->get('old_password'), Auth::user()->password))) {
            $class      = 'failed'; 
            return Redirect::back()->with('class', $class)->with('msg','Current password does not match');   
        } 
        if(strcmp($request->get('old_password'), $request->get('new_password')) == 0){
            $class      = 'failed'; 
            return Redirect::back()->with('class', $class)->with('msg','New Password cannot be same as your current password');   
 
        }
        $validatedData = $request->validate([
            'new_password' => 'required|min:6|confirmed',
            'new_password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:6' 
        ]);
        //Change Password
        $user = Auth::user(); 
        $user->password = bcrypt($request->get('new_password'));  
        $user->save();
        $class      = 'success'; 
        $msg      = 'Password has been updated successfully.';        
        return Redirect::route('school.profile.password')->with('class', $class)->with('msg', $msg);  
    }
    public function details()
    {
        $activemenu = '';
        $activelink='';      
        
        $school = School::find(Auth::user()->id);   
    	return view('school.details', compact('activelink','activemenu','school'));
    }
}
