<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Http;
use http\Client;
use GuzzleHttp\Psr7;


class SalesHistoryController extends Controller
{
    public function index()
    {
        $client=new \GuzzleHttp\Client();
        $response=$client->request('GET','http://localhost:3000/show');
        $history=json_decode($response->getBody(), true);
        return view('salesHistory.index')->with('history',$history);
        
        //$history=DB::table('sales')->get();
        
    }
}
