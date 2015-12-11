@extends('admin.template.main')
<!--
la ruta desde donde estamos trayendo la plantilla matriz
-->
@section('title')
   Actualizar correo
@endsection
<!-- --><!-- -->
@section('titlepanel', 'Actualizacion de correos de '.$cliente->nombre)
<!-- -->
@section('content')
<p align="justify">
<!-- Mensajes de error del request propio -->
  @if(count($errors) > 0 )
    <ul>
      <div class="alert alert-danger" align="left">
        @foreach($errors -> all() as $error)
        <li>{{ $error }}</li>
        @endforeach
      </div>
    </ul>
  @endif

<!-- Fin de los mensajes de errores del respquet propio -->
<a href="{{ route('Admin.Addemail.create', $cliente->id)}}"  class="label label-info"><i class="glyphicon glyphicon-plus"></i> Agregar nuevo correo a {{ $cliente->nombre }}</a>
<!-- Abrimos un formulario con el paquete HTML de laravel collective -->
   {!! Form::open (['route'=>['Admin.Sender.update', $correo->id], 'method'=>'PUT']) !!} 
<!--la rota donde quiero enviar los datos,  -->
<div class="form-group" align="left">
  
  <div class="col-xs-9" align="left">
   {!! Form::label('email', 'Actualizar correo') !!}
  </div>
  
  <div align="right" class="col-xs-3">
    Registrado desde <a class="label label-warning">{!!$cliente->created_at!!}</a>
  </div>
  
   {!! Form::text('email', $correo->correo, ['class'=>'form-control', 'placeholder'=>'correo@domiino.com' ,'required', 'autocomplete'=>'off']) !!}
</div>
<div class="form-group" align="left">
   {!! Form::label('estatus', 'Estatus del correo') !!}
   {!! Form::select('estatus', array('ACTIVO' => 'ACTIVO', 'INACTIVO' => 'INACTIVO'), 
              $correo->estatus, 
              ['placeholder' => 'Seleccione un estatus para este correo...', 'required', 'class'=>'form-control']) !!}
</div>
<div class="form-group" align="center">
   {!! Form::submit('Guardar', ['class'=>'btn btn-success']) !!}
</div>
{!! Form::close() !!}  
  </p>
@endsection
<!-- -->