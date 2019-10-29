<?php

namespace App\Http\Controllers\School;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\School\Teacher;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Cache; 
use DB, Validator, Redirect, Auth, Crypt, Hash;

class TeacherController extends Controller
{
    public function createTeacher() { 
        $activemenu = 'a';
        $activelink='a1'; 
    	return view('school.teacher.create',compact('activelink','activemenu'));
    }
}
