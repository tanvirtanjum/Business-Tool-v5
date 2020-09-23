<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Http;
use http\Client;
use GuzzleHttp\Psr7;

use Validator;
class NoticeController extends Controller
{
  public function index()
  {
    try
    {
      $client=new \GuzzleHttp\Client();
      $response=$client->request('GET','http://localhost:3333/notice');
      if($response->getStatusCode() == 200)
      {
        $table=json_decode($response->getBody(), true);
        return view('notice.index')->with('table',$table);
      }
      else
      {
        echo "<h1>ERROR: SERVER NOT WORKING!</h1> <br> <a href='http://localhost:8000/login'>BACK TO DASH</a>";
      }
    }
    catch (\Exception $e)
    {
      echo "<h1>ERROR: SERVER NOT WORKING!</h1> <br> <a href='http://localhost:8000/login'>BACK TO DASH</a>";
    }
  }

  function actionNotice(Request $request)
  {
    if($request->READ)
    {
      $validate = Validator:: make($request->all(),[
          'noticeID' => 'required'
      ]);
      if($validate->fails())
      {
        $request->session()->flash('srchERR', '&#10033;');

        return back()->with('errors',$validate->errors())->withInput();
      }
      else
      {
        $content = DB::table('notice')->where('noticeID','=', $request->noticeID)->get();

        if(count($content) > 0)
        {
          $request->session()->flash('a', $content[0]->noticeID);
          $request->session()->flash('b', $content[0]->noteSub);
          $request->session()->flash('c', $content[0]->noticetext);

          return redirect()->route('notice.index');
        }
        else
        {
          $request->session()->flash('srchERR', '&#10033;');

          return redirect()->route('notice.index');
        }
      }
    }

    if($request->REFRESH)
    {
      return redirect()->route('notice.index');
    }
  }
}
