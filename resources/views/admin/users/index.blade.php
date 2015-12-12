@extends('admin.template.main')
<!--
la ruta desde donde estamos trayendo la plantilla matriz
-->
@section('title')
  @if(Auth::user()->perfil=='root')
      Listado
  @else
    Denegado
  @endif
@endsection
<!-- --><!-- -->


@section('titlepanel')
@if(Auth::user()->perfil=='root')
<h4>Listado de usuarios</h4>
@else
    <h4>Denegado</h4>
@endif
@endsection
<!-- -->
@section('content')
  @if(Auth::user()->perfil=='root')
    <div class="container-fluid">
      <div class="row">
        <div align="left">
          <a href="{{ route('Admin.Users.create') }}" class="label label-info"><i class="glyphicon glyphicon-plus"></i> Nuevo Usuario</a>
        </div>
        <table class="table table-striped table-hover table-condensed">
          <thead>
            <tr>
              <th>ID</th>
              <th>Nombre</th>
              <th>Correo</th>
              <th>Opciones</th>
            </tr>
          </thead>
          <tbody>
            @foreach($users as $user)
              <tr>
                <td width="5%">{{ $user -> id }}</td>
                <td width="50%">{{ $user -> name }}</td>
                <td width="30%">{{ $user -> email }}</td>
                <td width="15%">
                  <a href="" class="label label-success"><i class="glyphicon glyphicon-user"></i></a> | 
                  <a href="{{ route('Admin.Users.edit', $user->id) }}" class="label label-warning"><i class="glyphicon glyphicon-pencil"></i></a> | 
                  <a href="{{ route('Admin.Users.destroy', $user->id) }}" class="label label-danger" onclick="return confirm('Seguro que deseas eliminar a este usuario?')"><i class="glyphicon glyphicon-remove"></i></a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
        {!! $users -> render()!!}
      </div>
    </div>
  @else
  Estoy en el index
  {{  
    view('denegado')
  }}
  @endif
@endsection
<!-- -->
