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
<a href="{{ route('Admin.Addemail.create', $cliente->id)}}"  class="label label-info"><i class="glyphicon glyphicon-plus"></i> Agregar nuevo correo</a>
<!-- Abrimos un formulario con el paquete HTML de laravel collective -->
   {!! Form::open (['route'=>['Admin.Clients.update', $cliente->id], 'method'=>'PUT']) !!} 
<!--la rota donde quiero enviar los datos,  -->
 <div class="form-group" align="left">
  <div class="col-xs-9" align="left">
   {!! Form::label('nombre', 'Nombre del cliente') !!} 
  </div>
  
  <div align="right" class="col-xs-3">
    Registrado desde <a class="label label-warning">{!!$cliente->created_at!!}</a>
   </div>
   
   {!! Form::text('nombre', $cliente->nombre, ['class'=>'form-control', 'placeholder'=>'Nombre' ,'required', 'autocomplete'=>'off']) !!}
 </div>

<div class="form-group" align="left">
   {!! Form::label('estatus', 'Estatus del correo') !!}
   {!! Form::select('estatus', array('ACTIVO' => 'ACTIVO', 'INACTIVO' => 'INACTIVO'), 
              $cliente->estatus, 
              ['required', 'class'=>'form-control']) !!}
  
</div>
<div class="form-group" align="center">
   {!! Form::submit('Guardar', ['class'=>'btn btn-success']) !!}
   {!! Form::close() !!}  
</div>
<table class="table table-striped table-hover table-condensed">
      <thead>
        <tr>
          <th>Correo</th>
          <th>Estatus</th>
          <th>Registrado desde</th>
          <th>Opciones</th>
        </tr>
      </thead>
      <tbody>
    @foreach ($correo as $correos)
    <tr>
      <td width="65%">{!! Form::label('email', $correos->correo) !!}</td>
      <td width="10%">
             @if ( $correos -> estatus == 'ACTIVO' )
              <span class="label label-primary">
                {{ $correos->estatus }}
              </span>
              @else
               <span class="label label-danger">
                {{ $correos->estatus }}
               </span>
              @endif
            </td>
      <td width="15%">{{ $correos -> created_at }}</td>
      <td width="10%">
        <a href="{{ route('Admin.Addemail.edit', $correos->id )}}" class="label label-warning"><i class="glyphicon glyphicon-pencil"></i></a>&nbsp;&nbsp;|&nbsp;
        <a href="{{ route('Admin.Addemail.destroy', $correos->id) }}" class="label label-danger" onclick="return confirm('Seguro que deseas eliminar a este usuario?')"><i class="glyphicon glyphicon-remove"></i></a>
            
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
  </p>
@endsection
<!-- -->