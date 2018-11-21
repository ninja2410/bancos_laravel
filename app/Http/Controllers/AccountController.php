<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Account;
use App\Customer;
use App\Transaction;
use App\Bank;
use DB;
use \Auth, \Redirect, \Validator, \Input, \Session;

class AccountController extends Controller
{
  public function __construct(){
    $this->middleware('auth');
  }
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
    Session::flash('alert-class', 'alert-success');
    Session::flash('message', 'Se ha guardado la cuenta con éxito');
    return Redirect::to('accounts');
  }
  public function details($id){
    $Account=DB::table('accounts')
            ->join('customers', 'customers.id', '=', 'accounts.customer_id')
            ->join('banks', 'banks.id', '=', 'accounts.banks_id')
            ->where('accounts.id', $id)
            ->select('accounts.*', 'customers.name as customer', 'banks.name as bank')
            ->get();
    return view('account.details', array('Account'=>$Account));
  }
  public function update(Request $request, $id){
    $Account=Account::find($id);
    $Account->balance=$request->balance;
    $Account->description=$request->description;
    $Account->customer_id=$request->customer_id;
    $Account->banks_id=$request->banks_id;
    $Account->update();
    Session::flash('alert-class', 'alert-info');
    Session::flash('message', 'Se ha almacenado el cambio con éxito');
    return Redirect::to('accounts');
  }
  public function delete($id){
    $Account=Account::find($id);
    $Account->delete();
    return Redirect::to('accounts');
  }
  public function deposit($id){
    $account=DB::table('accounts')
            ->join('customers', 'customers.id', '=', 'accounts.customer_id')
            ->join('banks', 'banks.id', '=', 'accounts.banks_id')
            ->where('accounts.id', $id)
            ->select('accounts.*', 'customers.name as customer', 'banks.name as bank')
            ->get();
    return view('account.transactions')
    ->with('account', $account)
    ->with('type', 1);
  }
  public function retirement($id){
    $account=DB::table('accounts')
            ->join('customers', 'customers.id', '=', 'accounts.customer_id')
            ->join('banks', 'banks.id', '=', 'accounts.banks_id')
            ->where('accounts.id', $id)
            ->select('accounts.*', 'customers.name as customer', 'banks.name as bank')
            ->get();
    return view('account.transactions')
    ->with('account', $account)
    ->with('type', 0);
  }
  public function store_transaction(Request $request){
    $transaction=new Transaction();
    $account=Account::find($request->account);
    $transaction->account_id=$request->account;
    $transaction->amount=$request->amount;
    $transaction->user_id=1;
    $transaction->type=$request->type;
    $transaction->save();
    if ($request->type) {
      $account->balance+=$request->amount;
    }
    else{
      $account->balance-=$request->amount;
    }
    $account->update();
    Session::flash('alert-class', 'alert-danger');
    Session::flash('message', 'Se ha almacenado el pago correctamente');
    return Redirect::to('accounts');
  }
}
