<?php

namespace App\Http\Controllers\School;
 
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\School\Employee;
use App\Models\School\EmployeeType;
use App\Models\School\AttendanceEmployee;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Cache; 
use App\Models\School\Test;
use Excel;
use App\Helpers\Helper;
use Session;
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
                $msg      = 'Teacher has been added successfully.';          
            }
            else
            {
                $class      = 'failed'; 
                $msg      = 'Unable to add Teacher!'; 
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
        $msg="";
        return view('school.teacher.view', compact('results','activelink','activemenu','msg')); 
    }
    
    public function edit($id) { 
        $activemenu = 'a';
        $activelink='a2';     
        $id         = Crypt::decrypt($id);
        $teacher    = Employee::find($id); 
        $empType  = Helper::empType($list = true); 
         
        return view('school.teacher.edit', compact('teacher','empType','activelink','activemenu','id')); 
    }
    public function update(Request $request, $id) {
        $msg    = $class = '';
        $data = $request->all(); 
        $id     = Crypt::decrypt($id); 
        $data['school_id']=  Auth::user()->id; 
        $data['dor'] =  date('Y-m-d', strtotime($data['dor'])); 
        if( $data['dob'])
        {
            $data['dob'] =  date('Y-m-d', strtotime($data['dob'])); 
        }
        if( $data['doj'])
        {
            $data['doj'] =  date('Y-m-d', strtotime($data['doj'])); 
        } 
        $validator = Validator::make($data, Employee::$rulesedit);         
        if ($validator->fails())
        {
             return Redirect::back()->withErrors($validator)->withInput();  
        }  
        $cnt = Employee::whereStatus(1)->where('school_id', $data['school_id'])->where('unique_id', $data['unique_id'])->where('id','<>', $id)->count(); 
    
        if($cnt > 0)
        {
                $class      = 'failed'; 
                $msg      = 'Teacher with this Biometric code is already available!';  
                return Redirect::back()->with('class', $class)->with('msg', $msg)->withInput();
        }
       else
       {
            DB::beginTransaction();
            $employee = Employee::find($id);  
                $employee->fill($data);  
                $employee->save();   
                if($employee) {
                    $class      = 'success'; 
                    $msg      = $data['first_name'].' '.$data['last_name'].' has been updated successfully.';          
                }                     
                
                else
                {
                    $class      = 'failed'; 
                    $msg      = 'Unable to updated Teacher!'; 
                }
            DB::commit();    
            return Redirect::route('school.teacher.view')->with('class', $class)->with('msg', $msg);    
        }
    }
  
    public function delete($id) {
        $msg    = $class = '';   
        $id     = Crypt::decrypt($id);  
        $cnt = AttendanceEmployee::whereStatus(1)->where('unique_id', $id)->count();  
        if($cnt < 1)        
        {
            DB::beginTransaction();
                $employee = Employee::find($id);  
                $employee["status"]=0;  
                $employee->save();   
                if($employee) {
                    $class      = 'success'; 
                    $msg      = 'Teacher has been deleted successfully.';          
                }                     
                
                else
                {
                    $class      = 'failed'; 
                    $msg      = 'Unable to delete Teacher!'; 
                }
            DB::commit();    
            return Redirect::route('school.teacher.view')->with('class', $class)->with('msg', $msg);    
        } 
        else
        {  
            $class      = 'failed'; 
            $msg      = 'Unable to delete Teacher!'; 
            return Redirect::route('school.teacher.view')->with('class', $class)->with('msg', $msg);    
        }
    }
}
