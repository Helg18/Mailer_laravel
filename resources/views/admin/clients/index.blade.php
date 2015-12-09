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
          <th>ID</th>
          <th>Nombre</th>
          <th>Cliente desde</th>
          <th>Opciones</th>
        </tr>
      </thead>
      <tbody>
        @foreach($clientes as $cliente)
          <tr>
            <td width="5%">{{ $cliente -> id }}</td>
            <td width="65%">{{ $cliente -> nombre }}</td>
            <td width="15%">{{ $cliente -> created_at }}</td>
            <td width="15%">
              
              
                   
       <!-- Button trigger modal -->
<button class="label label-primary" data-toggle="modal" data-target="#myModal">
  <font>&#64;</font>
</button> | 

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Agregar correo</h4>
      </div>
      <div class="modal-body">
       
        {!! Form::open (['route'=>'Admin.Addemail.store', 'method'=>'POST']) !!} 
<!--la rota donde quiero enviar los datos,  -->
<div class="form-group" align="left" hidden>
   {!! Form::label('text', 'Nuevo correo') !!}
   {!! Form::text('cliente', $cliente -> id, ['class'=>'form-control', 'placeholder'=>'Mi cliente, C.A.', 'required', 'autocomplete'=>'off', 'visible'=>'false']) !!}
</div>
<div class="form-group" align="left" >
   {!! Form::label('email', 'Nuevo correo') !!}
   {!! Form::email('correonuevo', null, ['class'=>'form-control', 'placeholder'=>'correo@dominio.com' ,'required', 'autocomplete'=>'off']) !!}
</div>

        
      </div>
      <div class="modal-footer">
       <div class="form-group" align="center">
        {!! Form::submit('Guardar', ['class'=>'btn btn-success']) !!}
       </div>
        {!! Form::close() !!}       
       </div>
    </div>
  </div>
</div>
       
       
                    
              
              <a href="{{ route('Admin.Addemail.show', $cliente->id) }}" class="label label-success"><i class="glyphicon glyphicon-plus"></i></a> | 
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