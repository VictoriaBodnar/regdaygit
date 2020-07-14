<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    //return view('oldwelcome');
    return view('welcome');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

use App\Consumer;
use Illuminate\Http\Request;
use App\Http\Requests;

  /**
   * Вывести панель с со списком потребителей
   */
  /*Route::get('/consumer_list', function () {

    $consumers = Consumer::orderBy('created_at', 'asc')->get();

    return view('consumers', [
      'consumers' => $consumers
    ]);
      //return view('consumers');
  });*/
  //Route::get('/consumer_list', 'ConsumerController@show')->middleware('auth');
  Route::get('/consumer_list', 'ConsumerController@show');


  /**
   * Добавить нового потребителя
   */
  Route::post('/consumer_add', 'ConsumerController@store');
  
  /*Route::post('/consumer_add', function (Request $request) {
    $validator = Validator::make($request->all(), [
    'kod_consumer' => 'required|max:5',  
    'name_consumer' => 'required|max:255',
    'kod_rem' => 'required|max:3',
    'kod_otr' => 'required|max:3',
    'kod_podotr' => 'required|max:3',
    ]);

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

    return redirect('/consumer_list');
  });*/


  /**
   * Удалить потребителя
   */
  /*Route::delete('/consumer_del/{consumer}', function (Consumer $consumer) {
    $consumer->delete();

    return redirect('/consumer_list');
  });*/

  Route::delete('/consumer_del/{consumer}','ConsumerController@delete');
  //Route::get('/consumer_del/{consumer}','ConsumerController@delete');
  Route::get('/consumer_edit/{consumer}', 'ConsumerController@edit');
  Route::put('/consumer_edit/{consumer}','ConsumerController@update');
  //Route::put('/PATCH/consumer_edit/{consumer}','ConsumerController@update');
  

 
  

  /***  rems  **************************************************************************************************/

  Route::resource('rems', 'RemController');
  /*Один этот вызов создаёт множество маршрутов для обработки различных действий для ресурса. 
 
/*Тип     URI                     Действие  Имя маршрута
  GET     /rems                   index     rems.index
  GET     /rems/create            create    rems.create
  POST    /rems                   store     rems.store
  GET     /rems/{rem}             show      rems.show
  GET     /rems/{rem}/edit        edit      rems.edit
  PUT     /PATCH /rems/{rem}      update    rems.update
  DELETE  /rems/{rem}             destroy   rems.destroy*/

  Route::resource('otrs', 'OtrController');
  Route::resource('pasps', 'PaspController');
  Route::resource('types', 'TypeController');
  

  /*Route::get('/editPasps', function () {
    return view('editPasps');
});*/

Route::get('import-export-csv-excel',array('as'=>'excel.import','uses'=>'FileController@importExportExcelORCSV'));
Route::post('import-csv-excel',array('as'=>'import-csv-excel','uses'=>'FileController@importFileIntoDB'));
Route::get('download-excel-file/{type}', array('as'=>'excel-file','uses'=>'FileController@downloadExcelFile'));
//Route::get('/graf/{graf?}/{id?}', 'GrafController@show');
//Route::post('/graf/{graf?}/{id?}','GrafController@show');
Route::match(['get', 'post'], '/graf/{graf?}/{id?}', 'GrafController@show');
Route::delete('/graf_del/{graf}','GrafController@delete');
Route::get('/graf_edit/{graf}', 'GrafController@edit'); 
Route::put('/graf_edit/{graf}','GrafController@update');
Route::get('/graf_add', 'GrafController@add');
Route::post('/graf_add', 'GrafController@store');




