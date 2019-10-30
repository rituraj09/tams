<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    protected $fillable = array(
		'name', 'code', 'state', 'district', 'email', 
		'password' 

    );
	protected $table    	= 'schools';
    protected $guarded   	= ['_token'];
    public static $rules 	= [
        'name' => 'required|max:255',
        'code' => 'required|unique:schools',
        'state' => 'required',
        'district' => 'required',
        'email' => 'required|email|max:255|unique:schools',
        'password' => 'required|min:6|confirmed',
        'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
        'password_confirmation' => 'min:6'
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function employees()
    {
        return $this->hasMany('App\Models\School\Employee','school_id'); 
    } 
    public function attendance()
    {
        return $this->hasMany('App\Models\School\Attendance','school_id'); 
	} 
	 
}
