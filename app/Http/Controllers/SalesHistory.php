<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class SalesHistory extends Controller
{
    public function index()
    {
        $history=DB::table('sales')->get();
        return view('salesHistory.index')->with('history',$history);
    }
}
