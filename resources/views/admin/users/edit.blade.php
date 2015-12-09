@extends('admin.template.main')
<!--
la ruta desde donde estamos trayendo la plantilla matriz
-->
@section('title', 'Actualizacion ')
<!-- --><!-- -->
@section('titlepanel', 'Actualizacion de usuario '.$user -> name)
<!-- -->
@section('content')
<p align="justify">
<!-- Abrimos un formulario con el paquete HTML de laravel collective -->
   {!! Form::open (['route'=>['Admin.Users.update', $user->id], 'method'=>'PUT']) !!} 
<!--la rota donde quiero enviar los datos,  -->

<div class="form-group" align="left">
   {!! Form::label('name', 'Nombre') !!}
   {!! Form::text('name', $user->name, ['class'=>'form-control', 'placeholder'=>'Nombre' ,'required', 'autocomplete'=>'off']) !!}
</div>
<div class="form-group" align="left">
   {!! Form::label('email', 'Correo Electronico') !!}
   {!! Form::email('email', $user->email, ['class'=>'form-control', 'placeholder'=>'micorreo@midominio.com' ,'required', 'autocomplete'=>'off']) !!}
</div>
<div class="form-group" align="left">
   {!! Form::label('password', 'Contraseña') !!}
   {!! Form::password('password', ['class'=>'form-control', 'placeholder'=>'*********' ,'required']) !!}
</div>
<div class="form-group" align="center">
   {!! Form::submit('Guardar', ['class'=>'btn btn-success']) !!}
</div>


{!! Form::close() !!}
  
  </p>
@endsection
<!-- -->
