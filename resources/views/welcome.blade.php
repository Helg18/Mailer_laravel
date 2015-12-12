@extends('admin.template.main')
<!--
la ruta desde donde estamos trayendo la plantilla matriz
-->
@section('title', 'Inicio')
<!-- -->
@section('titlepanel')
<h4>Menu Pricipal</h4>
@endsection


@section('content')
@if(Auth::user())
<h1 class="alert alert-warning" align="center">Opciones Disponibles</h1>
<p>
  <table class="table table-hover table-striped table-condensed "> 	
  <tr align="center">
  @if(Auth::user()->perfil == 'root')
  	<td width="25%" align="center"><a class="btn btn-info" href="{{ route('Admin.Users.index') }}" >Usuario</a></td>
  @endif
  	<td width="25%" align="center"><a class="btn btn-primary" href="{{ route('Admin.Clients.index') }}" >Clientes</a></td>
    <td width="25%" align="center"><a class="btn btn-warning" href="{{ route('Admin.Sender.listarcorreos') }}" >Correos</a></td>
  	<td width="25%" align="center"><a class="btn btn-danger" href="{{ route('Admin.Sender.index') }}" >Bombardear</a></td>
  </tr>
  </table>
</p>
@else
<div class="group-form" align="center">
  <a class="btn btn-primary" href="{{ route('Admin.Auth.login') }}" >Iniciar sesion</a>
</div>
@endif

@endsection
