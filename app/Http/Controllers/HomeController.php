<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Config;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('welcome');
    }
    public function catalog()
    {
        return view('catalog');
    }
    function changeTheme($color)
    {
        //return app('url')->asset($path.'/asset', $secure);
        config(['app.colortheme' => $color]);
        $ee = Config::get('app.colortheme');
         return view('welcome');
        //$ee = Config::get('app.name');
        //return app('url')->asset('/css/app1.css', $secure);
        //dd('/css/app1.css');
        //dd($ee);
    }
}
