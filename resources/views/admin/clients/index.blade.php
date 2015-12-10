@extends('admin.template.main')
<!--
la ruta desde donde estamos trayendo la plantilla matriz
-->
@section('title')
    Clientes
@endsection
<!-- --><!-- -->
@section('titlepanel')
<h4>Listado de clientes</h4>
@endsection
<!-- -->
@section('content')
<div class="container-fluid">
  <div class="row">
    <div align="left">
      <a href="{{ route('Admin.Clients.create') }}" class="label label-info"><i class="glyphicon glyphicon-plus"></i> Nuevo Cliente</a>
    </div>
    <table class="table table-striped table-hover table-condensed">
      <thead>
        <tr>
          <th><div align="center">ID</div></th>
          <th><div align="center">@</div></th>
          <th>Nombre</th>
          <th>Estatus</th>
          <th>Cliente desde</th>
          <th>Opciones</th>
        </tr>
      </thead>
      <tbody>
        @foreach($clientes as $cliente)
          <tr>
            <td width="5%" align="center">{{ $cliente -> id }}</td>
            <td width="5%" align="center"><span class="badge">42</span></td>
            <td width="55%">{{ $cliente -> nombre }}</td>
            <td width="10%" align="center">
             @if ( $cliente -> estatus == 'ACTIVO' )
              <span class="label label-primary">
                {{ $cliente->estatus }}
              </span>
              @else
               <span class="label label-danger">
                {{ $cliente->estatus }}
               </span>
              @endif
            </td>
            <td width="13%" align="center">{{ $cliente -> created_at }}</td>
            <td width="10%" align="center">
              <a href="{{ route('Admin.Addemail.create', $cliente->id )}}" class="label label-success"><i class="glyphicon glyphicon-plus"></i></a> | 
              <a href="{{ route('Admin.Clients.edit', $cliente->id )}}" class="label label-warning"><i class="glyphicon glyphicon-pencil"></i></a> | 
              <a href="{{ route('Admin.Clients.destroy', $cliente->id) }}" class="label label-danger" onclick="return confirm('Seguro que deseas eliminar a este usuario?')"><i class="glyphicon glyphicon-remove"></i></a>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
    {!! $clientes -> render()  !!}
  </div>
</div>
@endsection