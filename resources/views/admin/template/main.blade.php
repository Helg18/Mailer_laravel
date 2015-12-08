<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>@yield('title', 'Default') | Panel de administrador</title>
	<link rel="stylesheet" href="{{ asset('plugins/bootstrap/css/bootstrap.css') }}">
</head>
<body background="https://encrypted-tbn2.gstatic.com/images?q=tbn:ANd9GcQoMtgs25-vXRgh6bTtxdPdI5SJEuvEq_REun7Vs6SLr5LNH_b2">
<div class="container" width="80%">
	<div class="row-fluid">
		<div class="span12">
			@include('admin.template.partials.nav')
			<div align='center'>
				
				<!-- Inicio del panel -->
				<div class="panel panel-info">
  				<div class="panel-heading">
  				  <h3 class="panel-title">@yield('titlepanel', 'Default')</h3>
 					</div>
  				<div class="panel-body">
   					 <section>
							  @include('flash::message')
								@yield('content')
							</section>
 					</div>
				</div><!-- Fin de panel -->
				
			</div>
		</div>
	</div>
	
	@include('admin.template.partials.footer')
	</div>	
<script type="text/javascript" src="{{ asset('plugins/jquery/jquery.js') }}"></script>
<script type="text/javascript" src="{{ asset('plugins/bootstrap/js/bootstrap.js') }}"></script>
</body>
</html>	