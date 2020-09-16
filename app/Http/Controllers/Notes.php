<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

use Validator;

class Notes extends Controller
{
    public function index(Request $request)
    {
        $info = DB::table('note_m')->where('OwnerID','=',$request->session()->get('LID'))->get();
        return view('notes.index')->with('info',$info);
    }

    public function note(Request $request)
    {
        if($request->session()->get('LID') == '1' || $request->session()->get('LID') == '2'||$request->session()->get('LID') == '3'|| $request->session()->get('LID') == '4')
         {
            if(Input::get('SEE'))
            {
                $info1 = DB::table('note_m')->where('NoteID','=',$request->search)
                ->where('OwnerID','=',$request->session()->get('LID'))->get();


                return redirect()->route('notes.index');

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
                //return redirect()->route('notes.index');
            }
         }
    }
}
