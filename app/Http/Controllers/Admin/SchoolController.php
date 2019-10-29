<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\School;
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
}
