<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PendingOrderController extends CustomerDashController
{

    function index()
    {
    	return view('customerDash.index');
    }

    function verify(Request $request)
    {

    }
    function view(Request $name)
    {
      return view('customerDash/pendingOrders.index');
    }
}
