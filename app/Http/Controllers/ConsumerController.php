<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Consumer;
use App\Rem;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;


class ConsumerController extends Controller
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


   public function show()
  {
    //$consumers = Consumer::orderBy('created_at', 'asc')->get();
    //$users = DB::table('users')->get();
    $users = DB::table('users')->get();
   
    $rems = DB::table('rems')->get();
    $otrs = DB::table('otrs')->get();   

    //$otrs = DB::select("SELECT * FROM otrs");

    $consumers = DB::select("SELECT c.id id, c.kod_consumer, c.name_consumer, c.kod_grp, c.kod_seti, c.rem_id, c.otr_id, c.user_id, c.created_at,  c.updated_at,
                             u.name u_name, u.email u_email, r.kod_rem r_kod_rem, r.name_rem r_name_rem, concat(r.kod_rem,'   ',r.name_rem) kod_rem_name_rem,
                             o.kod_otr,o.kod_podotr, o.name_otr
                             FROM consumers c
                             LEFT JOIN  users u on c.user_id = u.id
                             LEFT JOIN  rems r on c.rem_id = r.id
                             LEFT JOIN  otrs o on c.otr_id = o.id
                             Order by c.created_at desc");

    return view('consumers', [
      'consumers' => $consumers,      
      'rems' => $rems,
      'otrs' => $otrs
    ]);

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
