<?php

use Illuminate\Database\Seeder;

class OtrsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

           $RasArr = array (array(10, 10, 'СОБСТВЕННОЕ ПОТРЕБЛЕНИЕ '),
							array(11, 11, 'СОБСТВЕННЫЕ НУЖДЫ       '),
							array(12, 11, 'тепловых электростанций '),
							array(13, 11, 'сетевых предприятий     '),
							array(14, 11, 'атомних электростанций  '),
							array(15, 15, 'Т Р Э                   '),
							array(16, 16, 'ПРОИЗВОДСТВЕННЫЕ НУЖДЫ  '),
							array(17, 17, 'ОТПУСК ПОТРЕБИТЕЛЯМ     '),
							array(18, 18, '1.ПРОМЫШЛЕННОСТЬ        '),
							array(19, 19, 'ТОПЛИВНАЯ               '),
							array(20, 19, 'нефтедобивающая         '),
							array(21, 19, 'нефтеперерабативающая   '),
							array(22, 19, 'газовая                 '),
							array(23, 19, 'угольная                '),
							array(60, 19, 'прочая промышленность   '),
							array(24, 24, 'ЧЕРНАЯ МЕТАЛЛУРГИЯ      '),
							array(25, 25, 'ЦВЕТНАЯ МЕТАЛЛУРГИЯ     '),
							array(26, 26, 'ХИМИЧЕСКАЯ И НЕФТЕХИМИЧЯ'),
							array(27, 26, 'азотная                 '),
							array(28, 26, 'промишл.химнитей и волок'),
							array(61, 26, 'прочая промышленность   '),
							array(29, 29, 'МАШИНОСТРОИТ.И МЕТАЛЛООР'),
							array(30, 29, 'тяжелого энергет.и транс'),
							array(31, 29, 'электротехническая      '),
							array(32, 29, 'станкостроит.и инструмен'),
							array(33, 29, 'автомобильная           '),
							array(34, 29, 'трактор.и сельск.хоз.маш'),
							array(62, 29, 'прочая промышленность   '),
							array(35, 35, 'ЛЕСН.ДЕРЕВООБР.ЦЕЛЮЛОЗН.'),
							array(36, 36, 'СТРОИТЕЛЬНЫХ МАТЕРИАЛ.  '),
							array(37, 36, 'цементная               '),
							array(63, 36, 'прочая промышленность   '),
							array(38, 38, 'СТЕКОЛЬНАЯ И ФАРФОРОФАЯН'),
							array(39, 39, 'ЛЕГКАЯ                  '),
							array(40, 39, 'текстильная             '),
							array(64, 39, 'прочая промышленность   '),
							array(41, 41, 'ПИЩЕВАЯ                 '),
							array(42, 41, 'сахарная                '),
							array(65, 41, 'прочая промышленность   '),
							array(43, 43, 'ДРУГИЕ ПРОМЫШЛ.ПРОИЗВОД.'),
							array(44, 44, '11.СЕЛЬХОЗПОТРЕБИТЕЛИ   '),
							array(45, 45, '111.ТРАНСПОРТ           '),
							array(46, 45, 'электротяга железн.тран.'),
							array(47, 45, 'городской эл.транспорт  '),
							array(48, 45, 'магистральный труб.транс'),
							array(66, 45, 'прочие потребители      '),
							array(49, 49, '1V.СТРОИТЕЛЬСТВО        '),
							array(50, 50, 'V.КОММУНАЛЬНОЕ ХОЗ-ВО   '),
							array(51, 50, 'коммунальное,быт.водосн.'),
							array(67, 50, 'прочие потребители      '),
							array(52, 52, 'V1.СВЕТ,БЫТ,МЕЛКОМ.ПОТР.'));
		  	

    	foreach($RasArr as $key => $v) {
			        
			        DB::table('otrs')->insert([
			            'kod_podotr' => $v[0],
			            'kod_otr' => $v[1],
			            'name_otr' => $v[2],
			            'user_id' => 1,
			            'created_at' => date("Y-m-d H:i:s"),
			            'updated_at' => date("Y-m-d H:i:s")
			            
			        ]);
       	}	
    }
}
