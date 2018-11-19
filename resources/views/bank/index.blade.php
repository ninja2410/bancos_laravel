@extends('layoult/default')
@section('title', 'Bancos')
@section('content')
<div class="col-lg-12">
  <h2>Listado de Bancos</h2>
  <hr>
    <a href="{{url('banks/create')}}"><button type="button" class="btn btn-info btn-fill btn-wd" name="button">Nuevo Banco</button></a>
  <div class="content table-responsive table-full-width">
      <table class="table table-striped">
          <thead>
            <th>ID</th>
            <th>Nombre</th>
            <th>Teléfono</th>
            <th>Email</th>
            <th>Dirección</th>
            <th>Acciones</th>
          </thead>
          <tbody>
            @foreach ($Banks as $Bank)
              <tr>
                <td>{{$Bank->id}}</td>
                <td>{{$Bank->name}}</td>
                <td>{{$Bank->phone}}</td>
                <td>{{$Bank->email}}</td>
                <td>{{$Bank->address}}</td>
                <td>
                  <div class="col-xs-3 text-right">
                    <a href="{{url('banks/edit/'.$Bank->id)}}"> <btn class="btn btn-sm btn-success btn-icon"><i class="fa ti-pencil"></i></btn></a>
                  </div>
                  <div class="col-xs-3 text-right">
                    <a href="{{url('banks/delete/'. $Bank->id)}}"><btn class="btn btn-sm btn-danger btn-icon"><i class="fa ti-na"></i></btn></a>
                  </div>
                </td>
              </tr>
            @endforeach
          </tbody>
      </table>
  </div>
</div>
@endsection
