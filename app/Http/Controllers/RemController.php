<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rem;
use Illuminate\Support\Facades\Validator;

class RemController extends Controller
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
        $rems = Rem::orderBy('created_at', 'asc')->get();

        return view('rems', [
          'rems' => $rems
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
            
            'kod_rem' => 'required|max:5',  
            'name_rem' => 'required|max:255',
            'kod_seti' => 'required|numeric'
           );
            $validator = Validator::make($request->all(), $rules);
           

            if ($validator->fails()) {
              return redirect('/rems')
                ->withInput()
                ->withErrors($validator);
            }

            $rem = new Rem;
            $rem->kod_rem = $request->kod_rem;
            $rem->name_rem = $request->name_rem;
            $rem->kod_seti = $request->kod_seti;
            $rem->save();
            
    
            //return redirect('/rems_list')->with('success', 'Company added.');
            return redirect('/rems')->with('alert', 'Додано!');;
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //public function destroy($id) // this was set by default
    public function destroy(Rem $rem)
    {
        //Alert::warning('Are you sure?', 'message')->persistent('Close');

        $rem->delete();
        return redirect('/rems')->with('alert', 'Вилучено!');
        //return ('<p>sdfsdfdfdsfsdf</p>');
    }
}
