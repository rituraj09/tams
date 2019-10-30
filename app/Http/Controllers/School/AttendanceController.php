<?php

namespace App\Http\Controllers\School;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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

class AttendanceController extends Controller
{
    public function upload() { 
        $activemenu = '02';
        $activelink='02';      
    	return view('school.attendance.attendance_upload', compact('activelink','activemenu' ));
    }
    public function onError(\Throwable $e)
    {
        throw $e;
    }
    public function import(Request $request) 
    {
        $activemenu = '02';
        $activelink='02'; 
        if($request->hasFile('import_file')){
            $path = $request->file('import_file')->getRealPath();              
            
                $data = Excel::load($path, function($reader) {      
                        $results = $reader->setHeaderRow(5);
                        return $results;  
                })->get(); 
           
            if($data->count()){
               
                foreach ($data as $key => $value) { 
                    if(!$value->emp_code)
                    {
                        break;
                    } 
                    $arr[] = $value->all(); 
                }  
                $results = $arr;
                $dateval = Excel::load($path, function($reader) {     
                    $results =  $reader->skipRows(2)->takeRows(1)->get();        
                    $results = $reader->skipColumns(1)->takeColumns(2)->get();
                     return $results;
                 })->get();
                $date =    date('d-m-Y', strtotime($dateval[0][0]));   
                $shift_start = $results[0]['shift_start']->format('H:i:s');  
                $shift_end = $results[0]['shift_end']->format('H:i:s');      
                $school_id=  Auth::user()->id; 
                return view('school.attendance.attendance_view', compact('results','activemenu','activelink','school_id','date','shift_start','shift_end'));
            } 
        } 
    }
    public function savedata(Request $request) 
    {
        $msg    = $class = '';
        $data = $request->all(); 
        $dt = $data['date'];
        $val =[];
        $val['school_id']  = $data['school_id'];
        $val['date'] =  date('Y-m-d', strtotime($data['date']));  
        $count = Attendance::whereStatus(1)->where('school_id', $val['school_id'] )->where('date', $val['date'] )->count();
        if($count<1)
        {
            DB::beginTransaction();
            $attendance = Attendance::create($val); 
            if($attendance) 
            {            
                $sl = $request->sl ;
                $unique_id = $request->unique_id ;
                $shift_start =  $request->shift_start ;
                $shift_end =  $request->shift_end ;
                $in_time =  $request->in_time ;
                $out_time =  $request->out_time ;
                $attendance_type =  $request->attendance_type ; 
                if(!empty( $request->remarks ))
                {
                    $remarks =  $request->remarks ;
                }
                else
                {
                    $remarks = "";
                } 
                foreach($sl as $k => $v)
                {
                    $arr = [];  
                    $arr['attendance_id'] =$attendance->id;
                    $arr['unique_id'] = $unique_id[$k];
                    $arr['shift_start'] = $shift_start[$k] ; 
                    $arr['shift_end'] =   $shift_end[$k] ; 
                    $arr['in_time'] =   $in_time[$k] ; 
                    $arr['out_time'] =   $out_time[$k] ; 
                    $arr['attendance_type'] = $attendance_type[$k];
                    $arr['remarks'] = $remarks[$k];
                    $attendanceemp = AttendanceEmployee::create($arr); 
                }
                if($attendanceemp) {
                    $class      = 'success'; 
                    $msg      = 'Attendance for '.$dt.' has been successfully uploaded.';          
                } 
            }        
            DB::commit(); 
        }
        else
        {
            DB::beginTransaction();
            $attndc = Attendance::whereStatus(1)->where('school_id', $val['school_id'] )->where('date', $val['date'] )->first();
            if($attndc) 
            {            
                $sl = $request->sl ;
                $unique_id = $request->unique_id ; 
                $out_time =  $request->out_time ;
                $in_time =  $request->in_time ;
                $attendance_type =  $request->attendance_type ; 
                if(!empty( $request->remarks ))
                {
                    $remarks =  $request->remarks ;
                }
                else
                {
                    $remarks = "";
                } 
                foreach($sl as $k => $v)
                { 
                    $u_id = $unique_id[$k];
                    $attnd = AttendanceEmployee::whereStatus(1)->where('attendance_id', $attndc->id)->where('unique_id', $u_id)->first();
                    if($attnd)
                    {    
                        $attnd = AttendanceEmployee::find($attnd->id);  
                        if(empty($attnd->in_time))
                        {
                            $attnd->in_time = $in_time[$k] ;
                        } 
                        $attnd->out_time  = $out_time[$k] ;  
                        $attnd->attendance_type  = $attendance_type[$k];
                        $attnd->remarks = $remarks[$k];    
                        $attnd->save();   
                        $class      = 'success'; 
                        $msg      = 'Attendance for '.$dt.' has been successfully updated.';         
                    }
                }  
            }        
            DB::commit(); 
        }
        return Redirect::route('school.attendance.upload')->with('class', $class)->with('msg', $msg);    
    }
}
