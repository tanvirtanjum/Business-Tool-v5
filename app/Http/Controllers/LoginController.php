<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class LoginController extends Controller
{

    function index(Request $request)
    {
      if($request->session()->has('LID') && $request->session()->has('SID'))
      {
        return redirect()->route('login.index');
      }
      else
      {
        return view('login.justify');
      }
    }

    function check(Request $request)
    {
      if($request->session()->has('LID') && $request->session()->has('SID'))
      {
        if(session()->get('SID') == 1)
        {
          //REQUIRE ADMIN_DASH VIEW (DONE)
          return redirect()->route('adminDash.index');
        }

        if(session()->get('SID') == 2)
        {
          //REQUIRE MANAGER_DASH VIEW (DONE)
          return redirect()->route('managerDash.index');
        }

        if(session()->get('SID') == 3)
        {
          //REQUIRE SALESMAN_DASH VIEW (DONE)
          return redirect()->route('salesmanDash.index');
        }

        if(session()->get('SID') == 4)
        {
          //REQUIRE DEVIVERYMAN_DASH VIEW (DONE)
          return redirect()->route('deliveryDash.index');
        }

        if(session()->get('SID') == 5)
        {
          //REQUIRE CUSTOMER_DASH VIEW (DONE)
          return redirect()->route('customerDash.index');
        }

        if(session()->get('SID') == 0)
        {
          $request->session()->flash('_alert', 'ACCESS DENIED');
          return redirect()->route('login.index');
        }
      }
      else
      {
        return redirect()->route('login.index');
      }
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
          //REQUIRE ADMIN_DASH VIEW (DONE)
          return redirect()->route('adminDash.index');
        }

        if(session()->get('SID') == 2)
        {
          //REQUIRE MANAGER_DASH VIEW (DONE)
          return redirect()->route('managerDash.index');
        }

        if(session()->get('SID') == 3)
        {
          //REQUIRE SALESMAN_DASH VIEW (DONE)
          return redirect()->route('salesmanDash.index');
        }

        if(session()->get('SID') == 4)
        {
          //REQUIRE DEVIVERYMAN_DASH VIEW (DONE)
          return redirect()->route('deliveryDash.index');
        }

        if(session()->get('SID') == 5)
        {
          //REQUIRE CUSTOMER_DASH VIEW (DONE)
          return redirect()->route('customerDash.index');
        }

        if(session()->get('SID') == 0)
        {
          $request->session()->flash('_alert', 'ACCESS DENIED');
          return redirect()->route('login.index');
        }
    	}

      else
      {
        $request->session()->flash('_alert', 'INVALID USERNAME/PASSWORD');
        return redirect()->route('login.index');
      }
    }
}
