<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;

class AdminDashController extends Controller
{
  //View AdminDash
  function index()
  {
  	return view('adminDash.index');
  }

  //Employee Management
  function viewAdminEmployeeManage(Request $request)
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

    $table = DB::table('employee')->orderBy('DID', 'asc')->get();
  	return view('adminDash.empManageAdmin.index')->with('table', $table);
  }

  function actionAdminEmployeeManage(Request $request)
  {
    if($request->SEARCH)
    {
      $validate = Validator:: make($request->all(),[
          'SearchID' => 'required'
      ]);
      if($validate->fails())
      {
        $request->session()->flash('srchERR', '&#10033;');
        $request->session()->flash('con1', 'disabled');
        $request->session()->flash('con2', '');
        $request->session()->flash('con3', '');

        //return redirect()->route('adminDash.empManageAdmin.index');
        return back()->with('errors',$validate->errors())->withInput();
      }
      else
      {
        $content = DB::table('employee')->where('EmpID','=', $request->SearchID)->get();

        if(count($content) > 0)
        {
          $request->session()->flash('a', $content[0]->EmpID);
          $request->session()->flash('b', $content[0]->E_NAME);
          $request->session()->flash('c', $content[0]->DID);
          $request->session()->flash('d', $content[0]->SAL);
          $request->session()->flash('e', $content[0]->E_MOB);
          $request->session()->flash('f', $content[0]->E_MAIL);
          $request->session()->flash('g', $content[0]->JOIN_DATE);
          $request->session()->flash('h', $content[0]->ADDED_BY);
          $request->session()->flash('con1', '');
          $request->session()->flash('con2', 'disabled');
          $request->session()->flash('con3', 'readonly');

          return redirect()->route('adminDash.empManageAdmin.index');
        }
        else
        {
          $request->session()->flash('srchERR', '&#10033;');
          $request->session()->flash('con1', 'disabled');
          $request->session()->flash('con2', '');
          $request->session()->flash('con3', '');

          return redirect()->route('adminDash.empManageAdmin.index');
        }
      }
    }

    if($request->REFRESH)
    {
      return redirect()->route('adminDash.empManageAdmin.index');
    }

    if($request->INSERT)
    {
      $validate = Validator:: make($request->all(),[
          'empId' => 'required',
          'empName' => 'required',
          'designation' => 'required',
          'empSalary' => 'required', 'min:1',
          'empMobileNo' => 'required',
          'empEmail' => 'required',
      ]);
      if($validate->fails())
      {
        $request->session()->flash('dbERR', 'ERROR!!');
        $request->session()->flash('con1', 'disabled');
        $request->session()->flash('con2', '');
        $request->session()->flash('con3', '');

        //return redirect()->route('adminDash.empManageAdmin.index');
        return back()->with('errors',$validate->errors())->withInput();
      }

      else
      {
        $check =  DB::table('log_in')->where('LID','=', $request->empId)->get();

        if(count($check) < 1)
        {
          DB::table('log_in')->insert([['LID' => $request->empId, 'SID' => $request->designation, 'PASS' => '12345']]);
          DB::table('employee')->insert([['EmpID' => $request->empId, 'E_NAME' => $request->empName, 'DID' => $request->designation, 'SAL' => $request->empSalary, 'E_MOB' => $request->empMobileNo, 'E_MAIL' => $request->empEmail, 'ADDED_BY' => $request->session()->get('LID')]]);

          return redirect()->route('adminDash.empManageAdmin.index');
        }

        else
        {
          $request->session()->flash('dbERR', 'ERROR!!');
          return redirect()->route('adminDash.empManageAdmin.index');
        }
      }
    }

    if($request->UPDATE)
    {
      $validate = Validator:: make($request->all(),[
          'empId' => 'required',
          'empName' => 'required',
          'designation' => 'required',
          'empSalary' => 'required', 'min:1',
          'empMobileNo' => 'required',
          'empEmail' => 'required',
      ]);
      if($validate->fails())
      {
        $request->session()->flash('dbERR', 'ERROR!!');
        $request->session()->flash('con1', 'disabled');
        $request->session()->flash('con2', '');
        $request->session()->flash('con3', '');

        //return redirect()->route('adminDash.empManageAdmin.index');
        return back()->with('errors',$validate->errors())->withInput();
      }
      else
      {
        $check =  DB::table('log_in')->where('LID','=', $request->empId)->get();

        if(count($check) > 0)
        {
          DB::table('log_in')->where('LID', $request->empId)->update(['SID' => $request->designation]);
          DB::table('employee')->where('EmpID', $request->empId)->update(['E_NAME' => $request->empName, 'DID' => $request->designation, 'SAL' => $request->empSalary, 'E_MOB' => $request->empMobileNo, 'E_MAIL' => $request->empEmail]);

          return redirect()->route('adminDash.empManageAdmin.index');
        }
        else
        {
          $request->session()->flash('dbERR', 'ERROR!!');
          return redirect()->route('adminDash.empManageAdmin.index');
        }
      }
    }

    if($request->DELETE)
    {
      $check =  DB::table('log_in')->where('LID','=', $request->empId)->get();

      if(count($check) > 0)
      {
        DB::table('log_in')->where('LID', $request->empId)->update(['SID' => '0']);
        DB::table('employee')->where('EmpID', $request->empId)->update(['E_NAME' => $request->empName, 'DID' => '0', 'SAL' => $request->empSalary, 'E_MOB' => $request->empMobileNo, 'E_MAIL' => $request->empEmail]);

        return redirect()->route('adminDash.empManageAdmin.index');
      }
    }
  }

  //Product Management
  function viewAdminProductManage(Request $request)
  {
    if($request->session()->has('con1'))
    {
      $request->session()->flash('udBTN', $request->session()->get('con1'));
      $request->session()->flash('iBTN', $request->session()->get('con2'));
      $request->session()->flash('iFLD', $request->session()->get('con3'));
      $request->session()->flash('action', $request->session()->get('con4'));
    }
    else
    {
      $request->session()->flash('udBTN', 'disabled');
      $request->session()->flash('action', 'ACTION');
    }

    $table = DB::table('product')->orderBy('TYPE', 'asc')->get();
  	return view('adminDash.prodManageAdmin.index')->with('table', $table);
  }

  function actionAdminProductManage(Request $request)
  {
    if($request->SEARCH)
    {
      $validate = Validator:: make($request->all(),[
          'SearchID' => 'required',
      ]);
      if($validate->fails())
      {
        $request->session()->flash('srchERR', '&#10033;');
        $request->session()->flash('con1', 'disabled');
        $request->session()->flash('con2', '');
        $request->session()->flash('con3', '');
        $request->session()->flash('con4', 'ACTION');
        //return redirect()->route('adminDash.empManageAdmin.index');
        return back()->with('errors',$validate->errors())->withInput();
      }
      else
      {
        $content = DB::table('product')->where('PID','=', $request->SearchID)->get();

        if(count($content) > 0)
        {
          $request->session()->flash('a', $content[0]->PID);
          $request->session()->flash('b', $content[0]->P_NAME);
          $request->session()->flash('c', $content[0]->TYPE);
          $request->session()->flash('d', $content[0]->QUANTITY);
          $request->session()->flash('e', $content[0]->BUY_PRICE);
          $request->session()->flash('f', $content[0]->SELL_PRICE);
          $request->session()->flash('g', $content[0]->MOD_BY);
          $request->session()->flash('h', $content[0]->Add_PDate);
          $request->session()->flash('con1', '');
          $request->session()->flash('con2', 'disabled');
          $request->session()->flash('con3', 'readonly');

          if($content[0]->AVAILABILITY == 'AVAILABLE')
          {
            $request->session()->flash('con4', 'RESTRICT');
          }
          else if($content[0]->AVAILABILITY == 'UNAVAILABLE')
          {
            $request->session()->flash('con4', 'AVAIL');
          }
          else
          {
            $request->session()->flash('con4', 'ACTION');
          }

          return redirect()->route('adminDash.prodManageAdmin.index');
        }
        else
        {
          $request->session()->flash('srchERR', '&#10033;');
          $request->session()->flash('con1', 'disabled');
          $request->session()->flash('con2', '');
          $request->session()->flash('con3', '');
          $request->session()->flash('con4', 'ACTION');

          return redirect()->route('adminDash.prodManageAdmin.index');
        }
      }
    }

    if($request->REFRESH)
    {
      return redirect()->route('adminDash.prodManageAdmin.index');
    }

    if($request->INSERT)
    {
      $validate = Validator:: make($request->all(),[
          'proId' => 'required',
          'proName' => 'required',
          'proType' => 'required',
          'proQuantity' => 'required', 'min:1',
          'proBuyPrice' => 'required', 'min:1',
          'proSellPrice' => 'required', 'min:1'
      ]);
      if($validate->fails())
      {
        $request->session()->flash('dbERR', 'ERROR!!');
        $request->session()->flash('con1', 'disabled');
        $request->session()->flash('con2', '');
        $request->session()->flash('con3', '');
        $request->session()->flash('con4', 'ACTION');
        //return redirect()->route('adminDash.empManageAdmin.index');
        return back()->with('errors',$validate->errors())->withInput();
      }
      else
      {
        $check =  DB::table('product')->where('PID','=', $request->proId)->get();

        if(count($check) < 1)
        {
          if($request->proSellPrice >= $request->proBuyPrice)
          {
            DB::table('product')->insert([['PID' => $request->proId, 'P_NAME' => $request->proName, 'TYPE' => $request->proType, 'QUANTITY' => $request->proQuantity, 'BUY_PRICE' => $request->proBuyPrice, 'SELL_PRICE' => $request->proSellPrice, 'MOD_BY' => $request->session()->get('LID')]]);

            return redirect()->route('adminDash.prodManageAdmin.index');
          }
          else
          {
            $request->session()->flash('dbERR', 'ERROR!!');
            $request->session()->flash('con1', 'disabled');
            $request->session()->flash('con2', '');
            $request->session()->flash('con3', '');
            $request->session()->flash('con4', 'ACTION');
            //return redirect()->route('adminDash.empManageAdmin.index');
            return back()->with('errors',$validate->errors())->withInput();
          }
        }
        else
        {
          $request->session()->flash('dbERR', 'ERROR!!');
          $request->session()->flash('con1', 'disabled');
          $request->session()->flash('con2', '');
          $request->session()->flash('con3', '');
          $request->session()->flash('con4', 'ACTION');
          //return redirect()->route('adminDash.empManageAdmin.index');
          return back()->with('errors',$validate->errors())->withInput();
        }
      }
    }

    if($request->UPDATE)
    {
      $validate = Validator:: make($request->all(),[
          'proId' => 'required',
          'proName' => 'required',
          'proType' => 'required',
          'proQuantity' => 'required', 'min:1',
          'proBuyPrice' => 'required', 'min:1',
          'proSellPrice' => 'required', 'min:1'
      ]);
      if($validate->fails())
      {
        $request->session()->flash('dbERR', 'ERROR!!');
        $request->session()->flash('con1', 'disabled');
        $request->session()->flash('con2', '');
        $request->session()->flash('con3', '');
        $request->session()->flash('con4', 'ACTION');
        //return redirect()->route('adminDash.empManageAdmin.index');
        return back()->with('errors',$validate->errors())->withInput();
      }
      else
      {
        $check =  DB::table('product')->where('PID','=', $request->proId)->get();

        if(count($check) > 0)
        {
          if($request->proSellPrice >= $request->proBuyPrice)
          {
            DB::table('product')->where('PID','=', $request->proId)->update(['PID' => $request->proId, 'P_NAME' => $request->proName, 'TYPE' => $request->proType, 'QUANTITY' => $request->proQuantity, 'BUY_PRICE' => $request->proBuyPrice, 'SELL_PRICE' => $request->proSellPrice, 'MOD_BY' => $request->session()->get('LID')]);

            return redirect()->route('adminDash.prodManageAdmin.index');
          }
          else
          {
            $request->session()->flash('dbERR', 'ERROR!!');
            $request->session()->flash('con1', 'disabled');
            $request->session()->flash('con2', '');
            $request->session()->flash('con3', '');
            $request->session()->flash('con4', 'ACTION');
            //return redirect()->route('adminDash.empManageAdmin.index');
            return back()->with('errors',$validate->errors())->withInput();
          }
        }
        else
        {
          $request->session()->flash('dbERR', 'ERROR!!');
          $request->session()->flash('con1', 'disabled');
          $request->session()->flash('con2', '');
          $request->session()->flash('con3', '');
          $request->session()->flash('con4', 'ACTION');
          //return redirect()->route('adminDash.empManageAdmin.index');
          return back()->with('errors',$validate->errors())->withInput();
        }
      }
    }

    if($request->RESTRICT)
    {
      $check =  DB::table('product')->where('PID','=', $request->proId)->get();

      if(count($check) > 0)
      {
        DB::table('product')->where('PID', $request->proId)->update(['AVAILABILITY' => 'UNAVAILABLE']);

        return redirect()->route('adminDash.prodManageAdmin.index');
      }
    }

    if($request->AVAIL)
    {
      $check =  DB::table('product')->where('PID','=', $request->proId)->get();

      if(count($check) > 0)
      {
        DB::table('product')->where('PID', $request->proId)->update(['AVAILABILITY' => 'AVAILABLE']);

        return redirect()->route('adminDash.prodManageAdmin.index');
      }
    }
  }

  //CUSTOMER ACESSS MANAGEMENT
  function viewAdminCustomerManage(Request $request)
  {
    if($request->session()->has('con1'))
    {
      $request->session()->flash('udBTN', $request->session()->get('con1'));
      $request->session()->flash('action', $request->session()->get('con4'));
    }
    else
    {
      $request->session()->flash('udBTN', 'disabled');
      $request->session()->flash('action', 'ACTION');
    }

    $table = DB::table('customer')->where('status','!=','2')->get();
  	return view('adminDash.customerManageAdmin.index')->with('table', $table);
  }

  function actionAdminCustomerManage(Request $request)
  {
    if($request->SEARCH)
    {
      $validate = Validator:: make($request->all(),[
          'SearchID' => 'required'
      ]);
      if($validate->fails())
      {
        $request->session()->flash('srchERR', '&#10033;');
        $request->session()->flash('con1', 'disabled');
        $request->session()->flash('con4', 'ACTION');
        //return redirect()->route('adminDash.empManageAdmin.index');
        return back()->with('errors',$validate->errors())->withInput();
      }
      else
      {
        $content = DB::table('customer')->where('cusid','=', $request->SearchID)->get();

        if(count($content) > 0)
        {
          $request->session()->flash('a', $content[0]->cusid);
          $request->session()->flash('b', $content[0]->name);
          $request->session()->flash('c', $content[0]->design);
          $request->session()->flash('d', $content[0]->email);
          $request->session()->flash('e', $content[0]->mobile);
          $request->session()->flash('f', $content[0]->reg_date);
          $request->session()->flash('con1', '');

          if($content[0]->status == 0)
          {
            $request->session()->flash('con4', 'ALLOW');
          }
          else if($content[0]->status == 1)
          {
            $request->session()->flash('con4', 'RESTRICT');
          }
          else
          {
            $request->session()->flash('con4', 'ACTION');
          }

          return redirect()->route('adminDash.cusManageAdmin.index');
        }
        else
        {
          $request->session()->flash('srchERR', '&#10033;');
          $request->session()->flash('con1', 'disabled');
          $request->session()->flash('con4', 'ACTION');

          return redirect()->route('adminDash.cusManageAdmin.index');
        }
      }
    }

    if($request->REFRESH)
    {
      return redirect()->route('adminDash.cusManageAdmin.index');
    }

    if($request->RESTRICT)
    {
      $check =  DB::table('log_in')->where('LID','=', $request->Id)->get();

      if(count($check) > 0)
      {
        DB::table('log_in')->where('LID', $request->Id)->update(['SID' => '0']);
        DB::table('customer')->where('cusid', $request->Id)->update(['status' => '0']);

        return redirect()->route('adminDash.cusManageAdmin.index');
      }
    }

    if($request->ALLOW)
    {
      $check =  DB::table('log_in')->where('LID','=', $request->Id)->get();

      if(count($check) > 0)
      {
        DB::table('log_in')->where('LID', $request->Id)->update(['SID' => '5']);
        DB::table('customer')->where('cusid', $request->Id)->update(['status' => '1']);

        return redirect()->route('adminDash.cusManageAdmin.index');
      }
    }
  }

  //Pending Registration
  function viewAdminRegistrationManage(Request $request)
  {
    $table = DB::table('customer')->where('status','=','2')->get();
  	return view('adminDash.regManageAdmin.index')->with('table', $table);
  }

  function acceptAdminRegistrationManage(Request $request, $id)
  {
    DB::table('log_in')->where('LID', $id)->update(['SID' => '5']);
    DB::table('customer')->where('cusid','=',$id)->update(['status' => '1']);
  	return redirect()->route('adminDash.regManageAdmin.index');
  }

  function rejectAdminRegistrationManage(Request $request, $id)
  {
    DB::table('customer')->where('cusid','=',$id)->delete();
    DB::table('log_in')->where('LID', $id)->delete();
  	return redirect()->route('adminDash.regManageAdmin.index');
  }
}
