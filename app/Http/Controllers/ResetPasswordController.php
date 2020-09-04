<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResetPasswordController extends Controller
{

    function index()
    {
    	return view('resetPassword.index');
    }

    function verify(Request $request)
    {

    }
}
