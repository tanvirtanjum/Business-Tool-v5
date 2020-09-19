<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Validator;


class SalesmanDashController extends Controller
{
    //get
    function index()
    {
        
        return view('salesmanDash.index');
    }
    //get
    function view()
    {
        $info = DB::table('product')->get();
        return view('salesmanDash.sellProducts.index')->with('info',$info);
    }
    //post
    public function action(Request $request)
    {
        if(Input::get('REFRESH'))
        {
            return redirect()->route('salesmanDash.sellProducts.index');
        }

        if(Input::get('SEARCH'))
        {
          $info1 = DB::table('product')->where('PID','=',$request->SearchID)->get();
  
          if(count($info1)>0)
          {
              $request->session()->flash('PID',$info1[0]->PID);
              $request->session()->flash('P_NAME',$info1[0]->P_NAME);
              $request->session()->flash('T',$info1[0]->TYPE);
              $request->session()->flash('SP',$info1[0]->SELL_PRICE);
              $request->session()->flash('con1', '');
              $request->session()->flash('con2', 'disabled');
              $request->session()->flash('con3', 'readonly');
  
              return redirect()->route('salesmanDash.sellProducts.index');
  
          }
          else
          {
              $request->session()->flash('srchERR', '&#10033;');
              $request->session()->flash('con1', 'disabled');
              $request->session()->flash('con2', '');
              $request->session()->flash('con3', '');
  
              return redirect()->route('salesmanDash.sellProducts.index');
          }
  
  
        }

        if(Input::get('SELL'))
        {

            $rules = [
                'proId' => 'required',
                'proName' => 'required',
                'proType' => 'required',
                'proQuantity' => 'required',
                'proBuyPrice' => 'required',
                'proSellPrice' => 'required',
            ];
            $msg = [
                'required' => '*required.'
            ];

            $this->validate($request,$rules,$msg);
            
            DB::table('product')->insert(['PID'=>$request->proId,'P_NAME'=>$request->proName,
            'TYPE'=>$request->proType,'AVAILABILITY'=>'AVAILABLE','QUANTITY'=>$request->proQuantity,
            'BUY_PRICE'=>$request->proBuyPrice,'SELL_PRICE'=>$request->proSellPrice,
            'MOD_BY'=>$request->session()->get('LID')]);

            return redirect()->route('salesmanDash.sellProducts.index')->with('success','*Product Sold');
        }
        
        if(Input::get('PRINT'))
        {
            return redirect()->route('salesmanDash.sellProducts.index');
        }

    }
}
