<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jaribu;
class JaribuController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    $all = User::all();
    return view('jaribu/index', ['jaribus' => $all]);
  }

  public function add(){
     $all = Jaribu::all();
     return view('jaribu.add',
     ['rows'=> $all]);
   }
  /**
  * Store a newly created resource in storage.
  */
  public function save(Request $request)
  {
    //form validation
    $this->validate($request, [
      'jname' => 'required',
    ]);

    //get post value
    $jaribu_value =
    $request->input('jname');
    //inserting a record
    $first = new Jaribu();
    $first->jaribu_name = $jaribu_value;
    $first->save();

    //redirect
    return redirect()->route('add');
  }

  //@TODO  : Complete this
  public function edit($id)
  {

  }

  //@TODO  : Complete this
  public function update(Request $request, $id)
  {


  }
  
  public function delete($id)
  {
    $jaribu_v = Jaribu::findOrFail($id);
    $jaribu_v->delete();
    //redirect
    return redirect()->route('add');
  }
}
