<?php

namespace App\Models\School;

use Illuminate\Database\Eloquent\Model;

class AttendanceType extends Model
{
    protected $table        = 'attendance_types';
    public $primaryKey      = 'id';
    public $timestamps      = true;
    protected $fillable 	= array('name');  
    public static $rules 	= [
        'name' 				=> 'required|max:227',   
    ]; 
    public function attendance()
    {
        return $this->hasMany('App\Models\School\AttendanceEmployee','attendance_type'); 
	} 
}
