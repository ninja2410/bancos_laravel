<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Account;
use App\Customer;
use App\Bank;
use DB;
use \Auth, \Redirect, \Validator, \Input, \Session;

class AccountController extends Controller
{
  public function index(){
    $Accounts=Account::all();
    $Accounts=DB::table('accounts')
            ->join('customers', 'customers.id', '=', 'accounts.customer_id')
            ->join('banks', 'banks.id', '=', 'accounts.banks_id')
            ->select('accounts.*', 'customers.name as customer', 'banks.name as bank')
            ->get();
    return view('account.index', ['Accounts'=>$Accounts]);
  }
  public function create(){
    $customers=Customer::pluck('name', 'id');
    $banks=Bank::pluck('name', 'id');
    return view('account.create')
    ->with('customers', $customers)
    ->with('banks', $banks);
  }
  public function save(Request $request){
    $new=new Account();
    $new->balance=$request->balance;
    $new->description=$request->description;
    $new->customer_id=$request->customer_id;
    $new->banks_id=$request->banks_id;
    $new->save();
    return Redirect::to('accounts');
  }
  public function edit($id){
    $Account=Account::find($id);
    return view('account.edit', array('Account'=>$Account));
  }
  public function update(Request $request, $id){
    $Account=Account::find($id);
    $Account->balance=$request->balance;
    $Account->description=$request->description;
    $Account->customer_id=$request->customer_id;
    $Account->banks_id=$request->banks_id;
    $Account->update();
    return Redirect::to('accounts');
  }
  public function delete($id){
    $Account=Account::find($id);
    $Account->delete();
    return Redirect::to('accounts');
  }
}
