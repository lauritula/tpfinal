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
	
	<title>Reserva de vuelos</title>
</head>
<body>
<nav class="navbar navbar-inverse" role="navigation">
		<ul  class="nav navbar-nav">
			<li class="active"><a href="index.php">Home</a></li>
		</ul>

	</nav>

<div class="well create-box">
		<form id="busquedaVuelos" action="vuelos.php" method="post" role="search">
			<legend>Ingrese sus datos para reservar</legend>
			<div  id="the-basics" >
			<div class="form-group" id="nombreApellidoError">
				<label for="username-email">Ingrese su Nombre y Apellido</label>
				<input type="text"  id="nombreApellido" class="  form-control " name="nombreApellido" placeholder="Nombre y Apellido">
				<span class="glyphicon glyphicon-remove form-control-feedback"></span>
			</div>
			<div class="form-group" id="dniError">
				<label for="password">Ingrese su DNI (ej.12345678)</label>
				<input type="text"  id="dni" class="  form-control " name="dni" placeholder="DNI">
				<span class="glyphicon glyphicon-remove form-control-feedback"></span>
			</div>
			<div class="form-group" id="emailError">
				<label for="password">Ingrese su E-mail</label>
				<input type="text"  id="email" class="  form-control " name="email" placeholder="email">
				<span class="glyphicon glyphicon-remove form-control-feedback"></span>
			</div>
			</div>
			<label for="password">Selecione la fecha de nacimiento </label>
			<div class="input-group date nacimiento" id="fechaNacimientoError">				
				<input id="fechaNacimiento" type="text" class="form-control" name="dias" readonly>
				<span class="  input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
			</div>
			<div class="form-group text-center">
				
				<input type="submit"  class=" col-md-12 btn btn-info btn-create-submit"   />
				<input type="hidden" id="botonBusqueda"  NAME="buscarDia" value="Buscar" />
			</div>
		</form>
	</div>
	<div class="created-in well">
		<h1>Su vuelo a sido reservado, su numero de reserva es:  <div class="pull-right"></div></h1>
	</div>




<?php 
/* captura el boton que se acciono el la pagina anterior*/
  $x = 0;
do {
		# code...
		$x++;
if(isset($_POST['reservar'.$x.'']))  {
	$dias=$_POST['dias']; 
	$clase=$_POST['clase'.$x.'']; 
	$codigoReserva=$_POST['codigoReserva'.$x.'']; 
	//echo "$dias $codigoReserva $clase";
	}
	} while (!isset($_POST['reservar'.$x.''])); // cuando encuentra el submit correcto sal del ciclo
		
 ?>

<footer class="bs-docs-footer col-md-12" role="contentinfo">



	<p>Calle xxxx - xxxx - localidad
		( B1714ALE ) - Buenos Aires - Argentina</p>
		<p>Tel/Fax: ( 54-11 ) 4444-4444 / 5555-5555</p>
		<p>Mail:  mail@mail.com.ar</p>
		<p>Web:   http://www.php.com.ar</p>



	</footer>

	<script src="../js/script.js"></script>
</body>
</html>