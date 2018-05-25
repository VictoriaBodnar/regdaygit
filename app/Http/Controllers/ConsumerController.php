<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Consumer;
use Illuminate\Support\Facades\Validator;


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
    $consumers = Consumer::orderBy('created_at', 'asc')->get();

    return view('consumers', [
      'consumers' => $consumers
    ]);
   } 

   public function store(Request $request)
  {
		   $rules = array(
            
            'kod_consumer' => 'required|max:5',  
		    'name_consumer' => 'required|max:255',
		    'kod_rem' => 'required|numeric',
		    'kod_otr' => 'required|numeric',
		    'kod_podotr' => 'required|numeric'
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
		    $consumer->kod_rem = $request->kod_rem;
		    $consumer->kod_otr = $request->kod_otr;
		    $consumer->kod_podotr = $request->kod_podotr;
		    $consumer->save();
		    
    
		    //return redirect('/consumer_list')->with('success', 'Company added.');
		    return redirect('/consumer_list')->with('alert', 'Додано!');
		  
  } 

  public function delete(Consumer $consumer)
  {

  	$consumer->delete();

    return redirect('/consumer_list')->with('alert', 'Вилучено!');

  }
}
