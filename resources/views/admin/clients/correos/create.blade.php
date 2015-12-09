
@extends('admin.template.main')
<!--
la ruta desde donde estamos trayendo la plantilla matriz
-->
@section('title')
    Cliente
@endsection
<!-- --><!-- -->
@section('titlepanel')
<h4>Creacion de nuevo cliente</h4>
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
   {!! Form::open (['route'=>'Admin.Addemail.store', 'method'=>'POST']) !!} 
<!--la rota donde quiero enviar los datos,  -->

<div class="form-group" align="left">
   {!! Form::label('email', 'Nuevo orreo') !!}
   {!! Form::email('email', null, ['class'=>'form-control', 'placeholder'=>'correo@dominio.com' ,'required', 'autocomplete'=>'off']) !!}
</div>
<div class="form-group" align="center">
   {!! Form::submit('Guardar', ['class'=>'btn btn-success']) !!}
</div>


{!! Form::close() !!}
  
  </p>
@endsection
<!-- -->