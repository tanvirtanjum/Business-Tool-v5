<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AboutUserController extends Controller
{
  public $info;

  function index(Request $request)
  {
    if($request->session()->get('LID') != '5')
    {
      $this->info = DB::table('employee')->where('EmpID', $request->session()->get('LID'))->first();
    }
    else
    {
      $this->info = DB::table('customer')->where('cusid', $request->session()->get('LID'))->first();
    }
  	return view('aboutUser.index')->with('info', $this->info);
  }

  function edit(Request $request)
  {
    if($request->session()->get('LID') != '5')
    {
      $this->info = DB::table('employee')->where('EmpID', $request->session()->get('LID'))->first();
    }
    else
    {
      $this->info = DB::table('customer')->where('cusid', $request->session()->get('LID'))->first();
    }
    return view('aboutUser.edit')->with('info', $this->info);
  }

  function saveEdit(Request $request)
  {
    if($request->session()->get('LID') != '5')
    {
      $empUpdate = DB::table('employee')->where('EmpID', $request->session()->get('LID'))->update(['E_NAME' => $request->fullname, 'E_MAIL' => $request->email, 'E_MOB' => $request->mobile]);
    }
    else
    {
      $empUpdate = DB::table('customer')->where('cusid', $request->session()->get('LID'))->update(['name' => $request->fullname, 'design' => $request->designation, 'email' => $request->email, 'mobile' => $request->mobile]);
    }

    return redirect()->route('aboutUser.index');
  }
}
