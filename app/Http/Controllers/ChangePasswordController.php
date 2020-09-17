<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class ChangePasswordController extends Controller
{
  function index(Request $request)
  {
    return view('changepassword.index');
  }  
}
