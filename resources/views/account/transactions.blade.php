@extends('layoult/default')
@section('title', 'Ver cuenta')
@section('content')
  <h3>Detalles de Cuenta</h3>
  <div class=" col-lg-12" style="text-align:right;">
    <p>Ver Transacciones</p>
    <a href="{{url('accounts/list/'.$account[0]->id)}}"> <btn class="btn btn-sm btn-info btn-icon"><i class="fa ti-exchange-vertical"></i></btn></a>
  </div>

  <br>
    <div class="col-lg-12">
      <label for="">Cliente</label>
      <input type="text" class="form-control" name="" value="{{$account[0]->customer}}">
      <label for="">Banco</label>
      <input type="text" name="" value="{{$account[0]->bank}}" class="form-control">
    </div>
    <div class="col-lg-12">
      <label for="">Descripción</label>
      <input type="text" name="" value="{{$account[0]->description}}" class="form-control">
      <label for="">Fecha de creación</label>
      <input type="text" name="" value="{{$account[0]->created_at}}" class="form-control">
    </div>
    <div class="col-lg-12">
      <label for="">Saldo</label>
      <input type="text" name="" value="Q{{number_format($account[0]->balance,2)}}" class="form-control">
    </div>
    <div class="" style="text-align:center;">
      @if ($type==1)
        <h2>Registro Depósitos</h2>
      @else
        <h2>Registro de Retiros</h2>
      @endif
      <form  action="{{url('transaction')}}" method="post">
        <input type="hidden" name="account" value="{{$account[0]->id}}">
        <input type="hidden" name="type" value="{{$type}}">
        {!! Form::token() !!}
        <div class="col-lg-12">
          <div class="col-lg-3">
          </div>
          <div class="col-lg-6">
            <label>Monto</label>
            <input type="number" class="form-control" name="amount" >
          </div>
          <div class="col-lg-3">
          </div>
        </div>
        <button type="submit" class="btn btn-success btn-fill btn-wd" >Guardar <i class="fa ti-money"></i></button>
      </form>
    </div>
@endsection
