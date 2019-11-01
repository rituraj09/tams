<?php

namespace App\Models\School;

use Illuminate\Database\Eloquent\Model;

class AttendanceEmployee extends Model
{
    protected $table    = 'attendance_employees';
    public $primaryKey  = 'id'; 
    public $timestamps = false;
    protected $fillable 	= array('attendance_id','unique_id','shift_start','shift_end','in_time','out_time','attendance_type','remarks');   
    
    public function attendance()
    {
        return $this->belongsTo('App\Models\Admin\Attendance','attendance_id'); 
    }  
    public function emp()
    {
        return $this->belongsTo('App\Models\School\Employee','unique_id'); 
    } 
    public function attendancetype()
    {
        return $this->belongsTo('App\Models\Admin\AttendanceType','attendance_type'); 
    }  
}
