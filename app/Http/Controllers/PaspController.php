<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pasp;
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
        $pasps = Pasp::orderBy('created_at', 'asc')->get();

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
        /*$rules = array(
            
            'date_zamer' => 'required|date????' 
            
           );
            $validator = Validator::make($request->all(), $rules);
           

            if ($validator->fails()) {
              return redirect('/pasps')
                ->withInput()
                ->withErrors($validator);
            }*/

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
       //return view('editPasps',compact('pasp','id'));
       return ('edit method runs!');
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
         $pasp = Pasp::find($id); // Retrieve a model by its primary key...
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
    public function destroy($id)
    {
        //
    }
}
