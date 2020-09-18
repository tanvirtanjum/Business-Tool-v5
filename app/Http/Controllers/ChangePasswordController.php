<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Validator;

class ChangePasswordController extends Controller
{
  function index(Request $request)
  {
    return view('changepassword.index');
  }

  function requestChange(Request $request)
  {
    if($request->PROCEED)
    {
      $validate = Validator:: make($request->all(),[
          'oldpassword' => 'required',
          'newpassword' => 'required',
          'confirmnewpassword' => 'required'
      ]);
      if($validate->fails())
      {
        $request->session()->flash('err', 'SOMETHING WENT WRONG.');
        return back()->with('errors',$validate->errors())->withInput();
      }
      else
      {
        $info = DB::table('log_in')->where('LID','=',$request->session()->get('LID'))->get()->first();
        if($info->PASS != $request->oldpassword || strlen($request->newpassword) < 4 || $request->newpassword != $request->confirmnewpassword)
        {
          $request->session()->flash('err', 'SOMETHING WENT WRONG.');
          return redirect()->route('changepass.index');
        }
        else
        {
          DB::table('log_in')->where('LID', $request->session()->get('LID'))->update(['PASS' => $request->confirmnewpassword]);
          return redirect()->route('logout.execute');
        }

      }
    }
  }
}
