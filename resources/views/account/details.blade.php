@extends('layoult/default')
@section('title', 'Ver cuenta')
@section('content')
  <h3>Detalles de Cuenta</h3>
  <div class=" col-lg-12" style="text-align:right;">
    <p>Ver Transacciones</p>
    <a href="{{url('transactions/list/'.$Account[0]->id)}}"> <btn class="btn btn-sm btn-info btn-icon"><i class="fa ti-exchange-vertical"></i></btn></a>
  </div>

  <br>
    <div class="col-lg-12">
      <label for="">Cliente</label>
      <input type="text" class="form-control" name="" value="{{$Account[0]->customer}}">
      <label for="">Banco</label>
      <input type="text" name="" value="{{$Account[0]->bank}}" class="form-control">
    </div>
    <div class="col-lg-12">
      <label for="">Descripción</label>
      <input type="text" name="" value="{{$Account[0]->description}}" class="form-control">
      <label for="">Fecha de creación</label>
      <input type="text" name="" value="{{$Account[0]->created_at}}" class="form-control">
    </div>
    <div class="col-lg-12">
      <label for="">Saldo</label>
      <input type="text" name="" value="Q{{number_format($Account[0]->balance,2)}}" class="form-control">
    </div>
    <div style="text-align:center">
      <a href="{{url('deposits/'.$Account[0]->id)}}"><button type="button" class="btn btn-success btn-fill btn-wd" name="button">Depositar <i class="fa ti-money"></i></button></a>
      <a href="{{url('retirement/'.$Account[0]->id)}}"><button type="button" class="btn btn-warning btn-fill btn-wd" name="button">Retirar <i class="fa ti-download"></i></button></a>
      <a href="{{url('accounts')}}"><button type="button" class="btn btn-danger btn-fill btn-wd" name="button">Cancelar <i class="fa ti-close"></i></button></a>
      <br>
    </div>



@endsection
