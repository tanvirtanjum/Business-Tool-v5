<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DeliverymanDashController extends Controller
{

    function index()
    {
    	return view('DeliverymanDash.index');
    }

    function viewPendingDelivery(Request $request)
    {
      return view('DeliverymanDash.pendingDeliveryList.index');
    }
}
