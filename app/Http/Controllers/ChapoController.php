<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Chapos;

class ChapoController extends Controller
{
    //List all Chapos
    public function all_chapos(){
      //get all records
      //returns: array of objects
      $allc = Chapos::all();
      //return the view
        return view('chapos.all',['chapos'=>$allc]);
    }
    //Adds a new chapo
    public function weka_chapo(Request $request){
      //validation
        $validatedData = $this->validate($request, [
          'cname' => 'required|string|',
          'cvalue' => 'required|numeric|',
      ]);
      //save
      $brown = new Chapos();
      $brown->chapo_name = $request->get('cname');
      $brown->chapo_value = $request->get('cvalue');
      $brown->save();
      //redirect
      return redirect()->to('chapos/all');

    }
    //Delete a chapos
    public function tupa_chapo(Request $request){
    if($request->get('chapo_id') != null){
      //try find the records
      $theChapo = Chapos::findOrFail
      ($request->get('chapo_id'));
      //delete
      $theChapo->delete();
    }
    //redirect
    return redirect()->to('chapos/all');
  }
    //Edit a chapo
    public function edit_chapo(Request $request){
    if($request->get('chapo_id') != null){
      //try find the records
      $theChapo = Chapos::findOrFail
      ($request->get('chapo_id'));
      //validation
        $validatedData = $this->validate($request, [
          'cname' => 'required|string|',
          'cvalue' => 'required|numeric|',
      ]);
      //save
      $theChapo->chapo_name = $request->get('cname');
      $theChapo->chapo_value = $request->get('cvalue');
      $theChapo->save();
    }
    //redirect
    return redirect()->to('chapos/all');
  }
}
