<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SocialMediaSignup extends Controller
{
    function index()
    {
    	return view('signup.socialMediaSignup');
    }

    public function sign()
    {
        
    }
}
