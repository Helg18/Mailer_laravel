@extends('admin.template.main')
<!--
la ruta desde donde estamos trayendo la plantilla matriz
-->
@section('title', 'Login')
<!-- -->
@section('titlepanel')
<h4>Inicio de sesion</h4>
@endsection
@section('content')
{!! Form::open(['route'=>'Admin.Auth.login', 'method'=>'POST']) !!}
<div class="form-group">
  {!! Form::label('email', 'Correo Electronio') !!}
  {!! Form::text('email', null, ['class'=>'form-control', 'required', 'autocomplete'=>'off', 'placeholder'=>'correo@dominio.com']) !!}
</div>
<div class="form-group">
  {!! Form::label('pass', 'Contraseña') !!}
  {!! Form::password('password', ['class'=>'form-control', 'required', 'autocomplete'=>'off', 'placeholder'=>'***********']) !!}
</div>
<div class="form-group">
  {!! Form::submit('Acceder', ['class'=>'btn btn-primary']) !!}
</div>
{!! Form::close() !!}
@endsection
