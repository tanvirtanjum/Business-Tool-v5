<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\DB;

class SocialMediaSignupController extends Controller
{
    function index()
    {
    	return view('signup.socialMediaSignup');
    }

    public function fbsubmit()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function fbres()
    {
        $usr = Socialite::driver('facebook')->user();

        echo "<title>Social Media Signup</title>";
        echo "<fieldset>";
        echo "<legend>Social Media Login </legend>";
        echo "<br/>";
        echo "Name: " , $usr->id;

        echo "<br/>";
        echo "<br/>";
        echo "Name: " , $usr->name;

        echo "<br/>";
        echo "<br/>";

        echo "Email: " , $usr->email;
        echo "<br/>";
        echo "<br/>";

        echo  "Your Password: 1234 , after login change your password";
        echo "<br/>";
        echo "<br/>";

        echo "<span style='color:green'>Info Saved in Database wait For Admin Verification</span>";
        echo "<br/>";
        echo "<br/>";

        echo "<a href='/'>Home Page</a>";
        echo "<br/>";


        $userID = $usr->id;
        $SID = '2';
        $pass = '1234';
        $fullname = $usr->name;
        $email = $usr->email;
        $design = 'Customer';
        //$mobile='01778578380';


        $info = DB::table('log_in')->insert(['LID'=>$userID,'SID'=>'0','PASS'=>$pass]);

        $data= DB::table('customer')->insert(['cusid'=>$userID,'name'=>$fullname,
               'design'=>$design,'email'=>$email,'mobile'=>'','status'=>$SID]);

        DB::table('profile_image')->insert([['UID' => $userID, 'IMAGE' => 'BT_Default_avatar_011211.png']]);

    }

    public function twittersubmit()
    {
        return Socialite::driver('twitter')->redirect();
    }
}
