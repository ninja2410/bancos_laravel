<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use \Auth, \Redirect, \Validator, \Input, \Session;

class CustomerController extends Controller
{
  public function index(){
    $customers=Customer::all();
    return view('customer.index', ['customers'=>$customers]);
  }
  public function create(){
    return view('customer.create');
  }
  public function save(Request $request){
    $new=new Customer();
    $new->name=$request->name;
    $new->phone=$request->phone;
    $new->email=$request->email;
    $new->dpi=$request->dpi;
    $new->birthday=$request->birthdate;
    $new->address=$request->address;
    $new->save();
    return Redirect::to('customers');
  }
  public function edit($id){
    $customer=Customer::find($id);
    return view('customer.edit', array('customer'=>$customer));
  }
  public function update(Request $request, $id){
    $customer=Customer::find($id);
    $customer->name=$request->name;
    $customer->phone=$request->phone;
    $customer->email=$request->email;
    $customer->dpi=$request->dpi;
    $customer->birthday=$request->birthdate;
    $customer->address=$request->address;
    $customer->update();
    return Redirect::to('customers');
  }
  public function delete($id){
    $customer=Customer::find($id);
    $customer->delete();
    return Redirect::to('customers');
  }
}
