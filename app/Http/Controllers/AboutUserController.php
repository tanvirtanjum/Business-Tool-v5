<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

use Validator;


class AboutUserController extends Controller
{
  public $info;
  public $pic;

  function index(Request $request)
  {
    if($request->session()->get('LID') != '5')
    {
      $this->info = DB::table('employee')->where('EmpID', $request->session()->get('LID'))->get()->first();
    }
    else
    {
      $this->info = DB::table('customer')->where('cusid', $request->session()->get('LID'))->get()->first();
    }
    $this->pic = DB::table('profile_image')->where('UID',$request->session()->get('LID'))->get()->first();
  	//return view('aboutUser.index')->with('info', $this->info)->with('pic',$this->pic);
    return view('aboutUser.index')->with('info', $this->info)->with('pic', $this->pic);
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

    else
    {
      if($request->session()->get('LID') != '5')
      {
        $empUpdate = DB::table('employee')->where('EmpID', $request->session()->get('LID'))->update(['E_NAME' => $request->fullname, 'E_MAIL' => $request->email, 'E_MOB' => $request->mobile]);
        if(Input::hasFile('avatar'))
        {
          $file = Input::file('avatar');;
          $name = $file->getClientOriginalName();
          $file->move(public_path().'/uploads/',$file->getClientOriginalName());

          if(DB::table('profile_image')->where('UID',$request->session()->get('LID'))->first() == null)
          {
            $ava = DB::table('profile_image')->insert(['UID'=>session()->get('LID'), 'IMAGE'=>$name]);
          }
          if(DB::table('profile_image')->where('UID',$request->session()->get('LID'))->first() != null)
          {
            $previousFile = DB::table('profile_image')->where('UID',$request->session()->get('LID'))->first();

            if($previousFile->IMAGE != 'BT_Default_avatar_011211.png')
            {
              File::delete('uploads/'.$previousFile->IMAGE.'');
              //Storage::delete('uploads/'.$previousFile->IMAGE);
            }

            $avaUpdate= DB::table('profile_image')->where('UID', $request->session()->get('LID'))->update(['IMAGE'=>$name]);
          }
        }
      }
      else
      {
        $cusUpdate = DB::table('customer')->where('cusid', $request->session()->get('LID'))->update(['name' => $request->fullname, 'design' => $request->designation, 'email' => $request->email, 'mobile' => $request->mobile]);
        if(Input::hasFile('avatar'))
        {
          $file = Input::file('avatar');;
          $name = $file->getClientOriginalName();
          $file->move(public_path().'/uploads/',$file->getClientOriginalName());

          if(DB::table('profile_image')->where('UID',$request->session()->get('LID'))->get()->first() == null)
          {
            $ava = DB::table('profile_image')->insert(['UID'=>session()->get('LID'), 'IMAGE'=>$name]);
          }

          if(DB::table('profile_image')->where('UID',$request->session()->get('LID'))->get()->first() != null)
          {
            $previousFile = DB::table('profile_image')->where('UID',$request->session()->get('LID'))->first();

            if($previousFile->IMAGE != 'BT_Default_avatar_011211.png')
            {
              File::delete('uploads/'.$previousFile->IMAGE.'');
              //Storage::delete('uploads/'.$previousFile->IMAGE);
            }

            $avaUpdate= DB::table('profile_image')->where('UID', $request->session()->get('LID'))->update(['IMAGE'=>$name]);
          }
        }
      }

      return redirect()->route('aboutUser.index');
    }
  }

}
