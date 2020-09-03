<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SignupController extends Controller
{

    function index()
    {
    	return view('signup.index');
    }

    function verify(Request $request)
    {
      
    }
}
