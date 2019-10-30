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
                $date =    $dateval[0][0];
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
    }
}
