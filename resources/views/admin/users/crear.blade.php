@extends('admin.template.main')
<!--
la ruta desde donde estamos trayendo la plantilla matriz
-->
@section('title')
    Crear
@endsection
<!-- --><!-- -->
@section('titlepanel')
<h4>Creacion de nuevo usuario</h4>
@endsection
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

<!-- Abrimos un formulario con el paquete HTML de laravel collective -->
   {!! Form::open (['route'=>'Admin.Users.store', 'method'=>'POST']) !!} 
<!--la rota donde quiero enviar los datos,  -->

<div class="form-group" align="left">
   {!! Form::label('name', 'Nombre') !!}
   {!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Nombre' ,'required']) !!}
</div>
<div class="form-group" align="left">
   {!! Form::label('email', 'Correo Electronico') !!}
   {!! Form::email('email', null, ['class'=>'form-control', 'placeholder'=>'micorreo@midominio.com' ,'required']) !!}
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
