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
  public $pic;

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
    $this->pic = DB::table('avatar')->where('LID',$request->session()->get('LID'))->first();
  	return view('aboutUser.index')->with('info', $this->info)->with('pic',$this->pic);
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
    //validation:
    $validate = Validator::make($request->all(),[

      'fullname'=>'required',
      'email'=>'required',
      'mobile'=>'required',
    ]);
    if($validate->fails())
    {
      return back()->with('errors',$validate->errors())->withInput();
    }

    //Profile Picture Upload:
    if(Input::hasFile('avatar'))
    {
      $file = Input::file('avatar');
      $file->move(public_path().'/uploads/',$file->getClientOriginalName());
      $url = URL::to("/").'/uploads/'.$file->getClientOriginalName();
      
      if(DB::table('avatar')->where('LID',$request->session()->get('LID'))->first() == null)
      {
        $ava = DB::table('avatar')->insert(['avatar'=>$url,'LID'=>session()->get('LID')]);
      }
      if(DB::table('avatar')->where('LID',$request->session()->get('LID'))->first() != null)
      {
        $avaUpdate= DB::table('avatar')->where('LID', $request->session()->get('LID'))->update(['avatar'=>$url]);
      }
    }
    

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
