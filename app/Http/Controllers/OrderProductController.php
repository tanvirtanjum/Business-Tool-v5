<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use http\Client;
use GuzzleHttp\Psr7;

use Validator;
class OrderProductController extends CustomerDashController
{

    function index()
    {
    	return view('customerDash.index');
    }

    function verify(Request $request)
    {

    }
    function view()
    {
        $info = DB::table('product')->get();
        return view('customerDash.orderProducts.index')->with('info',$info);
    }
}
