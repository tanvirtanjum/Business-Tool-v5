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
      $table = DB::table('orderlist')->where('deliveryby', $request->session()->get('LID'))->where('stat', '1')->orderBy('orderid', 'asc')->get();
      return view('DeliverymanDash.pendingDeliveryList.index')->with('table', $table);
    }

    function acceptPendingOrder(Request $request, $id)
    {
      DB::table('orderlist')->where('orderid','=',$id)->where('deliveryby', $request->session()->get('LID'))->where('stat', '1')->update(['stat' => '2']);
      //DB::table('customer')->where('cusid','=',$id)->update(['status' => '1']);

    	return redirect()->route('deliveryDash.pendingOrder');
    }

    function rejectPendingOrder(Request $request, $id)
    {
      DB::table('orderlist')->where('orderid','=',$id)->where('deliveryby', $request->session()->get('LID'))->where('stat', '1')->delete();

    	return redirect()->route('deliveryDash.pendingOrder');
    }
}
