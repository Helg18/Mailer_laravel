@extends('admin.template.main')
<!--
la ruta desde donde estamos trayendo la plantilla matriz
-->
@section('title')
   Actualizar Cliente
@endsection
<!-- --><!-- -->
@section('titlepanel', 'Actualizacion de cliente '.$cliente -> nombre)
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
<a href="{{ route('Admin.Addemail.create', $cliente->id)}}">Agregar nuevo correo</a>
<!-- Abrimos un formulario con el paquete HTML de laravel collective -->
   {!! Form::open (['route'=>['Admin.Clients.update', $cliente->id], 'method'=>'PUT']) !!} 
<!--la rota donde quiero enviar los datos,  -->
<div class="form-group" align="left">
   {!! Form::label('nombre', 'Nombre del cliente') !!}
   {!! Form::text('nombre', $cliente->nombre, ['class'=>'form-control', 'placeholder'=>'Nombre' ,'required', 'autocomplete'=>'off']) !!}
</div>
<div class="form-group" align="center">
   {!! Form::submit('Guardar', ['class'=>'btn btn-success']) !!}
</div>
{!! Form::close() !!}  
<table class="table table-striped table-hover table-condensed">
  <thead>
    <th>Correos</th>
    <th>Opciones</th>
  </thead>
  <tbody>
    @foreach ($correo as $correos)
    <tr>
      <td width="92%">{!! Form::text('email', $correos->correo, ['class'=>'form-control', 'placeholder'=>'correo@midominio.com' ,'required', 'autocomplete'=>'off', 'disabled']) !!}</td>
      <td width="8%">
        <a href="{{ route('Admin.Addemail.edit', $correos->id )}}" class="label label-warning"><i class="glyphicon glyphicon-pencil"></i></a>&nbsp;&nbsp;|&nbsp;
        <a href="" class="label label-danger" onclick="return confirm('Seguro que deseas eliminar a este usuario?')"><i class="glyphicon glyphicon-remove"></i></a>
            
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
  </p>
@endsection
<!-- -->