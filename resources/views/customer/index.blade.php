@extends('layoult/default')
@section('title', 'Clientes')
@section('content')
<div class="col-lg-12">
  <h2>Listado de clientes</h2>
  <hr>
    <a href="{{url('customers/create')}}"><button type="button" class="btn btn-info btn-fill btn-wd" name="button">Nuevo Cliente</button></a>
  <div class="content table-responsive table-full-width">
      <table class="table table-striped">
          <thead>
            <th>ID</th>
            <th>Nombre</th>
            <th>Teléfono</th>
            <th>Email</th>
            <th>DPI</th>
            <th>Dirección</th>
            <th>Acciones</th>
          </thead>
          <tbody>
            @foreach ($customers as $customer)
              <tr>
                <td>{{$customer->id}}</td>
                <td>{{$customer->name}}</td>
                <td>{{$customer->phone}}</td>
                <td>{{$customer->email}}</td>
                <td>{{$customer->dpi}}</td>
                <td>{{$customer->address}}</td>
                <td>
                  <div class="col-xs-3 text-right">
                    <a href="{{url('customers/edit/'.$customer->id)}}"> <btn class="btn btn-sm btn-success btn-icon"><i class="fa ti-pencil"></i></btn></a>
                  </div>
                  <div class="col-xs-3 text-right">
                    <a href="{{url('customers/delete/'. $customer->id)}}"><btn class="btn btn-sm btn-danger btn-icon"><i class="fa ti-na"></i></btn></a> 
                  </div>
                </td>
              </tr>
            @endforeach
          </tbody>
      </table>
  </div>
</div>
@endsection
