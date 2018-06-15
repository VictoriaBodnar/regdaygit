<?php

use Illuminate\Database\Seeder;

class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $RasArr = array (array('акт', 'активна'),
						 array('р-1', 'реактивна споживання'),
						 array('р-2', 'реактивна БСК'),
						 array('р-3', 'реактивна генерація'),
						 array('р-4', 'реактивна'));


    	foreach($RasArr as $key => $v) {
			        
			        DB::table('types')->insert([
			            'name_type' => $v[0],
			            'primitka' => $v[1],
			            'user_id' => 1,
			            'created_at' => date("Y-m-d H:i:s"),
			            'updated_at' => date("Y-m-d H:i:s")
			        ]);
       	}	
    }
}
