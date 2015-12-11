@extends('admin.template.main')
<!--
la ruta desde donde estamos trayendo la plantilla matriz
-->
@section('title')
    Listado de correos
@endsection
<!-- --><!-- -->
@section('titlepanel')
<h4>Listado de Correos</h4>
@endsection
<!-- -->
@section('content')
<div class="container-fluid">
  <div class="row">
    <table class="table table-striped table-hover table-condensed">
      <thead>
          
              <div class="input-group">
                <input type="text" class="form-control" placeholder="Buscar correo..." autocomplete="off">
                <span class="input-group-btn">
                  <button class="btn btn-default" type="button">Buscar!</button>
                </span>
              </div><!-- /input-group -->
          
        <tr>
          <th>Correo</th>
          <th>Estatus</th>
          <th>Registrado desde</th>
          <th>Opciones</th>
        </tr>
      </thead>
      <tbody>
    @foreach ($Correos as $correos)
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
        <a href="{{ route('Admin.Sender.edit', $correos->id )}}" class="label label-warning"><i class="glyphicon glyphicon-pencil"></i></a>&nbsp;&nbsp;|&nbsp;
        <a href="{{ route('Admin.Addemail.destroy', $correos->id) }}" class="label label-danger" onclick="return confirm('Seguro que deseas eliminar a este usuario?')"><i class="glyphicon glyphicon-remove"></i></a>
            
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
    {!! $Correos -> render()!!}
  </div>
</div>
@endsection
<!-- -->
