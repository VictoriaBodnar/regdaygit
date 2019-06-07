<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pasp;
//use App\Graf;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class PaspController extends Controller
{
     /**
   * Only authorized user can act this methods
   *
   * @return void
   */
  public function __construct()
  {
    $this->middleware('auth');

    //$this->middleware('log')->only('index');

    //$this->middleware('subscribed')->except('store');
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$pasps = Pasp::orderBy('date_zamer', 'desc')->get();
         $pasps = Pasp::all()->orderBy('created_at', 'desc');

        return view('pasps', [
          'pasps' => $pasps
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = array(
            
            'date_zamer' => 'required|date' 
            
           );
            $validator = Validator::make($request->all(), $rules);
           

            if ($validator->fails()) {
              return redirect('/pasps')
                ->withInput()
                ->withErrors($validator);
            }

            $pasp = new Pasp;
            $pasp->date_zamer = $request->date_zamer;
            $pasp->user_id = Auth::user()->id;
            $pasp->save();
            
      
               
            return redirect('/pasps')->with('alert', 'Додано!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
          
       $pasp = Pasp::find($id);
       //need to check if there are related rows in graf's table
       $graf = DB::table('grafs')->where('date_zamer', $pasp->date_zamer)->first();  
       if ($graf === null){
            return view('editPasps',compact('pasp','id'));
           
        }else{
            return redirect('/pasps')->with('error', 'Неможливо змінити  '.$pasp->date_zamer.', існують дані!');

        }
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
        
        $rules = array(            
            'date_zamer' => 'bail|required|date'             
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
               return redirect('/pasps/'.$id.'/edit')
                    ->withInput()
                    ->withErrors($validator);
        }
         $pasp = Pasp::find($id); //Retrieve a model by its primary key...
         $pasp->date_zamer = $request->get('date_zamer');
         $pasp->user_id = Auth::user()->id;
         $pasp->save();
         return redirect('/pasps')->with('alert', 'Запис збережено!');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pasp $pasp)
    {
        
        // need to check if there are related rows in graf's table. Because creating foreign key in migation is failed.
        $graf = DB::table('grafs')->where('date_zamer', $pasp->date_zamer)->first();
        //$graf = Graf::where('date_zamer', $pasp->date_zamer);
        if ($graf === null){
            $pasp->delete();
            return redirect('/pasps')->with('alert', 'Вилучено!');
        }else{
            //$grafqq=$graf;
            //return $grafqq;
            return redirect('/pasps')->with('error', 'Неможливо вилучити  '.$pasp->date_zamer.', існують дані!');
        }  
              
    }
}
