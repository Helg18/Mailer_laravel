     @extends('admin.template.main')
<!--
la ruta desde donde estamos trayendo la plantilla matriz
-->
@section('title')
   Correo nuevo
@endsection
<!-- --><!-- -->
@section('titlepanel', 'Correo nuevo')
<!-- -->
@section('content')
{!! Form::open (['route'=>['Admin.Addemail.store'], 'method'=>'POST']) !!} 
<!--la rota donde quiero enviar los datos,  -->

<div class="form-group" align="left">
   {!! Form::label('nombre', $cliente->id) !!} -> {!! Form::label('nombre', $cliente->nombre) !!}
</div>
<div class="form-group" align="left" hidden>
   {!! Form::text('id', $cliente->id, ['class'=>'form-control','required', 'autocomplete'=>'off'], 'disabled') !!}
</div>
<div class="form-group" align="left">
     {!! Form::label('email', 'Nuevo Email') !!}
     {!! Form::text('email', null, ['class'=>'form-control', 'placeholder'=>'correo@midominio.com' ,'required', 'autocomplete'=>'off']) !!} <br>
</div>
<div class="form-group" align="left">
   {!! Form::label('estatus', 'Estatus del correo') !!}
   {!! Form::select('estatus', array('ACTIVO' => 'ACTIVO', 'INACTIVO' => 'INACTIVO'), 
              null, 
              ['required', 'class'=>'form-control']) !!}
</div>

{!! Form::submit('Guardar', ['class'=>'btn btn-success']) !!}


{!! Form::close() !!}



@endsection
<!-- -->
