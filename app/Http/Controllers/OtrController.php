<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Otr;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class OtrController extends Controller
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
        $otrs = Otr::orderBy('created_at', 'asc')->get();

        return view('otrs', [
          'otrs' => $otrs
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
            
            'kod_podotr' => 'required|numeric',  
            'name_otr' => 'required|max:255',
            'kod_otr' => 'required|numeric'
           );
            $validator = Validator::make($request->all(), $rules);
           

            if ($validator->fails()) {
              return redirect('/otrs')
                ->withInput()
                ->withErrors($validator);
            }

            $otr = new Otr;
            $otr->kod_otr = $request->kod_otr;
            $otr->name_otr = $request->name_otr;
            $otr->kod_podotr = $request->kod_podotr;
            $otr->user_id = Auth::user()->id;
            $otr->save();
            
            
    
            //return redirect('/rems_list')->with('success', 'Company added.');
            return redirect('/otrs')->with('alert', 'Додано!');;
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
        
       $otr = Otr::find($id);
       return view('editOtrs',compact('otr','id'));
       //return ('edit method runs!');
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
         
        $otr = Otr::find($id); // Retrieve a model by its primary key...
        $otr->kod_otr = $request->get('kod_otr');
        $otr->name_otr = $request->get('name_otr');
        $otr->kod_podotr = $request->get('kod_podotr');
        $otr->user_id = Auth::user()->id;
        $otr->save();
        return redirect('/otrs')->with('alert', 'Запис збережено!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //public function destroy($id) // this was set by default
    public function destroy(Otr $otr)
    {
        $rem->delete();
        return redirect('/otrs')->with('alert', 'Вилучено!');
        //return ('<p>sdfsdfdfdsfsdf</p>');
    }
}
