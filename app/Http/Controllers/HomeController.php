<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{

    function index()
    {
    	return view('home.index');
    }

    function goto(Request $request)
    {
      if($request->Signup)
      {
        return redirect()->route('signup.index');
      }
      if($request->Login)
      {
        return redirect()->route('login.index');
      }
    }
}
