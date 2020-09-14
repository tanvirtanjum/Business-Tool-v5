<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManagerDashController extends Controller
{

    function index()
    {
    	return view('managerDash.index');
    }

    //get page
    function viewProductManager()
    {
        if(session()->get('SID')==2)
        {
            return view('managerDash.prodManageManager.index');
        }
        else
        {
            return redirect()->route('login.index');
        }   
    }
    //post

    //get page
    function viewOrderManager()
    {
        if(session()->get('SID')==2)
        {
            return view('managerDash.orderManageManager.index');
        }
        else
        {
            return redirect()->route('login.index');
        }  
    }
    //post
    function verify(Request $request)
    {

    }

}
