<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerDashController extends Controller
{

    function index()
    {
    	return view('customerDash.index');
    }

    function verify(Request $request)
    {

    }
}
