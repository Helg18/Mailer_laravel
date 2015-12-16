@extends('admin.template.main')
<!--
la ruta desde donde estamos trayendo la plantilla matriz
-->
@section('title', 'Denegado')
<!-- -->
@section('titlepanel')
<h4>No tiene privilegios para entrar en este modulo. </h4>
@endsection


@section('content')
<h1 class="alert alert-warning" align="center">Opciones Disponibles</h1>
<p>
  @if(Auth::user())
    <table class="table table-hover table-striped table-condensed "> 	
    <tr align="center">
    	<td width="25%" align="center"><a class="btn btn-primary" href="{{ route('Admin.Clients.index') }}" >Mis Clientes</a></td>
      <td width="25%" align="center"><a class="btn btn-warning" href="{{ route('Admin.Sender.listarcorreos') }}" >Correos</a></td>
    	<td width="25%" align="center"><a class="btn btn-danger" href="{{ route('Admin.Sender.index') }}" >Bombardear</a></td>
    </tr>
    </table>
  @else
    <div class="group-form" align="center">
      <a class="btn btn-primary" href="{{ route('Admin.Auth.login') }}" >Iniciar sesion</a>
    </div>
  @endif
</p>
@endsection
