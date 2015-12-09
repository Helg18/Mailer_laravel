@extends('admin.template.main')
@section('title')
    Correos
@endsection
<!-- --><!-- -->
@section('titlepanel')
<h4>Correos del clientes {{ $clientes ->nombre }}</h4>
@endsection

@section('content')
<div class="container-fluid">
  <div class="row">
    <table class="table table-striped table-hover table-condensed">
  <thead>
   <tr>
    <th>#</th>
    <th>Correo</th>
    <th>Estado</th>
    <th>Fecha registro</th>
    <th>Opciones</th>
   </tr>
  </thead>
  <tbody><div hidden>{{ $count =0 }}</div>
@foreach($correos as $correo)
    <tr>
     <td width="10%">{!! $count=$count+1 !!}</td>
     <td width="60%">{{ $correo -> correo }}</td>
     <td width="15%">{{ $correo -> estatus }}</td>
     <td width="10%">{!! $correo -> created_at !!}</td>
     <td width="15%">
      <a href="{{ route('Admin.Addemail.edit', $correo->id) }}" class="label label-warning"><i class="glyphicon glyphicon-pencil"></i></a> | 
      <a href="" class="label label-danger"><i class="glyphicon glyphicon-remove"></i></a>
     </td>
    </tr>
@endforeach
  </tbody>
</table>
  </div>
</div>
@endsection