<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttendanceEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendance_employees', function (Blueprint $table)  {
            $table->increments('id'); 
            $table->integer('attendance_id', false, true);  
            $table->string('unique_id',50);  
            $table->timestamp('shift_start')->nullable(); 
            $table->timestamp('shift_end')->nullable();  
            $table->timestamp('in_time')->nullable(); 
            $table->timestamp('out_time')->nullable();   
            $table->integer('attendance_type', false, true)->default(1);          
            $table->string('remarks',500)->nullable(); 
            $table->foreign('attendance_id')->references('id')->on('attendances');
            $table->foreign('attendance_type')->references('id')->on('attendance_types');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attendance_employees');
    }
}
