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
<body id="fondoLight">
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
					<span id='iconoErrorNombre' class='glyphicon glyphicon-remove form-control-feedback invisible'></span>
				</div>
				<div class='form-group' id='dniError'>
					<label for='password'>Ingrese su DNI (ej.12345678)</label>
					<input type='text'  id='dni' class='  form-control ' name='dni' placeholder='DNI'>
					<span id='iconoErrorDni' class='glyphicon glyphicon-remove form-control-feedback invisible'></span>
				</div>
				<div class='form-group' id='emailError'>
					<label for='password'>Ingrese su E-mail</label>
					<input type='text'  id='email' class='  form-control ' name='email' placeholder='email'>
					<span  id='iconoErrorEmail' class='glyphicon glyphicon-remove form-control-feedback invisible'></span>
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
	if(!isset($_POST['cargarDatos']) && !isset($_POST['guardarEspera']) && !isset($_POST['eliminarReserva']) && !isset($_POST['tirarReserva']))  {
	do {
		
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
			echo "<input type='hidden' name='categoria' value='economy' />";
		}
			
		
		else
		{
			echo "<input type='hidden' name='monto' value='".$precioPrimera."' />";
			echo "<input type='hidden' name='categoria' value='primera' />";
		}
			
		
		echo "</div></form></div>"; // cierra el formulario 
		$objConexion->desconectar();
	}	

	/*submit en el formulario*/
	if (isset($_POST['cargarDatos'])){
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
		//if ($objPasajero->duplicado == 1 ) {
		//	$objPasajero->duplicado(); // informa q el pasajero ya dispone de una reserva 
		//}

		/*^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^*/
		$objReserva = new reserva($numeroReserva);
		//die($codigoVuelo);
		$objReserva->guardarReserva($dni,$codigoVuelo,$monto,$categoria);
		$objReserva->datosReserva();
	//die($objReserva->datosReserva[0]);

		$objReserva->contarReservas();
		//die($objReserva->datosReserva[21]);
		//die($codigoVuelo);

		$objPlanoLugares = new planoLugares($objReserva->datosReserva[21]);//se crea el objeto con la cantidad de lugares en el avion
		
		
		 // revisar si el vuelo se encuentra lleno
		 if($objReserva->cantidadAsientos <= $objPlanoLugares->datosTipoAvion["$categoria"]) // cantidad de espacio  
		 {
		 	

		//muestra la pagina siguiente
		 	//die($objReserva->imprimirDatos);
		$cargado = "<div class='created-in'>$objReserva->imprimirDatos <div class='pull-right'></div></div>";
		echo "$cargado";

		/*require_once("dompdf/dompdf_config.inc.php");
		$dompdf = new DOMPDF();
		$dompdf->load_html($cargado);
		$dompdf->render();
		$dompdf->stream("AeroUNLaM_Reserva.pdf");*/

		// ^^^^^^^^^^^^^^^^^^^^^^^^^^^^

		 	//echo $objReserva->cantidadAsientos;
		 	//echo "hay lugar";
		 }
		 else{// no hay lugar
		 	$numeroEspera = $objReserva->cantidadAsientos  - $objPlanoLugares->datosTipoAvion["$categoria"];
		 	echo  "<div class='well create-box'>
		<legend>VUELO LLENO  </legend>	
		<legend>Reserva     ".$objReserva->datosReserva[4]." <a href=\"archivo.pdf\" target=\"_blank\"><button class= ' btn btn-success' style='float: right;'>Imprimir</button></a></legend>
		<div  id='the-basics' >
		<div class='form-group ' >
		<span class='col-md-6'>Vuelo Numero: ".$objReserva->datosReserva[14]."</span>
		<span class='col-md-6'>Fecha:  ".$objReserva->datosReserva[15]."</span>
		</div>
		<div class='form-group ' >
		<span>Origen:  ".$objReserva->datosReserva[26] ."/". $objReserva->datosReserva[27] ."/".  $objReserva->datosReserva[28]."</span>
		</div>
		<div class='form-group ' >
		<span>destino:  ".$objReserva->datosReserva[30]  ."/". $objReserva->datosReserva[31] ."/".  $objReserva->datosReserva[32]." </span>
		</div>
		<div class='form-group ' >
		<span>Nombre:".$objReserva->datosReserva[1]."</span>
		</div>
		<div class='form-group ' >
		<span>Documento:".$objReserva->datosReserva[0]."</span>
		</div>
		<div class='form-group ' >
		<span>E-mail:  ".$objReserva->datosReserva[2]."</span>
		</div>
		<div class='form-group ' >
		<span>Categoria:  ".$objReserva->datosReserva[10]."</span>
		</div>
		<div class='form-group ' >
		
		<span>Precio:  $".$objReserva->datosReserva[9]."</span>
		</div>
		<form action='reservaVuelos.php' method='post' role='search'>
		
		<input type='hidden' id='codigoReserva'  NAME='codigoReserva' value='".$objReserva->codigoReserva."' />
		<input type='hidden' id='numeroEspera'  NAME='numeroEspera' value='".$numeroEspera."' />
		<input type='submit' id='guardarEspera'NAME='guardarEspera' value='Guarda lista de espera'class=' col-md-6 btn btn-info '   />
		<input type='submit' id='eliminarReserva'NAME='eliminarReserva' value='Eliminar reserva' class=' col-md-6 btn btn-danger'   />
		</div>
		</form>

		</div>";
		 }
	
		

	
		
		$objConexion->desconectar();

	
	}
if (isset($_POST['guardarEspera'])){		
		$objConexion = new conexion;
		$objConexion->conectar("tpfinal");
		$codigoReserva=$_POST['codigoReserva'];
		$numeroEspera=$_POST['numeroEspera'];
		$objConexion->query("UPDATE reserva SET listaEspera='$numeroEspera' where codigoReserva = '$codigoReserva'");
		$objConexion->desconectar();
		echo  "<div class='well create-box'>
		<legend>Numero de espera ".$numeroEspera." </legend>	
		<legend>Reserva     ".$codigoReserva."</legend>
		</div>";


}
if (isset($_POST['eliminarReserva'])){
		$objConexion = new conexion;
		$objConexion->conectar("tpfinal");
		$codigoReserva=$_POST['codigoReserva'];
		$objReserva = new reserva($codigoReserva);
		$objReserva->eliminarReserva();
		$objConexion->desconectar();
		header('location: index.php');

}
if (isset($_POST['tirarReserva'])){
		$objConexion = new conexion;
		$objConexion->conectar("tpfinal");
		$codigoReserva=$_POST['codigoReserva'];
		$objReserva = new reserva($codigoReserva);
		$objReserva->tirarReserva();
		$objConexion->desconectar();
		header('location: index.php');

}

	
	

	?>

	<footer class="bs-docs-footer col-md-12" role="contentinfo">
		<p>Universidad Nacional de La Matanza</p>
		<p> Programacion Web 2 - Trabajo Practico Final</p>
		<p>Metallo, M. / Rabuñal, J. / Sanchez, M. / Tula, L.</p>
		<p>2C 2014</p>
	</footer>

		<script src="../js/script.js"></script>
	</body>
	</html>