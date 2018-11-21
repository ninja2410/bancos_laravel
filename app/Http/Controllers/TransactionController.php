<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;
use \Auth, \Redirect, \Validator, \Input, \Session;

class TransactionController extends Controller
{
  public function __construct(){
    $this->middleware('auth');
  }
    public function index($account){
      $transactions=Transaction::where('account_id', $account)->get();
      return view('account.historial')
      ->with('transactions', $transactions);
    }
}
