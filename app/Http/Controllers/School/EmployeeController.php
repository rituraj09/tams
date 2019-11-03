<?php

namespace App\Http\Controllers\School;
 
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\School\Employee;
use App\Models\School\EmployeeType;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Cache; 
use App\Models\School\Test;
use Excel;
use App\Helpers\Helper;


use DB, Validator,  Redirect, Auth, Crypt, Hash;
class EmployeeController extends Controller
{
    public function createTeacher() { 
        $activemenu = 'a';
        $activelink='a1';     
        $empType  = Helper::empType($list = true); 
    	return view('school.teacher.create', compact('activelink','activemenu' ,'empType'));
    }
    public function saveTeacher(Request $request) { 
        $msg    = $class = '';
        $data = $request->all(); 
        $data['dor'] =  date('Y-m-d', strtotime($data['dor'])); 
        if( $data['dob'])
        {
            $data['dob'] =  date('Y-m-d', strtotime($data['dob'])); 
        }
        if( $data['doj'])
        {
            $data['doj'] =  date('Y-m-d', strtotime($data['doj'])); 
        }
        $data['school_id']=  Auth::user()->id; 
        $validator = Validator::make($data, Employee::$rules);         
        if ($validator->fails()) return Redirect::back()->withErrors($validator)->withInput();
       
        $cnt = Employee::whereStatus(1)->where('school_id', $data['school_id'])->where('unique_id', $data['unique_id'])->count(); 
       if($cnt > 0)
       {
            $class      = 'failed'; 
            $msg      = 'Teacher with this Biometric code is already available!';  
            return Redirect::back()->with('class', $class)->with('msg', $msg)->withInput();
       }
       else
       {
            DB::beginTransaction();
            $employee = Employee::create($data);  
            if($employee) {
                $class      = 'success'; 
                $msg      = 'Teacher has been registered successfully.';          
            }
            else
            {
                $class      = 'failed'; 
                $msg      = 'Unable to register School!'; 
            }
            DB::commit();    
            return Redirect::route('school.teacher.create')->with('class', $class)->with('msg', $msg);    
        }
       
    }
    public function view_employees() { 
        $uid=  Auth::user()->id; 
        $results = Employee::whereStatus(1)->where('school_id',$uid)->orderBy('unique_id', 'ASC')->paginate(30);  
        $activemenu = 'a';
        $activelink='a2'; 
        return view('school.teacher.view', compact('results','activelink','activemenu')); 
    }
  
}
