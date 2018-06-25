<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Graf;
use Illuminate\Support\Facades\Auth;
//use Illuminate\Support\Facades\Validator;
//use Illuminate\Support\Facades\Auth;
class FileController extends Controller 
{
    public function importExportExcelORCSV(){
        return view('file_import_export');
    }
    public function importFileIntoDB(Request $request){
        /*if($request->hasFile('sample_file_graf')){
             return "yes i have a file";
         }
         return "nofile";*/

        if($request->hasFile('file_for_upload')){
            $path = $request->file('file_for_upload')->getRealPath();
            $data = \Excel::load($path)->get();
            if($data->count()){
                foreach ($data as $key => $value) {
                    $arr[] = ['kod_consumer' => $value->kod_consumer, 'date_zamer' => $value->date_zamer, 'type_zamer' => $value->type_zamer, 'a1' => $value->a1, 'a1' => $value->a1, 'a1' => $value->a1, 'a1' => $value->a1, 'a1' => $value->a1, 'a1' => $value->a1, 'a1' => $value->a1, 'a1' => $value->a1, 'a1' => $value->a1, 'a1' => $value->a1, 'a1' => $value->a1, 'a1' => $value->a1, 'a1' => $value->a1, 'a1' => $value->a1, 'a1' => $value->a1, 'a1' => $value->a1, 'a1' => $value->a1, 'a1' => $value->a1, 'a1' => $value->a1, 'a1' => $value->a1, 'a1' => $value->a1, 'a1' => $value->a1, 'a1' => $value->a1, 'a1' => $value->a1, 'a_cyt' => $value->a_cyt, 'user_id' => Auth::user()->id,'created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s") ];
                }

                if(!empty($arr)){
                    \DB::table('grafs')->insert($arr);
                    dd('Insert Record successfully.');
                }
            }
            //return $arr[0]['kod_consumer']."   ".$arr[0]['date_zamer'];
        }
        dd('Request data does not have any files to import.');      
    } 
    public function downloadExcelFile($type){
        $products = Product::get()->toArray();
        return \Excel::create('expertphp_demo', function($excel) use ($products) {
            $excel->sheet('sheet name', function($sheet) use ($products)
            {
                $sheet->fromArray($products);
            });
        })->download($type);
    }      
}
