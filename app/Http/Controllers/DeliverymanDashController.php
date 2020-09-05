<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DeliverymanDashController extends Controller
{

    function index()
    {
    	return view('DeliverymanDash.index');
    }

    function verify(Request $request)
    {

    }
}
