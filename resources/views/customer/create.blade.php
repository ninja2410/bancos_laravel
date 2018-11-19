@extends('layoult/default')
@section('title', 'Agregar Clientes')
@section('content')
  <h3>Crear Cliente</h3>
  <br>
  <div class="col-lg-12">
    {!! Form::open(array('url'=>'customers/save')) !!}
    {!! Form::label('name', 'Nombre completo') !!}
    {!! Form::text('name',Input::old('name'), array('class'=>'form-control border-input', 'required')) !!}

    {!! Form::label('phone', 'Teléfono') !!}
    {!! Form::text('phone',Input::old('phone'), array('class'=>'form-control border-input', 'required')) !!}

    {!! Form::label('email', 'Correo Electrónico') !!}
    {!! Form::text('email',Input::old('email'), array('class'=>'form-control border-input', 'required')) !!}

    {!! Form::label('dpi', 'DPI') !!}
    {!! Form::text('dpi',Input::old('dpi'), array('class'=>'form-control border-input', 'required')) !!}

    {!! Form::label('cumpleaños', 'Fecha nacimiento') !!}
    {!! Form::date('birthdate',Input::old('birthdate'), array('class'=>'form-control border-input', 'required')) !!}

    {!! Form::label('address', 'Dirección') !!}
    {!! Form::text('address',Input::old('address'), array('class'=>'form-control', 'required')) !!}
    <div class="" style="text-align:center;">
      <button type="submit" class="btn btn-success btn-fill btn-wd" name="button">Guardar</button>
      {!! Form::close() !!}
      <a href="{{url('customers')}}"><button type="button" class="btn btn-danger btn-fill btn-wd" name="button">Cancelar</button></a>
    </div>

  </div>

@endsection
