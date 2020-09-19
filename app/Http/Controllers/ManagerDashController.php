<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

use Validator;

class ManagerDashController extends Controller
{

    function index()
    {
    	return view('managerDash.index');
    }

    //get page
    function viewProductManager(Request $request)
    {
        if(session()->get('SID')==2)
        {
            if($request->session()->has('con1'))
            {
                $request->session()->flash('udBTN', $request->session()->get('con1'));
                $request->session()->flash('iBTN', $request->session()->get('con2'));
                $request->session()->flash('iFLD', $request->session()->get('con3'));
            }
            else
            {
            $request->session()->flash('udBTN', 'disabled');
            }
            
            $info = DB::table('product')->get();
            return view('managerDash.prodManageManager.index')->with('info',$info);
        }
        else
        {
            return redirect()->route('login.index');
        }   
    }
    //post
    public function action(Request $request)
    {
        if(Input::get('REFRESH'))
        {
            return redirect()->route('managerDash.prodManageManager.index');
        }

        if(Input::get('SEARCH'))
        {
          $info1 = DB::table('product')->where('PID','=',$request->SearchID)->get();
  
          if(count($info1)>0)
          {
              $request->session()->flash('PID',$info1[0]->PID);
              $request->session()->flash('P_NAME',$info1[0]->P_NAME);
              $request->session()->flash('T',$info1[0]->TYPE);
              $request->session()->flash('AVA',$info1[0]->AVAILABILITY);
              $request->session()->flash('QUA',$info1[0]->QUANTITY);
              $request->session()->flash('BP',$info1[0]->BUY_PRICE);
              $request->session()->flash('SP',$info1[0]->SELL_PRICE);
              $request->session()->flash('MB',$info1[0]->MOD_BY);
              $request->session()->flash('APD',$info1[0]->Add_PDate);
              $request->session()->flash('con1', '');
              $request->session()->flash('con2', 'disabled');
              $request->session()->flash('con3', 'readonly');
  
              return redirect()->route('managerDash.prodManageManager.index');
  
          }
          else
          {
              $request->session()->flash('srchERR', '&#10033;');
              $request->session()->flash('con1', 'disabled');
              $request->session()->flash('con2', '');
              $request->session()->flash('con3', '');
  
              return redirect()->route('managerDash.prodManageManager.index');
          }
  
  
        }

        if(Input::get('INSERT'))
        {

            // $validate = Validator:: make($request->all(),[
            //     'proId' => 'required',
            //     'proName' => 'required',
            //     'proType' => 'required',
            //     'proQuantity' => 'required',
            //     'proBuyPrice' => 'required',
            //     'proSellPrice' => 'required',
            // ]);
            // if($validate->fails())
            // {
            //     $request->session()->flash('ERR', ' *required');
            //     $request->session()->flash('con1', 'disabled');
            //     $request->session()->flash('con2', '');
            //     $request->session()->flash('con3', '');
            //     return back()->with('errors',$validate->errors())->withInput();
            // }

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

            return redirect()->route('managerDash.prodManageManager.index')->with('success','*Product Inserted');
        }

        if(Input::get('UPDATE'))
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
            
            DB::table('product')->where('PID','=',$request->proId)->update(['P_NAME'=>$request->proName,
            'TYPE'=>$request->proType,'AVAILABILITY'=>'AVAILABLE','QUANTITY'=>$request->proQuantity,
            'BUY_PRICE'=>$request->proBuyPrice,'SELL_PRICE'=>$request->proSellPrice,
            'MOD_BY'=>$request->session()->get('LID')]);

            return redirect()->route('managerDash.prodManageManager.index')->with('success','*Product Updated');
        }

        if(Input::get('DELETE'))
        {
            $rules = [
                'proId' => 'required',
            ];
            $msg = [
                'required' => '*required.'
            ];
            $this->validate($request,$rules,$msg);

            DB::table('product')->where('PID','=',$request->proId)->update(['AVAILABILITY'=>'UNAVAILABLE','QUANTITY'=>'0']);

            return redirect()->route('managerDash.prodManageManager.index')->with('success','*Product Deleted');
        }
        
        if(Input::get('PRINT'))
        {
            return redirect()->route('managerDash.prodManageManager.index');
        }

    }



    //get page
    function viewOrderManager()
    {
        if(session()->get('SID')==2)
        {
            $info = DB::table('orderlist')->where('stat','=','0')->get();

            return view('managerDash.orderManageManager.index')->with('info',$info);
        }
        else
        {
            return redirect()->route('login.index');
        }  
    }
    public function viewApprove(Request $request)
    {
        $info = DB::table('orderlist')->where('orderid','=',$request->orderid)->get();
        return view('managerDash.orderManageManager.approve')->with('info',$info);
    }
    //post
    public function approve(Request $request)
    {
        DB::table('orderlist')->where('orderid','=',$request->a)->update(['stat'=>'1', 'deliveryby'=>$request->db]);
        return view('managerDash.index');
    }

}
