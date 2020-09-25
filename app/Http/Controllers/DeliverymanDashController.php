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
      $content = DB::table('orderlist')->where('orderid','=',$id)->get()->first();
      $customer=  DB::table('customer')->where('cusid','=', $content->orderby)->get()->first();
      DB::table('sales')->insert(['PID'=>$content->prodid,'QUANT'=>$content->quant,'OB_AMMOUNT'=>$content->ammout,'PROFIT'=>'0','C_NAME'=>'ONLINE-'.$customer->name,'C_MOB'=>'00000000000','SOLD_BY'=>$content->deliveryby]);

    	return redirect()->route('deliveryDash.pendingOrder');
    }

    function rejectPendingOrder(Request $request, $id)
    {
      //DB::table('orderlist')->where('orderid','=',$id)->where('deliveryby', $request->session()->get('LID'))->where('stat', '1')->delete();
      $content = DB::table('orderlist')->where('orderid','=',$id)->get()->first();
      $product = DB::table('product')->where('PID',$content->prodid)->get()->first();
      $newQuant = $content->quant + $product->QUANTITY;
      DB::table('product')->where('PID',$content->prodid)->update(['QUANTITY' => $newQuant]);
      DB::table('orderlist')->where('orderid','=',$id)->where('deliveryby', $request->session()->get('LID'))->where('stat', '1')->delete();
    	return redirect()->route('deliveryDash.pendingOrder');
    }

    function viewRecord(Request $request)
    {
      $table = DB::table('orderlist')->where('deliveryby', $request->session()->get('LID'))->where('stat', '2')->orderBy('orderid', 'asc')->get();
      return view('DeliverymanDash.deliveryRecords.index')->with('table', $table);
    }
}
