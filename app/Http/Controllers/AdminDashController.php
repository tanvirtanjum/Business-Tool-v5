<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminDashController extends Controller
{
  function index()
  {
  	return view('adminDash.index');
  }

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

    if($request->REFRESH)
    {
      return redirect()->route('adminDash.empManageAdmin.index');
    }

    if($request->INSERT)
    {
      $check =  DB::table('log_in')->where('LID','=', $request->empId)->get();

      if(count($check) < 1)
      {
        DB::table('log_in')->insert([['LID' => $request->empId, 'SID' => $request->designation, 'PASS' => '12345']]);
        DB::table('employee')->insert([['EmpID' => $request->empId, 'E_NAME' => $request->empName, 'DID' => $request->designation, 'SAL' => $request->empSalary, 'E_MOB' => $request->empMobileNo, 'E_MAIL' => $request->empEmail, 'ADDED_BY' => $request->session()->get('LID')]]);

        return redirect()->route('adminDash.empManageAdmin.index');
      }
    }

    if($request->UPDATE)
    {
      $check =  DB::table('log_in')->where('LID','=', $request->empId)->get();

      if(count($check) > 0)
      {
        DB::table('log_in')->where('LID', $request->empId)->update(['SID' => $request->designation]);
        DB::table('employee')->where('EmpID', $request->empId)->update(['E_NAME' => $request->empName, 'DID' => $request->designation, 'SAL' => $request->empSalary, 'E_MOB' => $request->empMobileNo, 'E_MAIL' => $request->empEmail]);

        return redirect()->route('adminDash.empManageAdmin.index');
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
}
