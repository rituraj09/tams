<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id');
            $table->string('employee_code',30)->nullable()->unique();
            $table->integer('school_id', false, true); 
            $table->string('unique_id',30)->nullable();
            $table->string('first_name',50)->nullable();
            $table->string('middle_name',50)->nullable();
            $table->string('last_name',50)->nullable();
            $table->string('phone',16)->nullable(); 
            $table->string('email',56)->nullable()->unique();
            $table->string('address',630)->nullable();
            $table->string('pincode',6)->nullable();
            $table->date('dob')->nullable();  
            $table->date('doj')->nullable();  
            $table->date('dor')->nullable();   
            $table->integer('employee_type', false, true); 
            $table->boolean('status')->default(1); 
            $table->boolean('isactive')->default(1); 
            $table->string('photo',56)->nullable(); 
            $table->string('remarks',500)->nullable(); 
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->nullable(); 
            $table->integer('created_by')->nullable(); 
            $table->integer('updated_by')->nullable();
            $table->foreign('school_id')->references('id')->on('schools');
            $table->foreign('employee_type')->references('id')->on('employee_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
