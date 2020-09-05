<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LogoutController extends Controller
{
  function execute(Request $request)
  {
    $request->session()->flush();
  	return redirect()->route('login.index');
  }
}
