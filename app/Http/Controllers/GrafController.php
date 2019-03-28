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



class GrafController extends Controller
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


   public function show(Request $request, $date_zamer = null, $id = null)
  {
        
    $users = DB::table('users')->get();
    $rems = DB::table('rems')->get();
    $otrs = DB::table('otrs')->get();
    //$pasps = DB::table('pasps')->orderBy('id','DESC')->get();   
    $pasps = Pasp::all();


    if ($request->isMethod('post')) { $date_zamer = $request->date_zamer; }
    
    if (empty($date_zamer)) {
        
        //$date_zamer = DB::table('pasps')->max('date_zamer');
        $date_zamer = Pasp::all()->max('date_zamer');
       
    }
    if (empty($id)) {
        $getOneId="";
    }else{
        $getOneId=" and g.id=".$id;
    }

    $grafs = DB::select("SELECT g.id, g.kod_consumer, c.name_consumer, g.date_zamer, g.type_zamer, g.a1, g.a2, g.a3, g.a4, g.a5, g.a6, g.a7, g.a8, g.a9, g.a10, g.a11, g.a12, g.a13, g.a14, g.a15, g.a16, g.a17, g.a18, g.a19, g.a20, g.a21, g.a22, g.a23, g.a24, g.a_cyt, g.user_id, g.created_at, g.updated_at,  t.name_type, u.name u_name
      FROM grafs g
      left join consumers c on g.kod_consumer=c.kod_consumer
      left join types t on g.type_zamer=t.id
      LEFT JOIN  users u on g.user_id = u.id
      WHERE g.date_zamer='{$date_zamer}' {$getOneId}
      order by g.date_zamer, g.kod_consumer asc");//'2017-12-20'
    

    return view('grafs', [
      'grafs' => $grafs,
      'pasps' => $pasps,
      'selected_date'=>$date_zamer
    ]);
    /*if (empty($grafs)) {
      $grafs->kod_consumer = "Немає даних";
      return $grafs->kod_consumer;
    }else{
      return $grafs;
    }*/

   
   } 

   public function store(ValidSaveGraf $request)
  {
       //Validation in this class ValidSaveGraf.php 
		   
		    $graf = new Graf;
		   	$graf->kod_consumer = $request->kod_consumer;
        $graf->date_zamer = $request->date_zamer;
        $graf->type_zamer = $request->type_zamer;
        for($i=1; $i<25; $i++){
          $a_number = 'a'.$i;
          $graf->$a_number = $request->$a_number;
        }
        /*$graf->a1 = $request->a1;
        $graf->a2 = $request->a2;
        $graf->a3 = $request->a3;
        $graf->a4 = $request->a4;
        $graf->a5 = $request->a5;
        $graf->a6 = $request->a6;
        $graf->a7 = $request->a7;
        $graf->a8 = $request->a8;
        $graf->a9 = $request->a9;
        $graf->a10 = $request->a10;
        $graf->a11 = $request->a11;
        $graf->a12 = $request->a12;
        $graf->a13 = $request->a13;
        $graf->a14 = $request->a14;
        $graf->a15 = $request->a15;
        $graf->a16 = $request->a16;
        $graf->a17 = $request->a17;
        $graf->a18 = $request->a18;
        $graf->a19 = $request->a19;
        $graf->a20 = $request->a20;
        $graf->a21 = $request->a21;
        $graf->a22 = $request->a22;
        $graf->a23 = $request->a23;
        $graf->a24 = $request->a24;*/
        $graf->a_cyt = $this->a_cyt($graf);
        $graf->user_id = Auth::user()->id;
        $graf->save();
        $lastInsertedId = $graf->id;
        
        return redirect('/graf/'.$graf->date_zamer.'/'.$lastInsertedId)->with('alert', 'Додано!');
  } 
  
  public function edit($id)
    {

       $grafCur = Graf::find($id);
       $consumers = DB::table('consumers')->get();//код споживача
       $pasps = Pasp::all();
       //$pasps = DB::table('pasps')->get();//дата виміру
       $types = DB::table('types')->get();//тип виміру
       return view('editGrafs',compact('grafCur','id','consumers', 'pasps', 'types'));
       //return 'editGrafs';
    }
  

  public function add()
    {
       $consumers = DB::table('consumers')->get();//код споживача
       $pasps = Pasp::all();//дата виміру
       $types = DB::table('types')->get();//тип виміру
       return view('addGrafs', compact('consumers', 'pasps', 'types'));
    }
    /**
     * Update the specified resource in storage. 
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
  
  public function update(ValidSaveGraf $request, $id)
    {
        //return ('update method runs!'.$id);
      //------------------------------------------------------------
       //Validation in this class ValidSaveGraf.php
       /* $rules = array(
        'kod_consumer' => 'required|numeric',  
        'date_zamer' => 'required|date',
        'type_zamer' => 'required',
        'a1' => 'required|int'
         );
        $validator = Validator::make($request->all(), $rules);
       

        if ($validator->fails()) {
          return redirect('/graf_edit/'.$id)
            ->withInput()
            ->withErrors($validator);
        }*/
        //------------------------------------------------------------

        $graf = Graf::find($id); // Retrieve a model by its primary key...
        $graf->kod_consumer = $request->get('kod_consumer');
        $graf->date_zamer = $request->get('date_zamer');
        $graf->type_zamer = $request->get('type_zamer');
        /*for($i=1; $i<25; $i++){
          $graf->a.$i = $request->get('a'.$i);
          return $graf->a.$i;
        }*/
        $graf->a1 = $request->get('a1');
        $graf->a2 = $request->get('a2');
        $graf->a3 = $request->get('a3');
        $graf->a4 = $request->get('a4');
        $graf->a5 = $request->get('a5');
        $graf->a6 = $request->get('a6');
        $graf->a7 = $request->get('a7');
        $graf->a8 = $request->get('a8');
        $graf->a9 = $request->get('a9');
        $graf->a10 = $request->get('a10');
        $graf->a11 = $request->get('a11');
        $graf->a12 = $request->get('a12');
        $graf->a13 = $request->get('a13');
        $graf->a14 = $request->get('a14');
        $graf->a15 = $request->get('a15');
        $graf->a16 = $request->get('a16');
        $graf->a17 = $request->get('a17');
        $graf->a18 = $request->get('a18');
        $graf->a19 = $request->get('a19');
        $graf->a20 = $request->get('a20');
        $graf->a21 = $request->get('a21');
        $graf->a22 = $request->get('a22');
        $graf->a23 = $request->get('a23');
        $graf->a24 = $request->get('a24');
        $graf->a_cyt = $this->a_cyt($graf);
        $graf->user_id = Auth::user()->id;
        $graf->save();
        
        return redirect('/graf/'.$graf->date_zamer)->with('alert', 'Запис збережено!');
    }
  public function a_cyt(Graf $graf)
    {
      $a_cyt=0;
      for($i=1; $i<25; $i++){

          $aa='a'.$i;
          $a_cyt=$a_cyt+$graf->$aa;
      }
      return $a_cyt;
    }  

  public function delete(Graf $graf)
    {

      $graf->delete();

      return redirect('/graf')->with('alert', 'Вилучено!');
      
    }

}
