<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use Validator;

class ResetPasswordController extends Controller
{

    function index()
    {
    	return view('resetPassword.index');
    }

    function verify(Request $request)
    {

    }
    public function sendMail(Request $request)
    {
        $info= DB::table('employee')->where('E_MAIL','=',$request->email)->first();
        if($info==FALSE)
        {
            return redirect()->back()->with(['error'=>'Email not exist']);
        }
        if($info== TRUE)
        {
            $details=[
                'title'=>'Recover Password',
                'body'=> $info->E_NAME,
                'token'=>$request->token,
                'email'=>$info->E_MAIL,
            ];
            \Mail::to($request->email)->send(new \App\Mail\TestMail($details));
            return redirect()->back()->with(['success'=>'Reset Code send to your Email']);
        }

    }

    public function resetPage(Request $request)
    {
        $info= DB::table('employee')->where('E_MAIL','=',$request->email)->first();
        if($info== TRUE)
        {
            $details=[
                'title'=>'Recover Password',
                'body'=> $info->E_NAME,
                'token'=>$request->token,
                'email'=>$info->E_MAIL,
            ];
        }
        return view('resetPassword.reset')->with('details',$details);
    }
    function passRecover(Request $request)
    {
        $info= DB::table('employee')->where('E_MAIL','=',$request->email)->first();

        $id=$info->EmpID;

        $validate = Validator:: make($request->all(),[
            'newpass' => 'required|min:4',
            'connewpass' =>'required|same:newpass',
        ]);
        if($validate->fails())
        {
            return back()->with('errors',$validate->errors())->withInput();
        }

        else
        {
            $data = DB::table('log_in')->where('LID','=',$id)->update(['PASS'=>$request->connewpass]);

            return redirect()->route('login.index')->with('success','Password Recoverd Successfully');
        }
    }
}
