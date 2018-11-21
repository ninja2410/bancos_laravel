@extends('layoult/default')
@section('title', 'Cuentas')
@section('content')
<div class="col-lg-12">
  <h2>Listado de Cuentas</h2>
  <hr>
  @if (Session::has('message'))
					<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
					@endif
    <a href="{{url('accounts/create')}}"><button type="button" class="btn btn-info btn-fill btn-wd" name="button">Nueva Cuenta</button></a>
  <div class="content table-responsive table-full-width">
      <table class="table table-striped">
          <thead>
            <th>ID</th>
            <th>Descripcion</th>
            <th>Cliente</th>
            <th>Banco</th>
            <th>Saldo</th>
            <th>Acciones</th>
          </thead>
          <tbody>
            @foreach ($Accounts as $Account)
              <tr>
                <td>{{$Account->id}}</td>
                <td>{{$Account->description}}</td>
                <td>{{$Account->customer}}</td>
                <td>{{$Account->bank}}</td>
                <td>Q{{number_format($Account->balance,2)}}</td>
                <td>
                  <div class="col-xs-3 text-right">
                    <a href="{{url('accounts/details/'.$Account->id)}}"> <btn class="btn btn-sm btn-success btn-icon"><i class="fa ti-zoom-in"></i></btn></a>
                  </div>
                  <div class="col-xs-3 text-right">
                    <a href="{{url('accounts/delete/'. $Account->id)}}"><btn class="btn btn-sm btn-danger btn-icon"><i class="fa ti-na"></i></btn></a>
                  </div>
                </td>
              </tr>
            @endforeach
          </tbody>
      </table>
  </div>
</div>
@endsection
