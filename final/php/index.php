<?php

?>

<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<script type="text/javascript" src="../js/jquery.js"></script>
	<script type="text/javascript" src="../js/moment.js"></script>
	<script type="text/javascript" src="../js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../js/typeahead.min.js"></script>
	<script type="text/javascript" src="../js/bootstrap-datepicker.js"></script>
	<script type="text/javascript" src="../js/bootstrap-datepicker.es.js"></script>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap-theme.min.css">
	<link rel="stylesheet" type="text/css" href="../css/typeaheadjs.css">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	
	<link rel="stylesheet" type="text/css" href="../css/datepicker3.css">
	<link href='http://fonts.googleapis.com/css?family=Roboto:700,500italic,300' rel='stylesheet' type='text/css'>
	
	
	
	
	<title>Busqueda</title>
</head>
<body id="menuBusqueda">

	<nav class="navbar navbar-inverse" role="navigation">

		<ul  class="nav navbar-nav">
		
				
			
			<li><img id=""  alt="logoUNLAM" src="../imagenes/AeroUNLaM_gradient.png" ></li>
			

			
		</ul>
		<ul class="nav navbar-nav logo "><li class="logo">
				<form class="navbar-form navbar-left" action="resultadoReserva.php" method="post" role="search">
					<input name="numReserva">
					<button class="btn btn-info" type="submit" NAME="buscarPasaje" >busque su pasaje</button>
				</form>
			</li></ul>
<div class=" logo" ></div>	

	</nav>



	<div class="well login-box">
		<form id="busquedaVuelos" action="vuelos.php" method="post" role="search">
			<legend>B&uacute;squeda de vuelos</legend>
			<div  id="the-basics" >
			<div class="form-group" id="origenError">
				<label for="username-email">Ingrese su ciudad</label>
				<input type="text"  id="origen" class=" typeahead form-control " name="origen" placeholder="origen">
				<span id="iconoOrigenError" class="glyphicon glyphicon-remove form-control-feedback invisible"></span>
			</div>
			<div class="form-group" id="destinoError">
				<label for="password">Ingrese la ciudad de destino</label>
				<input type="text"  id="destino" class=" typeahead form-control " name="destino" placeholder="destino">
				<span id="iconoDestinoError" class="glyphicon glyphicon-remove form-control-feedback invisible"></span>
			</div>
			</div>
			<label for="password">Selecione la fecha de vuelo </label>
			<div class="input-group date" id="calendarioError">				
				<input id="calendario" type="text" class="form-control" name="dias" readonly>
				<span class="  input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
			</div>
			<div class="form-group text-center">
				
				<input type="submit"  class=" col-md-12 btn btn-info btn-login-submit"   />
				<input type="hidden" id="botonBusqueda"  NAME="buscarDia" value="Buscar" />
			</div>
		</form>
	</div>
	<div class="logged-in well">
		<h1>Buscando vuelos!  <div class="pull-right"></div></h1>
	</div>


	



	<footer class="bs-docs-footer col-md-12" role="contentinfo">
		<p>Universidad Nacional de La Matanza</p>
		<p> Programacion Web 2 - Trabajo Practico Final</p>
		<p>Metallo, M. / Rabuñal, J. / Sanchez, M. / Tula, L.</p>
		<p>2C 2014</p>
	</footer>
	<!-- typeahead y calendario  -->
	


	<script src="../js/script.js"></script>
</body>
</html>