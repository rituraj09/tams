<?php

namespace App\Models\School;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $table    = 'attendances';
    public $primaryKey  = 'id';
    public $timestamps  = true;
    protected $fillable 	= array('date','school_id','remarks');   
    public function school()
    {
        return $this->belongsTo('App\Models\Admin\School','school_id'); 
    }  
    public function attendanceEmp()
    {
        return $this->hasMany('App\Models\School\AttendanceEmployee','attendance_id'); 
	} 
}
