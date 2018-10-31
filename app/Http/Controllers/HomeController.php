<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class HomeController extends Controller

{

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function ajaxRequest()
    {
        return view('ajaxRequest');
    }

    /**
    * Create a new controller instance.
    *
    * @return void
    */
    public function __construct()
    {
        $this->userobj = new User();
    }

     /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function ajaxRequestPost(Request $request)
    {
        $test = new User();
        // $result->your_column_1 = $request->your_value_1;
        // $result->your_column_2 = $request->your_value_2;
        $test->name=$request['name'];
        $test->password=$request['password'];
        $test->email=$request['email'];
        $test->save();
        return response()->json(['success'=>'Got Simple Ajax Request.']);
    }

     /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function myHome()

    {
        return view('myHome');
    }

    /**
     * Show the my users page.
     *
     * @return \Illuminate\Http\Response
     */

    public function myUsers()

    {
        return view('myUsers');
    }

}