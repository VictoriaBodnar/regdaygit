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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

use App\Consumer;
use Illuminate\Http\Request;

  /**
   * Вывести панель с со списком потребителей
   */
  Route::get('/consumer_list', function () {

    $consumers = Consumer::orderBy('created_at', 'asc')->get();

    return view('consumers', [
      'consumers' => $consumers
    ]);
      //return view('consumers');
  });

  /**
   * Добавить нового потребителя
   */
  Route::post('/consumer_add', function (Request $request) {
    $validator = Validator::make($request->all(), [
    'kod_consumer' => 'required|max:255',  
    'name_consumer' => 'required|max:255',
  ]);

  if ($validator->fails()) {
    return redirect('/consumer_list')
      ->withInput()
      ->withErrors($validator);
  }

  $consumer = new Consumer;
  $consumer->kod_consumer = $request->kod_consumer;
  $consumer->name_consumer = $request->name_consumer;
  $consumer->save();

  return redirect('/consumer_list');
  });


  /**
   * Удалить потребителя
   */
  Route::delete('/consumer_del/{consumer}', function (Consumer $consumer) {
    //
  });
