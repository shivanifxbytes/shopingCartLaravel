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
        return view('myHome');
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

    /**
     * @DateOfCreation         22 March 2018
     * @ShortDescription       Distroy the session and Make the Auth Logout
     * @return                 Response
     */
    public function getLogout()
    {
        Auth::logout();
        Session::flush();
        return redirect('/');
    }
}