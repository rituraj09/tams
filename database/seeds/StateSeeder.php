<?php

use Illuminate\Database\Seeder;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('states')->insert(array(
            array('name'=>'Assam'   )
          )); 

          DB::table('districts')->insert(array(
            array('state_id'=>'1',  'name' => 'Golaghat')
          ));  
    }
}
