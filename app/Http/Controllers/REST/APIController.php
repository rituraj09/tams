<?php

namespace App\Http\Controllers\REST; 

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\School;
use App\Models\School\Employee;
use App\Models\School\EmployeeType;
use App\Models\School\Attendance;
use App\Models\School\AttendanceEmployee;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Cache;  
use App\Helpers\Helper;


use DB, Validator,  Redirect, Auth, Crypt, Hash; 

class APIController extends Controller
{
    public function getDetails(Request $request) {
        $id = $request->id; 
        $details = Employee::whereStatus(1)->where('id',$id)->first(); 
        $val=  EmployeeType::find($details['employee_type']);
        $details["emp_type"] =   $val["name"];
        return $details;
    }
    public function postBlock(Request $request) {
        $id = $request->id; 
        $block = $request->block; 
        $School = School::find($id);   
        $School->isactive = $block;  
        $School->save();  
        return  $block ;
    }
}
