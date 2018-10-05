<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Graf;
use Illuminate\Support\Facades\Auth;
//use Illuminate\Support\Facades\DB;
//use Illuminate\Support\Facades\Validator;
//use Illuminate\Support\Facades\Auth;
class FileController extends Controller 
{
    public function __construct()
  {
    $this->middleware('auth');

    //$this->middleware('log')->only('index');

    //$this->middleware('subscribed')->except('store');
  }
    public function importExportExcelORCSV(){
        //return view('file_import_export');
         return view('file_import_export', ['data' => [], 'message' => '']);
    }
     public function importFileIntoDB(Request $request){
        /*if($request->hasFile('sample_file_graf')){
             return "yes i have a file";
         }
         return "nofile";*/
         //return "it's importfileintoBD!!!";

        if($request->hasFile('file_for_upload')){
            $path = $request->file('file_for_upload')->getRealPath();
            //$data = \Excel::load($path,null,'UTF-8',false)->get();
          
                 /* $data= \Excel::load($path, function($import) {$import->get();}, 'UTF-8');//'ASCII' 'UTF-8'*/

                $data= \Excel::load($path, function($import) {
                    foreach ($import->get() as $client) {
                        //$data = $client->kod_consumer;
                        
                    }
                    //$data=$import->get();
                    //return $data;
                }, 'UTF-8')->get();//'ASCII' 'UTF-8'


            if($data->count()){
                
                $result_checking=$this->checkFile($data);
                //return $result_checking;
                if ($result_checking!="OK") { //return $result_checking;

                foreach ($data as $key => $value) {
                    $arr[] = ['kod_consumer' => $value->kod_consumer, 'date_zamer' => $value->date_zamer, 'type_zamer' => $value->type_zamer, 'a1' => $value->a1, 'a2' => $value->a2, 'a3' => $value->a3, 'a4' => $value->a4, 'a5' => $value->a5, 'a6' => $value->a6, 'a7' => $value->a7, 'a8' => $value->a8, 'a9' => $value->a9, 'a10' => $value->a10, 'a11' => $value->a11, 'a12' => $value->a12, 'a13' => $value->a13, 'a14' => $value->a14, 'a15' => $value->a15, 'a16' => $value->a16, 'a17' => $value->a17, 'a18' => $value->a18, 'a19' => $value->a19, 'a20' => $value->a20, 'a21' => $value->a21, 'a22' => $value->a22, 'a23' => $value->a23, 'a24' => $value->a24, 'a_cyt' => $value->a_cyt, 'user_id' => Auth::user()->id,'created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s") ];
                }

                if(!empty($arr)){
                    \DB::table('grafs')->insert($arr);
                    dd('Insert Record successfully.');
                }
            }else{
                return $result_checking;
            }
            }
            //return $arr[0]['kod_consumer']." ---  ".$arr[0]['type_zamer']."***";
        }
        dd('Request data does not have any files to import.');      
    }

    public function checkFile($data){
        $i=1;
        $checkSumFile = 0;

        //return view('file_import_export',['data' => $data]);
        foreach ($data as $key => $value) {
            
            $onlyKodConsumer[] = $value->kod_consumer;
            //check date_zamer and type_zamer only in the first row. We'll be using them for all rows
            if ($i==1){

                $paspsRow = \DB::table('pasps')->where('date_zamer', $value->date_zamer)->first();//'2003-12-17'
                if (!$paspsRow)  return view('file_import_export',['data' => $data, 'message' => 'Undefined date_zamer:  '.$value->date_zamer, 'errRow' => $value->kod_consumer]);

                $typesRow = \DB::table('types')->where('name_type', $value->type_zamer)->first();
                //return view('file_import_export',['data' => $data, 'message' => 'type_zamer:  '.$value->type_zamer, 'errRow' => $value->kod_consumer]);
                if (!$typesRow)  return view('file_import_export',['data' => $data, 'message' => 'Undefined type_zamer:  '.$value->type_zamer, 'errRow' => $value->kod_consumer]);
            }
            
            //check kod_consumer for each row of the uploading file. It must be in consumers table.
            $consumersRow = \DB::table('consumers')->where('kod_consumer', $value->kod_consumer)->first();//
            if (!$consumersRow) return view('file_import_export',['data' => $data, 'message' => 'Undefined kod_consumer:  '.$value->kod_consumer, 'errRow' => $value->kod_consumer]);


            //check if value of measure is NUMERIC and INTEGER 
            $listVal =array('a1','a2','a3','a4','a5','a6','a7','a8','a9','a10','a11','a12','a13','a14','a15','a16','a17','a18','a19','a20','a21','a22','a23','a24','a_cyt');
            $checkSumCyt = 0;
            foreach ($listVal as $k => $v) {
                $vv = $value->$v; 
                $pos = strpos($vv, ".");
                $num_r_for_message=$i+1;
                if (!$pos === false) {
                    //return "!!!!!!!!!!!!!!!!!Period found!!!!!!!!!!!!!!!!!!!!!!".$v."=".$vv." in row ".$num_r_for_message;
                    return view('file_import_export',['data' => $data, 'message' => '!!!!!!!!!!!!!!!!!Period found!!!!!!!!!!!!!!!!!!!!!!'.$v.'='.$vv.' in row '.$num_r_for_message, 'errRow' => $value->kod_consumer]);
                }
                if (!is_numeric($vv)) {
                    //return "!!!!!!!!!!!!НЕЧИСЛО!!!!!!!!!!!!!!!!!!!!!!!!!!!".$v."=".$vv." in row ".$num_r_for_message;
                    return view('file_import_export',['data' => $data, 'message' => '!!!!!!!!!!!!НЕЧИСЛО!!!!!!!!!!!!!!!!!!!!!!!!!!!'.$v.'='.$vv.' in row '.$num_r_for_message, 'errRow' => $value->kod_consumer]);
                }
                if ($v=='a_cyt'){
                    if ($checkSumCyt!=$vv) { return view('file_import_export',['data' => $data, 'message' => '!!!!!!!!!!!!НЕВІРНЕ ДОБОВЕ ЗНАЧЕННЯ!!!!!!!!!!!!!!!!!!!!!!!!!!!'.$vv.'----------------'.$checkSumCyt.' in row '.$num_r_for_message, 'errRow' => $value->kod_consumer]);} //return "!!!!!!!!!!!!НЕВІРНЕ ДОБОВЕ ЗНАЧЕННЯ!!!!!!!!!!!!!!!!!!!!!!!!!!!".$vv."----------------".$checkSumCyt." in row ".$num_r_for_message;}
                }else{
                    $checkSumCyt = $checkSumCyt+$vv;
                    
                   
                    //$checkSumFile=$checkSumFile+$checkSumCyt;
                }  

            }
            $checkSumFile+=$checkSumCyt; 
            //echo "checkSumCyt = ".$checkSumCyt."<br>";
                                     
        $i++;
        }
        //check uniqueness kod_consumer of the uploading file.
        if (count($onlyKodConsumer)!=count(array_unique($onlyKodConsumer))) {
            //return "kod_consumer is not unique in uploading file";
            return view('file_import_export',['data' => $data, 'message' => 'kod_consumer is not unique in an uploading file:  '.$value->kod_consumer, 'errRow' => $value->kod_consumer]);
        }
        //echo '<pre>',print_r($onlyKodConsumer,true),'</pre>';
        //echo '<pre>',$c1,'*************************',$c2,'</pre>';
        echo "checkSumFile = ".$checkSumFile."<br>";
        return "Uploading file is OK ";
    }    
    
   
    public function downloadExcelFile($type){
        $grafs = Graf::get()->toArray();
        return \Excel::create('graf_export', function($excel) use ($grafs) {
            $excel->sheet('graf', function($sheet) use ($grafs)
            {
                $sheet->fromArray($grafs);
            });
        })->download($type);
    }      
}
