@extends('layoult/default')
@section('title', 'Agregar Clientes')
@section('content')
  <h3>Crear Cuenta</h3>
  <br>
  <div class="col-lg-12">
    {!! Form::open(array('url'=>'accounts/save')) !!}
    {!! Form::label('description', 'Descripcion') !!}
    {!! Form::text('description',Input::old('description'), array('class'=>'form-control border-input', 'required')) !!}

    {!! Form::label('saldo', 'Saldo de cuenta') !!}
    {!! Form::text('balance',Input::old('balance'), array('class'=>'form-control border-input', 'required')) !!}

    {!! Form::label('customer', 'Seleccione cliente') !!}
    {!! Form::select('customer_id',$customers,null, array('class'=>'form-control border-input', 'required')) !!}

    {!! Form::label('bank', 'Seleccione banco') !!}
    {!! Form::select('banks_id',$banks,null, array('class'=>'form-control border-input', 'required')) !!}
    <div class="" style="text-align:center;">
      <button type="submit" class="btn btn-success btn-fill btn-wd" name="button">Guardar</button>
      {!! Form::close() !!}
      <a href="{{url('accounts')}}"><button type="button" class="btn btn-danger btn-fill btn-wd" name="button">Cancelar</button></a>
    </div>

  </div>

@endsection
