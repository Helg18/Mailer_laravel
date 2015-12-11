@extends('admin.template.main')
<!--
la ruta desde donde estamos trayendo la plantilla matriz
-->
@section('title')
  Bombardear
@endsection
<!-- --><!-- -->
@section('titlepanel')
<h4>Envio de correos</h4>
@endsection
<!-- -->
@section('content')
<div class="container-fluid">
  <div class="row">
    {!! Form::open (['route'=>'Admin.Sender.store', 'method'=>'POST']) !!}
    <div class="form-group" align="left">
    {!! Form::label('asunto', 'Asunto:') !!}
    {!! Form::text('asunto', null, ['class'=>'form-control', 'placeholder'=>'Asunto del correo' ,'required', 'autocomplete'=>'off']) !!}
    </div>
    <div class="form-group" align="left">
    {!! Form::label('Cuerpo del email') !!}
    {!! Form::textarea('cuerpo', null,
    ['placeholder'=>'Escriba aqui su mensaje',
     'class'=>'form-control', 'required'
    ])!!} 
    </div>
    {!! Form::submit('Enviar', ['class'=>'btn btn-success']) !!}
    {!! Form::close() !!}
  </div>
</div>
@endsection
<!-- -->
