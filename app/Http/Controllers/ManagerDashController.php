<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManagerDashController extends Controller
{

    function index()
    {
    	return view('managerDash.index');
    }

    function verify(Request $request)
    {

    }
}
