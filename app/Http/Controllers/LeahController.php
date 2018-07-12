<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//include Leah
use App\Leah;

class LeahController extends Controller
{
    public function lister(){
      $all = Leah::all();
      return view('leah.all',['rows' => $all]);

    }

    public function add(Request $request){
      //validation
      $this->validate($request, [
        'lname' => 'required|max:5',
      ]);
      //save -- way2
      //Leah::create(['lname' => $request->get('lname').'w1']);
      //way one
      $l = new Leah();
      $l->leah_name = $request->get('lname');
      $l->save();

      //redirect
      return redirect()->route('all');
    }

    public function delete($leah_id){
      //get the record
      $record = Leah::findOrFail($leah_id);
      //delete it
      $record->delete();
      return redirect()->route('all');

    }
}
