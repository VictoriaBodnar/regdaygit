<?php

use Illuminate\Database\Seeder;

class PaspsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $RasArr = array ('17.12.2003',
						'16.06.2004',
						'18.06.2003',
						'15.12.2004',
						'21.12.2005',
						'15.06.2005',
						'21.06.2006',
						'20.12.2006',
						'20.06.2007',
						'19.12.2007',
						'18.06.2008',
						'17.12.2008',
						'17.06.2009',
						'16.12.2009',
						'16.06.2010',
						'15.12.2010',
						'15.06.2011',
						'21.12.2011',
						'20.06.2012',
						'19.12.2012',
						'19.06.2013',
						'18.12.2013',
						'18.06.2014',
						'17.12.2014',
						'17.06.2015',
						'16.12.2015',
						'15.06.2016');

 
    	foreach($RasArr as $key => $v) {
			        
			        //$date = date_create_from_format('Y-m-d', $v[0]);
    		$time = strtotime($v);
    		$newformat = date('Y-m-d',$time);

			        DB::table('pasps')->insert([
			            'date_zamer' => $newformat,
			            'user_id' => 1,
			            'created_at' => date("Y-m-d H:i:s"),
			            'updated_at' => date("Y-m-d H:i:s")
			        ]);
    	}
	}
}	
