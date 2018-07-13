<?php

use Illuminate\Database\Seeder;


class RemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	

           $RasArr = array (array(733,  7,	'СО "Хмільницькі ЕМ"'),
							array(732,  7,	'СО "Шаргородські ЕМ"'),
							array(734,  7,	'СО "Замостянські ЕМ"'),
							array(735,  7,	'СО "Чернівецькі ЕМ"'),
							array(723,  7,	'СО "Барські ЕМ"'),
							array(731,  7,	'СО "Тиврівські ЕМ"'),
							array(722,  7,	'СО "Могилів-Подільські ЕМ"'),
							array(725,  7,	'СО "Калинівські  ЕМ"'),
							array(724,  7,	'СО "Жмеринські ЕМ"'),
							array(726,  7,	'СО "Казатинські ЕМ"'),
							array(727,  7,	'СО "Літинські ЕМ"'),
							array(728,  7,	'СО "Мурованокуриловецькі ЕМ'),
							array(721,  7,	'СО "Вінницькі МЕМ"'),
							array(1521,	15,	'СО "Бершадські  ЕМ"'),
							array(1522,	15,	'СО Гайсинські ЕМ"'),
							array(1523,	15,	'СО "Іллінецькі ЕМ"'),
							array(1524,	15,	'СО "Крижопільські ЕМ"'),
							array(1525,	15,	'СО "Липовецькі ЕМ"'),
							array(1526,	15,	'СО "Немирівські ЕМ"'),
							array(1527,	15,	'СО "Піщанські ЕМ"'),
							array(1528,	15,	'СО "Погребищенські ЕМ"'),
							array(1529,	15,	'СО "Теплицькі ЕМ"'),
							array(1531,	15,	'СО "Тульчинські ЕМ"'),
							array(1532,	15,	'СО "Томашпільські ЕМ"'),
							array(1533,	15,	'СО "Тростянецькі ЕМ"'),
							array(1534,	15,	'СО "Чечельницькі ЕМ"'),
							array(1537,	15,	'СО "Оратівські ЕМ"'),
							array(1535,	15,	'СО "Ямпільські ЕМ"'));


    	foreach($RasArr as $key => $v) {
			        
			        DB::table('rems')->insert([
			            'kod_rem' => $v[0],
			            'kod_seti' => $v[1],
			            'name_rem' => $v[2],
			            'user_id' => 1,
			            'created_at' => date("Y-m-d H:i:s"),
			            'updated_at' => date("Y-m-d H:i:s")
			            
			        ]);
       	}	
    }
}
