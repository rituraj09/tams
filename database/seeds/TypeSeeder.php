<?php

use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('employee_types')->insert(array(
            array('name'=>'Head Master'   ),
            array('name'=>'Teacher'   ),
            array('name'=>'Jr. Assistant')
          )); 

          DB::table('attendance_types')->insert(array(
            array( 'name' => 'Present'),
            array( 'name' => 'Absent'),
            array( 'name' => 'Leave'),
            array( 'name' => 'MIS')
          )); 
    }
}
