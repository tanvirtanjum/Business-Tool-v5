<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator;

class SignupController extends Controller
{

    function index()
    {
    	return view('signup.index');
    }

    public function create(Request $request)
    {
        $validate = Validator:: make($request->all(),[
            'username' => 'required',
            'password' =>'required|min:4',
            'confirmpassword' =>'required|same:password',
            'fullname' =>'required',
            'design' =>'required',
            'email' =>'required',
            'mobilenumber' =>'required|max:11',
        ]);
        if($validate->fails())
        {
            return back()->with('errors',$validate->errors())->withInput();
        }
        else
        {
            
        }
    }

    function verify(Request $request)
    {
      
    }
}
