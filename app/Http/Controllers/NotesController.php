<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

use Validator;

class NotesController extends Controller
{

  public function index(Request $request)
  {
    if($request->session()->has('con1'))
    {
      $request->session()->flash('udBTN', $request->session()->get('con1'));
      $request->session()->flash('iBTN', $request->session()->get('con2'));
      $request->session()->flash('iFLD', $request->session()->get('con3'));
    }
    else
    {
      $request->session()->flash('udBTN', 'disabled');
    }

    $info = DB::table('note_m')->where('OwnerID','=',$request->session()->get('LID'))->get();
    return view('notes.index')->with('info',$info);
  }

  public function note(Request $request)
  {
      if(Input::get('SEE'))
      {
        $info1 = DB::table('note_m')->where('NoteID','=',$request->search)->where('OwnerID','=',$request->session()->get('LID'))->get();

        if(count($info1)>0)
        {
            $request->session()->flash('NoteName',$info1[0]->NoteName);
            $request->session()->flash('Text',$info1[0]->Text);
            $request->session()->flash('NoteID',$info1[0]->NoteID);
            $request->session()->flash('con1', '');
            $request->session()->flash('con2', 'disabled');
            $request->session()->flash('con3', 'readonly');

            return redirect()->route('notes.index');

        }
        else
        {
            $request->session()->flash('srchERR', '&#10033;');
            $request->session()->flash('con1', 'disabled');
            $request->session()->flash('con2', '');
            $request->session()->flash('con3', '');

            return redirect()->route('notes.index');
        }


      }

      if(Input::get('PUSH'))
      {
          $validate = Validator:: make($request->all(),[
              'name' => 'required',
              'notes' => 'required',
          ]);
          if($validate->fails())
          {
              return back()->with('errors',$validate->errors())->withInput();
          }
          else
          {
              DB::table('note_m')->insert(['NoteName'=>$request->name,'OwnerID'=>$request->session()->get('LID'),'Text'=>$request->notes]);

              return redirect()->route('notes.index')->with('success','*Note Saved');
          }
      }

      if(Input::get('UPDATE'))
      {
          DB::table('note_m')->where('NoteID','=',$request->NoteID)
          ->where('OwnerID','=',$request->session()->get('LID'))
          ->update(['NoteName'=>$request->name,'Text'=>$request->notes]);

          return redirect()->route('notes.index')->with('success','*Updated');
      }

      if(Input::get('DELETE'))
      {
          DB::table('note_m')->where('NoteID','=',$request->NoteID)->delete();
          return redirect()->route('notes.index')->with('success','*Note Deleted');
      }

      if(Input::get('REFRESH'))
      {

          return redirect()->route('notes.index');
      }

      if(Input::get('PRINT'))
      {
        return redirect()->route('notes.index');
      }
  }
}
