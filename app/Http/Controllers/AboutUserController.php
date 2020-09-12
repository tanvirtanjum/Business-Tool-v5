<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;

use Validator;


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
    $validate = Validator::make($request->all(),[

      'fullname'=>'required',
      'email'=>'required',
      'mobile'=>'required',
    ]);
    if($validate->fails())
    {
      return back()->with('errors',$validate->errors())->withInput();
    }

    if($request->session()->get('LID') != '5')
    {
      if(Input::hasFile('avatar'))
      {
        $file = Input::file('avatar');
        $file->move(public_path().'/uploads/',$file->getClientOriginalName());
        $url = URL::to("/").'/uploads/'.$file->getClientOriginalName();
        
      }
      // $ava ->avatar = $url;
      // $ava->save();
      
      $empUpdate = DB::table('employee')->where('EmpID', $request->session()->get('LID'))->update(['E_NAME' => $request->fullname, 'E_MAIL' => $request->email, 'E_MOB' => $request->mobile,'avatar'=>$url]);
      
    }
    else
    {
      if(Input::hasFile('avatar'))
      {
        $file = Input::file('avatar');
        $file->move(public_path().'/uploads/',$file->getClientOriginalName());
        $url = URL::to("/").'/uploads/'.$file->getClientOriginalName();
        
      }
      // $ava ->avatar = $url;
      // $ava->save();
      $empUpdate = DB::table('customer')->where('cusid', $request->session()->get('LID'))->update(['name' => $request->fullname, 'design' => $request->designation, 'email' => $request->email, 'mobile' => $request->mobile,'avatar'=>$url]);
    }

    return redirect()->route('aboutUser.index');
  }
  
}
