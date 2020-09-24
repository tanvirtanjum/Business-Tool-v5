<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Http;
use http\Client;
use GuzzleHttp\Psr7;

use Validator;
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
