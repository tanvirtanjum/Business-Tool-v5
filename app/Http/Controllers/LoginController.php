<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class LoginController extends Controller
{

    function index()
    {
    	return view('login.index');
    }

    function login_request(Request $request)
    {
      $user = DB::table('log_in')->where('LID', $request->username)->where('PASS', $request->password)->get();

    	if(count($user) > 0 )
      {
        $request->session()->put('LID', $user[0]->LID);
        $request->session()->put('SID', $user[0]->SID);

        if(session()->get('SID') == 1)
        {
          //REQUIRE ADMIN_DASH VIEW
          return redirect()->route('adminDash.index');
        }

        if(session()->get('SID') == 2)
        {
          //REQUIRE MANAGER_DASH VIEW
          return redirect()->route('home.index');
        }

        if(session()->get('SID') == 3)
        {
          //REQUIRE SALESMAN_DASH VIEW
          return redirect()->route('recover.index');
        }

        if(session()->get('SID') == 4)
        {
          //REQUIRE DEVIVERYMAN_DASH VIEW
          return redirect()->route('login.index');
        }

        if(session()->get('SID') == 5)
        {
          //REQUIRE CUSTOMER_DASH VIEW
          return redirect()->route('home.index');
        }

        if(session()->get('SID') == 0)
        {
          $request->session()->flash('_alert', 'ACCESS DENIED');
          return redirect()->route('login.index');
        }
    	}

      else
      {
        $request->session()->flash('_alert', 'INVALID USER');
        return redirect()->route('login.index');
      }
    }
}