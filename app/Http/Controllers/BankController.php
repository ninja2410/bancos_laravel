<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bank;
use \Auth, \Redirect, \Validator, \Input, \Session;

class BankController extends Controller
{
  public function index(){
    $Banks=Bank::all();
    return view('bank.index', ['Banks'=>$Banks]);
  }
  public function create(){
    return view('bank.create');
  }
  public function save(Request $request){
    $new=new Bank();
    $new->name=$request->name;
    $new->phone=$request->phone;
    $new->email=$request->email;
    $new->address=$request->address;
    $new->save();
    return Redirect::to('banks');
  }
  public function edit($id){
    $Bank=Bank::find($id);
    return view('bank.edit', array('Bank'=>$Bank));
  }
  public function update(Request $request, $id){
    $Bank=Bank::find($id);
    $Bank->name=$request->name;
    $Bank->phone=$request->phone;
    $Bank->email=$request->email;
    $Bank->address=$request->address;
    $Bank->update();
    return Redirect::to('banks');
  }
  public function delete($id){
    $Bank=Bank::find($id);
    $Bank->delete();
    return Redirect::to('banks');
  }
}
