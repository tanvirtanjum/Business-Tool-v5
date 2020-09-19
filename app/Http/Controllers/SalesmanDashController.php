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
              $request->session()->flash('Q',$info1[0]->QUANTITY);
              $request->session()->flash('SP',$info1[0]->SELL_PRICE);
              $request->session()->flash('BP',$info1[0]->BUY_PRICE);
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
            //validation
            $rules = [
                'proId' => 'required',
                'proName' => 'required',
                'proType' => 'required',
                'proQuantity' => 'required',
                'proSellPrice' => 'required',
                'proSellPrice' => 'required',
                'customerName' => 'required',
                'customerNo' => 'required',

            ];
            $msg = [
                'required' => '*required.'
            ];

            $this->validate($request,$rules,$msg);


            //db
            $profits = $request->proSellPrice-$request->proBuyPrice;
            $price = $request->proSellPrice* $request->proQuantity;
            $profit = $profits*$request->proQuantity; 

            $inf = DB::table('product')->where('PID','=',$request->proId)->get();
            if($inf[0]->AVAILABILITY != 'UNAVAILABLE')
            {
                $data=DB::table('sales')->insert(['PID'=>$request->proId,'QUANT'=>$request->proQuantity,'OB_AMMOUNT'=>$price,
                'PROFIT'=>$profit,'C_NAME'=>$request->customerName,'C_MOB'=>$request->customerNo,'SOLD_BY'=>$request->session()->get('LID')]);

                if($data==TRUE)
                {
                    $quant = $request->preQuantity- $request->proQuantity;
                    $query1 = DB::table('product')->where('PID','=',$request->proId)->update(['QUANTITY'=>$quant]);

                    if($quant==0)
                    {
                        $query2 = DB::table('product')->where('PID','=',$request->proId)->update(['AVAILABILITY'=>'UNAVAILABLE']);
                    }
                }
                return redirect()->route('salesmanDash.sellProducts.index')->with('success','*Product Sold');
            }
            else
            {
                return back()->with('fail','Not Enough Product Remain');
            }
            
        }
        
        if(Input::get('PRINT'))
        {
            return redirect()->route('salesmanDash.sellProducts.index');
        }

    }
}
