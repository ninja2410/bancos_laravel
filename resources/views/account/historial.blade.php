@extends('layoult/default')
@section('title', 'Agregar Clientes')
@section('content')
  <h2>Historial de Pagos</h2>
  <table class="table table-striped">
    <thead>
      <th>Fecha</th>
      <th>Monto</th>
      <th>Movimiento</th>
    </thead>
    <tbody>
      @foreach ($transactions as $t)
        <tr>
          <td>{{date('d/m/Y', strtotime($t->created_at))}}</td>
          <td>{{number_format($t->amount)}}</td>
          @if ($t->type)
            <td style="color:green;">Depósito <i class="fa ti-arrow-up"></td>
          @else
            <td style="color:red;">Retiro <i class="fa ti-arrow-down"></td>
          @endif
        </tr>
      @endforeach
    </tbody>
  </table>
  <a href="{{url('accounts')}}"><button type="button" class="btn btn-danger btn-fill btn-wd" name="button">Cancelar <i class="fa ti-close"></i></button></a>
@endsection
