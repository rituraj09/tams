<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\School;
use App\Models\School\Employee; 
use App\Models\School\Attendance;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Cache;

use DB, Validator, Redirect, Auth, Crypt, Hash;
class SchoolController extends Controller
{ 

    public function createSchool() { 
        $activemenu = 'a';
        $activelink='a1'; 
    	return view('admin.school.create',compact('activelink','activemenu'));
    }

    public function saveSchool(Request $request) {
        $msg    = $class = '';
        $data = $request->all(); 
        $data['state'] = 1;
        $data['district'] = 1;
        DB::beginTransaction();
        $validator = Validator::make($data, School::$rules); 
        if ($validator->fails())
        {
             return Redirect::back()->withErrors($validator)->withInput();  
        } 
        else
        { 
            $data['password'] = bcrypt($data['password']); 
            $School = School::create($data);  
            if($School) {
                $class      = 'success'; 
                $msg      = 'School has been registered successfully.';          
            }
            else
            {
                $class      = 'failed'; 
                $msg      = 'Unable to register School!'; 
            }
            DB::commit();    
            return Redirect::route('admin.school.create')->with('class', $class)->with('msg', $msg);    
        }  
    }
    public function view_schools() {  
        $results = School::whereStatus(1)->orderBy('name', 'ASC')->get();  
        $activemenu = 'a';
        $activelink='a2'; 
        return view('admin.school.view_schools', compact('results','activelink','activemenu')); 
    }
       
    public function edit($id) {
        $activemenu = 'a';
        $activelink='a2';
        $id         = Crypt::decrypt($id);
        $school    = School::find($id); 
         
        return view('admin.school.edit', compact('school','activelink','activemenu','id'));
    }
    public function update(Request $request, $id) {
        $msg    = $class = '';
        $data = $request->all();  
        $id     = Crypt::decrypt($id); 
        DB::beginTransaction();
        $validator = Validator::make($data, School::$rulesedit); 
        if ($validator->fails())
        {
             return Redirect::back()->withErrors($validator)->withInput();  
        } 
        else
        {  
            $cnt = School::whereStatus(1)->where('email', $data['email'])->where('id','<>',$id)->count();  
            if($cnt > 0)
            {
      
                $class      = 'failed'; 
                $msg      = 'Email id is already available!';  
                return Redirect::back()->with('class', $class)->with('msg', $msg)->withInput();
            }
            else{
                $School = School::find($id);  
                $School->fill($data);  
                $School->save();   
                if($School) {
                    $class      = 'success'; 
                    $msg      = $data['name'].' has been updated successfully.';          
                }
                else
                {
                    $class      = 'failed'; 
                    $msg      = 'Unable to updated School!'; 
                }
            }
            DB::commit();    
            return Redirect::route('admin.school.view')->with('class', $class)->with('msg', $msg);    
        }  
    }
    public function password($id) {
        $activemenu = 'a';
        $activelink='a2';
        $id         = Crypt::decrypt($id);
        $school    = School::find($id); 
         
        return view('admin.school.password', compact('school','activelink','activemenu','id'));
    }
    public function update_password(Request $request, $id) {
        $msg    = $class = '';
        $data = $request->all();  
        $id     = Crypt::decrypt($id); 
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
            $School->fill($data);  
            $School->save();   
            if($School) {
                $class      = 'success'; 
                $msg      = 'password has been updated successfully.';          
            }
            else
            {
                $class      = 'failed'; 
                $msg      = 'Unable to updated password!'; 
            }    
            DB::commit();    
            return Redirect::route('admin.school.view')->with('class', $class)->with('msg', $msg);  
            
        } 
            
    }
    public function delete($id) {
        $msg    = $class = ''; 
        $id     = Crypt::decrypt($id);  
        $cnt = Employee::whereStatus(1)->where('school_id',  $id )->count();  
        if($cnt > 0)
        {
            $class      = 'failed'; 
            $msg      = 'You cannot delete this School!';  
            return Redirect::back()->with('class', $class)->with('msg', $msg); 
        } 
        else
        { 
            DB::beginTransaction(); 
            $School = School::find($id);                  
            $School["status"]=0;  
            $School->save();   
            if($School) {
                $class      = 'success'; 
                $msg      = 'School has been deleted successfully.';          
            }                     
            
            else
            {
                $class      = 'failed'; 
                $msg      = 'Unable to delete School!'; 
            }
            DB::commit();    
            return Redirect::route('admin.school.view')->with('class', $class)->with('msg', $msg);  
            
        } 
            
    }
    
}
