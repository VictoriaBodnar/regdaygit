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
        return view('file_import_export');
    }
    public function checkFile($data){
        $i=1;
        foreach ($data as $key => $value) {

            
            //we check date_zamer and type_zamer only in the first row. We'll be using them for all rows
            if ($i==1){

                $paspsRow = \DB::table('pasps')->where('date_zamer', $value->date_zamer)->first();//'2003-12-17'
                if (!$paspsRow) return "Undefined date_zamer:  ".$value->date_zamer;//"undefined date_zamer"

                $typesRow = \DB::table('types')->where('name_type', $value->type_zamer)->first();
                if (!$typesRow) return "Undefined type_zamer:  ".$value->type_zamer;
            }
            
            //check kod_consumer for each row of the uploading file. It must be in consumers table.
            $consumersRow = \DB::table('consumers')->where('kod_consumer', $value->kod_consumer)->first();//
            if (!$consumersRow) return "Undefined kod_consumer:  ".$value->kod_consumer;
            
            $a2 = $value->a2;    
            $pos = strpos($a2, ".");
            if (!$pos === false) {
                return "!!!!!!!!!!!!!!!!!Period found!!!!!!!!!!!!!!!!!!!!!!".$a2." in row ".$i;
            }
            if (!is_numeric($a2)) {
                return "!!!!!!!!!!!!НЕЧИСЛО!!!!!!!!!!!!!!!!!!!!!!!!!!!".$a2." in row ".$i;
            }
              
               
            return $value->a1."__*". $value->a2."*__". $value->a3."__".$value->a4."__".$value->a5."__".$value->a6."__".$value->a7."__"; 
            


            //var_dump($user->name);
            //\DB::table('pasps')->select();
             
        $i++;
        }
        return "Uploading file is OK";
    }    
    
    public function importFileIntoDB(Request $request){
        /*if($request->hasFile('sample_file_graf')){
             return "yes i have a file";
         }
         return "nofile";*/
         //return "it's importfileintoBD!!!";

        if($request->hasFile('file_for_upload')){
            $path = $request->file('file_for_upload')->getRealPath();
            $data = \Excel::load($path)->get();
            if($data->count()){
                
                $result_checking=$this->checkFile($data);
                return $result_checking;
                if ($result_checking!="OK") return $result_checking;

                foreach ($data as $key => $value) {
                    $arr[] = ['kod_consumer' => $value->kod_consumer, 'date_zamer' => $value->date_zamer, 'type_zamer' => $value->type_zamer, 'a1' => $value->a1, 'a2' => $value->a2, 'a3' => $value->a3, 'a4' => $value->a4, 'a5' => $value->a5, 'a6' => $value->a6, 'a7' => $value->a7, 'a8' => $value->a8, 'a9' => $value->a9, 'a10' => $value->a10, 'a11' => $value->a11, 'a12' => $value->a12, 'a13' => $value->a13, 'a14' => $value->a14, 'a15' => $value->a15, 'a16' => $value->a16, 'a17' => $value->a17, 'a18' => $value->a18, 'a19' => $value->a19, 'a20' => $value->a20, 'a21' => $value->a21, 'a22' => $value->a22, 'a23' => $value->a23, 'a24' => $value->a24, 'a_cyt' => $value->a_cyt, 'user_id' => Auth::user()->id,'created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s") ];
                }

                if(!empty($arr)){
                    \DB::table('grafs')->insert($arr);
                    dd('Insert Record successfully.');
                }
            }
            //return $arr[0]['kod_consumer']." ---  ".$arr[0]['type_zamer']."***";
        }
        dd('Request data does not have any files to import.');      
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
