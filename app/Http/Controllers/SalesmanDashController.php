<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SalesmanDashController extends Controller
{

    function index()
    {
    	return view('salesmanDash.index');
    }

    function verify(Request $request)
    {

    }
}
