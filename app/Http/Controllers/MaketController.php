<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Graf;
use App\Rem;
use App\Pasp;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ValidSaveGraf;



class MaketController extends Controller
{
	 /**
   * Создание нового экземпляра контроллера.
   *
   * @return void
   */
  public function __construct()
  {
    $this->middleware('auth');

    //$this->middleware('log')->only('index');

    //$this->middleware('subscribed')->except('store');
  }


   public function maketMaker(Request $request, $date_zamer = null, $id = null, $type_zamer = null)
  {
    $txtmaket=''; 
    $tarr=array();
    //return  $type_zamer; 
    $users = DB::table('users')->get();
    $rems = DB::table('rems')->get();
    $otrs = DB::table('otrs')->get();
    $types = DB::table('types')->get();
    //$pasps = DB::table('pasps')->orderBy('id','DESC')->get();   
    $pasps = Pasp::all();
    if ($request->isMethod('post')) { 
      $date_zamer = $request->date_zamer; 
      $type_zamer = $request->type_zamer; 
    }
    
    if (empty($date_zamer)) {
        //$date_zamer = DB::table('pasps')->max('date_zamer');
        $date_zamer = Pasp::all()->max('date_zamer');
    }
    if (empty($type_zamer)) {
        $type_zamer = 'акт'; 
    }
    //////////////////////////////////////////////////////////////////////////////////////////////
    //17 и 52 отрасль по разному считаются для активной и для реактивной
    //для активной 17=10-11-15-16; 52=10-11-15-16-18-44-45-49-50
    //для реактивной 17=17+18+19+24+25+26+29+35+36+38+39+41+43+44+45+49+50+52; 52=52

    //$zamDate = '2020-06-17';//21.06.2017';//'15.06.2016 00:0';//'21.12.2016';
    //$zamType = 'акт';//акт';//'р-1' р-3 р-2

    if($type_zamer =='акт'){
      $valueotr17 = "and o.kod_otr=10";//активна
      $valueotr52 = "and o.kod_otr=10";//активна
    }else{
      $valueotr17 = "and o.kod_otr in (17,18,19,24,25,26,29,35,36,38,39,41,43,44,45,49,50,52)";//реактивна
      $valueotr52 = "and o.kod_otr=52";//реактивна
    } 

    $ValueArr = array(   10 => "and o.kod_otr=10", 
               11 => "and o.kod_otr=11",      
                       12 => "and o.kod_podotr=12",  
                       13 => "and o.kod_podotr=13",
                       14 => "and o.kod_podotr=14",
                       15 => "and o.kod_otr=15",
                       16 => "and o.kod_otr=16",
                       17 => $valueotr17,
                       18 => "and o.kod_otr in (18,19,24,25,26,29,35,36,38,39,41,43)",
                       19 => "and o.kod_otr=19",
                       20 => "and o.kod_podotr=20",
                       21 => "and o.kod_podotr=21",
                       22 => "and o.kod_podotr=22",
                       23 => "and o.kod_podotr=23",
                       60 => "and o.kod_podotr=60",
                       24 => "and o.kod_otr=24",
                       25 => "and o.kod_otr=25",
                       26 => "and o.kod_otr=26",
                       27 => "and o.kod_podotr=27",
                       28 => "and o.kod_podotr=28",
                       61 => "and o.kod_podotr=61",
                       29 => "and o.kod_otr=29",
                       30 => "and o.kod_podotr=30",
                       31 => "and o.kod_podotr=31",
                       32 => "and o.kod_podotr=32",
                       33 => "and o.kod_podotr=33",
                       34 => "and o.kod_podotr=34",
                       62 => "and o.kod_podotr=62",
                       35 => "and o.kod_otr=35",
                       36 => "and o.kod_otr=36",
                       37 => "and o.kod_podotr=37",
                       63 => "and o.kod_podotr=63",
                       38 => "and o.kod_otr=38",
                       39 => "and o.kod_otr=39",
                       40 => "and o.kod_podotr=40",
                       64 => "and o.kod_podotr=64",
                       41 => "and o.kod_otr=41",
                       42 => "and o.kod_podotr=42",
                       65 => "and o.kod_podotr=65",
                       43 => "and o.kod_otr=43",
                       44 => "and o.kod_otr=44",
                       45 => "and o.kod_otr=45",
                       47 => "and o.kod_podotr=47",
                       48 => "and o.kod_podotr=48",
                       66 => "and o.kod_podotr=66",
                       49 => "and o.kod_otr=49",
                       50 => "and o.kod_otr=50",
                       51 => "and o.kod_podotr=51",
                       67 => "and o.kod_podotr=67",
                       52 => $valueotr52
                      );  
     
    foreach($ValueArr as $codeKey => $filterWhere) { 
                   
                   $sqs = DB::select("SELECT '({$codeKey})' tr , sum(g.a1) a1, sum(g.a2) a2, sum(g.a3) a3, sum(g.a4) a4, sum(g.a5) a5, sum(g.a6) a6, sum(g.a7) a7, sum(g.a8) a8, sum(g.a9) a9, sum(g.a10) a10,
                          sum(g.a11) a11, sum(g.a12) a12, sum(g.a13) a13, sum(g.a14) a14, sum(g.a15) a15, sum(g.a16) a16, sum(g.a17) a17, sum(g.a18) a18, sum(g.a19) a19,
                          sum(g.a20) a20, sum(g.a21) a21, sum(g.a22) a22, sum(g.a23) a23, sum(g.a24) a24, sum(g.a_cyt) a_cyt,
                          (sum(g.a1)+sum(g.a2)+sum(g.a3)+sum(g.a4)+sum(g.a5)+sum(g.a6)+sum(g.a7)+sum(g.a8)+sum(g.a9)+sum(g.a10)+sum(g.a11)+sum(g.a12)+sum(g.a13)+sum(g.a14)+sum(g.a15)+
                          sum(g.a16)+sum(g.a17)+sum(g.a18)+sum(g.a19)+sum(g.a20)+sum(g.a21)+sum(g.a22)+sum(g.a23)+sum(g.a24)+sum(g.a_cyt)+{$codeKey}) kont    
                          FROM grafs  g
                          left join consumers c on g.kod_consumer = c.kod_consumer
                          left join otrs o on c.otr_id = o.id
                          where g.date_zamer = '{$date_zamer}' and g.type_zamer='{$type_zamer}' {$filterWhere}");

                    foreach ($sqs as $r){  
                                            
                        if(is_null($r->a_cyt)) {
                                    $r->a1=0; $r->a2=0; $r->a3=0; $r->a4=0; $r->a5=0; $r->a6=0; $r->a7=0; $r->a8=0; $r->a9=0; $r->a10=0; $r->a11=0;
                                    $r->a12=0; $r->a13=0; $r->a14=0; $r->a15=0; $r->a16=0; $r->a17=0; $r->a18=0; $r->a19=0; $r->a20=0; $r->a21=0; $r->a22=0;
                                    $r->a23=0; $r->a24=0; $r->a_cyt=0; $r->kont=$codeKey; 
                        }
                        if((($codeKey==17) or ($codeKey==52)) and ($type_zamer=='акт')) {
                            
                            if($codeKey==17) {$dopCODE="11,15,16";}                       
                            if($codeKey==52) {$dopCODE="11,15,16,18,19,24,25,26,29,35,36,38,39,41,43,44,45,49,50";}                       
                                    
                            $s_dop = DB::select( "SELECT sum(g.a1) a1, sum(g.a2) a2, sum(g.a3) a3, sum(g.a4) a4, sum(g.a5) a5, sum(g.a6)  a6, sum(g.a7) a7, sum(g.a8) a8, sum(g.a9) a9, 
                                     sum(g.a10) a10,sum(g.a11) a11, sum(g.a12) a12, sum(g.a13) a13, sum(g.a14) a14, sum(g.a15) a15, sum(g.a16) a16, sum(g.a17) a17,
                                     sum(g.a18) a18, sum(g.a19) a19,sum(g.a20) a20, sum(g.a21) a21, sum(g.a22) a22, sum(g.a23) a23, sum(g.a24) a24,sum(g.a_cyt) a_cyt,
                                     (sum(g.a1)+sum(g.a2)+sum(g.a3)+sum(g.a4)+sum(g.a5)+sum(g.a6)+sum(g.a7)+sum(g.a8)+sum(g.a9)+sum(g.a10)+sum(g.a11)+sum(g.a12)+sum(g.a13)+
                                     sum(g.a14)+sum(g.a15)+sum(g.a16)+sum(g.a17)+sum(g.a18)+sum(g.a19)+sum(g.a20)+sum(g.a21)+sum(g.a22)+sum(g.a23)+sum(g.a24)+sum(g.a_cyt)) kont
                                     FROM grafs g
                                     left join consumers c on g.kod_consumer = c.kod_consumer
                                     left join otrs o on c.otr_id = o.id
                                     where g.date_zamer = '{$date_zamer}' and g.type_zamer='{$type_zamer}' and o.kod_otr in ({$dopCODE})");

                            //return ($s_dop[0]->{'a1'});  
                            $r_dop = json_decode(json_encode($s_dop), true);
                            //return ($r_dop[0]['a1']);  
                      
                            $r->a1 = $r->a1-$r_dop[0]['a1']; $r->a2 = $r->a2-$r_dop[0]['a2']; $r->a3 = $r->a3-$r_dop[0]['a3']; $r->a4 = $r->a4-$r_dop[0]['a4']; 
                            $r->a5 = $r->a5-$r_dop[0]['a5']; $r->a6 = $r->a6-$r_dop[0]['a6']; $r->a7 = $r->a7-$r_dop[0]['a7']; $r->a8 = $r->a8-$r_dop[0]['a8'];
                            $r->a9= $r->a9-$r_dop[0]['a9']; $r->a10= $r->a10-$r_dop[0]['a10']; $r->a11= $r->a11-$r_dop[0]['a11']; $r->a12= $r->a12-$r_dop[0]['a12'];
                            $r->a13= $r->a13-$r_dop[0]['a13']; $r->a14= $r->a14-$r_dop[0]['a14']; $r->a15= $r->a15-$r_dop[0]['a15']; $r->a16= $r->a16-$r_dop[0]['a16'];
                            $r->a17= $r->a17-$r_dop[0]['a17']; $r->a18= $r->a18-$r_dop[0]['a18']; $r->a19= $r->a19-$r_dop[0]['a19']; $r->a20= $r->a20-$r_dop[0]['a20'];
                            $r->a21= $r->a21-$r_dop[0]['a21']; $r->a22= $r->a22-$r_dop[0]['a22']; $r->a23= $r->a23-$r_dop[0]['a23']; $r->a24= $r->a24-$r_dop[0]['a24'];
                            $r->a_cyt=$r->a_cyt-$r_dop[0]['a_cyt']; $r->kont= $r->kont-$r_dop[0]['kont'];
                            
                        }

                      $tarr[] = $r;
                    }
    }
            
            //return ('method runs!');
            //$tarr = json_decode(json_encode($tarr), true);
            //return ($tarr[1]->{"tr"});
    
    return view('maket', [
      'makets' => $tarr,
      'pasps' => $pasps,
      'types' => $types,
      'selected_date'=>$date_zamer,
      'selected_type'=>$type_zamer,
      'txtmaket'=>$txtmaket
    ]);
    
   } 
}
