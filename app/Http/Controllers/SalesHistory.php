<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SalesHistory extends Controller
{
    public function index()
    {
        return view('salesHistory.index');
    }
}
