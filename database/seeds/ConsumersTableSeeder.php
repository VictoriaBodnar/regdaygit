<?php

use Illuminate\Database\Seeder;


class ConsumersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	

           $RasArr = array (array(111,  'Dream on'),
							array(222,  'Holiday'),
							array(333,  'Love exists'),
							array(444,  'My dark disquiet'),
							array(999,  'Greatest'),
							array(888,  'Way down we go'),
							array(777,  'Thunder clouds'));


    	foreach($RasArr as $key => $v) {
			        
			        DB::table('consumers')->insert([
			            'kod_consumer' => $v[0],
			            'name_consumer' => $v[1],
			            'rem_id' => 3,
			            'otr_id' => 7,
			            'user_id' => 1,
			            'created_at' => date("Y-m-d H:i:s"),
			            'updated_at' => date("Y-m-d H:i:s")
			            
			        ]);
       	}	
    }
}
