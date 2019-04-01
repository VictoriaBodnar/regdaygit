<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Type;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
  {
    $this->middleware('auth');

    //$this->middleware('log')->only('index');

    //$this->middleware('subscribed')->except('store');
  }

    public function index()
    {
        $types = Type::orderBy('created_at', 'asc')->get();

        return view('types', [
          'types' => $types
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
            
            'name_type' => 'required|max:5',  
            'primitka' => 'required|max:255'
           );
           $validator = Validator::make($request->all(), $rules);
           

            if ($validator->fails()) {
              return redirect('/types')
                ->withInput()
                ->withErrors($validator);
            }

            $type = new Type;
            $type->name_type = $request->name_type;
            $type->primitka = $request->primitka;
            $type->user_id = Auth::user()->id;
            $type->save();
           
            return redirect('/types')->with('alert', 'Додано!');;
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
        
       $type = Type::find($id);
       //need to check if there are related rows in graf's table
       $graf = DB::table('grafs')->where('type_zamer', $type->name_type)->first(); 
       if ($graf === null){
            return view('editTypes',compact('type','id'));
       }else{
            return redirect('/types')->with('error', 'Неможливо редагувати тип:  '.$type->name_type.'. Існують дані!');  
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
            
            'name_type' => 'required|max:5',  
            'primitka' => 'required|max:255'
           );
           $validator = Validator::make($request->all(), $rules);
           

            if ($validator->fails()) {
              return redirect('/types/'.$id.'/edit')
                ->withInput()
                ->withErrors($validator);
            }
            $type = Type::find($id); // Retrieve a model by its primary key...
            $type->name_type = $request->get('name_type');
            $type->primitka = $request->get('primitka');
            $type->user_id = Auth::user()->id;
            $type->save();
            return redirect('/types')->with('alert', 'Запис збережено!');



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Type $type)
    {
        // need to check if there are related rows in graf's table. Because creating foreign key in migation is failed.
        $graf = DB::table('grafs')->where('type_zamer', $type->name_type)->first();
        if ($graf === null){
            $type->delete();
            return redirect('/types')->with('alert', 'Вилучено!');
        }else{
            return redirect('/types')->with('error', 'Неможливо вилучити тип:  '.$type->name_type.'. Існують дані!');   
        }
    }
}