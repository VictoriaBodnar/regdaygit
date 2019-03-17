<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Graf;
use App\Rem;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;


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


   public function show(Request $request,$date_zamer)
  {
    return $request;
    //$consumers = Consumer::orderBy('created_at', 'asc')->get();
    //$users = DB::table('users')->get();
    $users = DB::table('users')->get();
   
    $rems = DB::table('rems')->get();
    $otrs = DB::table('otrs')->get();
    $pasps = DB::table('pasps')->get();   

    //$otrs = DB::select("SELECT * FROM otrs");

    $grafs = DB::select("SELECT g.id, g.kod_consumer, c.name_consumer, g.date_zamer, g.type_zamer, g.a1, g.a2, g.a3, g.a4, g.a5, g.a6, g.a7, g.a8, g.a9, g.a10, g.a11, g.a12, g.a13, g.a14, g.a15, g.a16, g.a17, g.a18, g.a19, g.a20, g.a21, g.a22, g.a23, g.a24, g.a_cyt, g.user_id, g.created_at, g.updated_at,  t.name_type, u.name u_name
      FROM grafs g
      left join consumers c on g.kod_consumer=c.kod_consumer
      left join types t on g.type_zamer=t.id
      LEFT JOIN  users u on g.user_id = u.id
      WHERE g.date_zamer='{$date_zamer}'
      order by g.date_zamer, g.kod_consumer asc");//'2017-12-20'
    


    return view('grafs', [
      'grafs' => $grafs,
      'pasps' => $pasps
    ]);
    

    //return "!!!!!!!!!!!!!!!!!GRAF SHOW!!!!!!!!!!!!!!!!!!!!!!";

   } 

   public function store(Request $request)
  {
		   $rules = array(
            
        'kod_consumer' => 'required|numeric',  
		    'name_consumer' => 'required|max:255',
		    'rem_id' => 'required|numeric',
		    'otr_id' => 'required|numeric'
		     );
		   	$validator = Validator::make($request->all(), $rules);
		   

		    if ($validator->fails()) {
		      return redirect('/consumer_list')
		        ->withInput()
		        ->withErrors($validator);
		    }

		    $consumer = new Consumer;
		   	$consumer->kod_consumer = $request->kod_consumer;
		    $consumer->name_consumer = $request->name_consumer;
		    $consumer->rem_id = $request->rem_id;
		    $consumer->otr_id = $request->otr_id;
		    $consumer->user_id = Auth::user()->id;
        $consumer->save();
		    
    
		    //return redirect('/consumer_list')->with('success', 'Company added.');
		    return redirect('/consumer_list')->with('alert', 'Додано!');
		  
  } 

  public function delete(Consumer $consumer)
  {

  	$consumer->delete();

    return redirect('/consumer_list')->with('alert', 'Вилучено!');

  }

  public function edit($id)
    {

       $consumerCur = Consumer::find($id);
       $rems = DB::table('rems')->get();
       $otrs = DB::table('otrs')->get();
       return view('editConsumers',compact('consumerCur','id','rems', 'otrs'));
    }

    /**
     * Update the specified resource in storage. 
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
  
  public function update(Request $request, $id)
    {
        //return ('update method runs!'.$id);
        $rules = array(
            
        'kod_consumer' => 'required|numeric',  
        'name_consumer' => 'required|max:255',
        'rem_id' => 'required|numeric',
        'otr_id' => 'required|numeric'
         );
        $validator = Validator::make($request->all(), $rules);
       

        if ($validator->fails()) {
          return redirect('/consumer_edit/'.$id)
            ->withInput()
            ->withErrors($validator);
        }

        $consumer = Consumer::find($id); // Retrieve a model by its primary key...
        $consumer->kod_consumer = $request->get('kod_consumer');
        $consumer->name_consumer = $request->get('name_consumer');
        $consumer->rem_id = $request->get('rem_id');
        $consumer->otr_id = $request->get('otr_id');
        $consumer->user_id = Auth::user()->id;
        $consumer->save();
        return redirect('/consumer_list')->with('alert', 'Запис збережено!');
    }

}
