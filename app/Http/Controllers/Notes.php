<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Notes extends Controller
{
    public function index()
    {
        return view('notes.index');
    }
}
