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
            return Redirect::back()->withErrors('success1', 'Teacher with this Biometric code is already available!')->withInput();
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
       
        $results = Employee::whereStatus(1)->orderBy('unique_id', 'ASC')->paginate(10);  
        $activemenu = 'a';
        $activelink='a2'; 
        return view('school.teacher.view', compact('results','activelink','activemenu')); 
    }
    public function import(Request $request) 
    {
        $activemenu = 'a';
        $activelink='a2'; 
        if($request->hasFile('import_file')){
            $path = $request->file('import_file')->getRealPath();
          //  $data = \Excel::load($path)->skipRows(4)->get();
           // $path = $file->getRealPath();
            $data = Excel::load($path, function($reader) {
               // $results = $reader->skipRows(4)->get();             
                $results = $reader->setHeaderRow(5);
                return $results;
            })->get();
          
            if($data->count()){
                foreach ($data as $key => $value) {
                  // $arr[] = ['name' => $value->name, '' ]; 
                  if(!$value->emp_code)
                  {
                      break;
                  }
                   $arr[] = $value->all(); 
                }  
                $results = $arr;
                
                $date =  date('d-m-Y', strtotime($results[0]['in_time']));  
                $shift_start = $results[0]['shift_start']->format('H:i:s');  
                $shift_end = $results[0]['shift_end']->format('H:i:s');      
                $school_id=  Auth::user()->id; 
                return view('school.attendance.attendance_view', compact('results','activemenu','activelink','school_id','date','shift_start','shift_end'));
            } 
        } 
    }
}
