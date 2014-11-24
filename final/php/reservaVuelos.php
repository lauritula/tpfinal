<?php 
include "class.php";
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
	
	<title>Reserva de vuelos</title>
</head>
<body>
	<nav class="navbar navbar-inverse" role="navigation">
		<ul  class="nav navbar-nav">
			<li class="active"><a href="index.php">Home</a></li>
		</ul>

	</nav>
<?php 
$paginaCargar = "<div class='well create-box'>
		<form id='busquedaVuelos' action='reservaVuelos.php' method='post' role='search'>
			<legend>Ingrese sus datos para reservar</legend>
			<div  id='the-basics' >
				<div class='form-group' id='nombreApellidoError'>
					<label for='username-email'>Ingrese su Nombre y Apellido</label>
					<input type='text'  id='nombreApellido' class='  form-control ' name='nombreApellido' placeholder='Nombre y Apellido'>
					<span class='glyphicon glyphicon-remove form-control-feedback'></span>
				</div>
				<div class='form-group' id='dniError'>
					<label for='password'>Ingrese su DNI (ej.12345678)</label>
					<input type='text'  id='dni' class='  form-control ' name='dni' placeholder='DNI'>
					<span class='glyphicon glyphicon-remove form-control-feedback'></span>
				</div>
				<div class='form-group' id='emailError'>
					<label for='password'>Ingrese su E-mail</label>
					<input type='text'  id='email' class='  form-control ' name='email' placeholder='email'>
					<span class='glyphicon glyphicon-remove form-control-feedback'></span>
				</div>
			</div>
			<label for='password'>Selecione la fecha de nacimiento </label>
			<div class='input-group date nacimiento' id='fechaNacimientoError'>				
				<input id='fechaNacimiento' type='text' class='form-control' name='fechaNacimiento' readonly>
				<span class='  input-group-addon'><i class='glyphicon glyphicon-calendar'></i></span>
			</div>
			<div class='form-group text-center'>
				
				<input type='submit'  class=' col-md-12 btn btn-info btn-create-submit'   />
				<input type='hidden' id='cargarDatos'  NAME='cargarDatos' value='Cargar' />";
	
 ?>
	
	



	<?php 
	/* captura el boton que se acciono el la pagina anterior*/
	$x = 0;
	if(!isset($_POST['cargarDatos']))  {
	do {
		# code...
		$x++;
		if(isset($_POST['reservar'.$x.'']) && !isset($_POST['cargarDatos']))  {
			$fecha=$_POST['fecha'];
			$tipoAvion=$_POST['tipoAvion'.$x.'']; 
			$precioPrimera=$_POST['precioPrimera'.$x.''];			
			$precioEconomy=$_POST['precioEconomy'.$x.'']; 
			$clase=$_POST['clase'.$x.'']; // primera o economy
			$codigoFrecuencia=$_POST['codigoFrecuencia'.$x.'']; 
	//echo "$dias $codigoFrecuencia $clase";
		}
	} while (!isset($_POST['reservar'.$x.'']) ); // cuando encuentra el submit correcto sal del ciclo
	echo "$paginaCargar";
	$objConexion = new conexion;
		$objConexion->conectar("tpfinal");
		$objVuelo = new vuelo($fecha,$codigoFrecuencia,$tipoAvion); // crea vuelo
		echo "<input type='hidden'   name='codigoVuelo' value='".$objVuelo->codigoVuelo."' />"; // envia codigo de vuelo para hacer la reserva
		//die("$clase, $precioEconomy $precioPrimera");
		if ($clase == "economico")
		{
			echo "<input type='hidden' name='monto' value='".$precioEconomy."' />";
			echo "<input type='hidden' name='categoria' value='Economy' />";
		}
			
		
		else
		{
			echo "<input type='hidden' name='monto' value='".$precioPrimera."' />";
			echo "<input type='hidden' name='categoria' value='Primera' />";
		}
			
		
		echo "</div></form></div>"; // cierra el formulario 
		$objConexion->desconectar();
	}	

	/*submit en el formulario*/
	else {
		$objConexion = new conexion;
		$objConexion->conectar("tpfinal");
		$numeroReserva = chr(rand(65,90)) . chr(rand(65,90)) . intval( "0" . rand(1,9) . rand(0,9)) . chr(rand(65,90)) . chr(rand(65,90)); 
		
		//$numeroReserva = intval( "0" . rand(1,9) . rand(0,9). rand(0,9). rand(0,9). rand(0,9). rand(0,9). rand(0,9));
		$dni=$_POST['dni']; 
		$email=$_POST['email']; 
		$nombreApellido=$_POST['nombreApellido']; 
		$fechaNacimiento=$_POST['fechaNacimiento']; 
		$codigoVuelo=$_POST['codigoVuelo']; 
		$monto=$_POST['monto']; 
		$categoria=$_POST['categoria']; 
			/* guardar datos del pasajero en base de datos */
		$objPasajero = new pasajero($dni,$nombreApellido,$email,$fechaNacimiento);
		$objPasajero->guardarPasajero();
		/*^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^*/
		$objReserva = new reserva($numeroReserva);
		$objReserva->guardarReserva($dni,$codigoVuelo,$monto,$categoria);
		$objReserva->datosReserva();
		$objPlanoLugares = new planoLugares($objReserva->datosReserva[20]);//se crea el objeto con la cantidad de lugares en el avion
		echo $objPlanoLugares->datosTipoAvion['primera'];
		//muestra la pagina siguiente
		$cargado = "<div class='created-in'>$objReserva->imprimirDatos <div class='pull-right'></div></div>";
		echo "$cargado";
		// ^^^^^^^^^^^^^^^^^^^^^^^^^^^^


	
		
		$objConexion->desconectar();


		



	}

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