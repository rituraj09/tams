<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttendanceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendances', function (Blueprint $table)  {
            $table->increments('id');
            $table->date('date');
            $table->integer('school_id', false, true);              
            $table->string('remarks',500)->nullable(); 
            $table->boolean('status')->default(1); 
            $table->boolean('isactive')->default(1); 
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->integer('created_by')->nullable(); 
            $table->timestamp('updated_at')->nullable(); 
            $table->integer('updated_by')->nullable();
            $table->foreign('school_id')->references('id')->on('schools');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attendances');
    }
}
