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
	<!-- <link href='http://fonts.googleapis.com/css?family=Roboto:700,500italic,300' rel='stylesheet' type='text/css'> -->
	
	<title>Pago realizado</title>
</head>
	<body id="fondoLight">
		<nav class="navbar navbar-inverse" role="navigation">
		<ul  class="nav navbar-nav">
			<li class="active"><a href="index.php">Home</a></li>
		</ul>	
	</nav>

		<?php
		if (isset($_POST['cargarPago'])){	
			$codigoReserva=$_POST['codigoReserva'];
			$numeroTarjeta=$_POST['numeroTarjeta'];
			//die($numeroTarjeta);
			$objConexion = new conexion;
		$objConexion->conectar("tpfinal");

		$hoy = date('Y-m-d');
		$objConexion->query("UPDATE reserva SET fechaPago='$hoy' where codigoReserva = '$codigoReserva'");
		$objConexion->query("UPDATE reserva SET numTarjeta = '".$numeroTarjeta."' where codigoReserva = '$codigoReserva'");
		$objConexion->desconectar();
			die($numeroTarjeta);
			echo "
		<div class='well create-box'>
		<legend>Comprobante de pago  <a href=\"archivo.pdf\" target=\"_blank\"><button class= ' btn btn-success' style='float: right;'>Imprimir</button></a></legend>
		<div  id='the-basics' >
		<div class='form-group ' >
		<span class='col-md-6'>Tarjeta Numero: ".$numeroTarjeta."</span>
		<span class='col-md-6'>Fecha:  ".$hoy."</span>
		</div>
		<div class='form-group ' >
		<span>Origen:  ".$this->datosReserva[26] ."/". $this->datosReserva[27] ."/".  $this->datosReserva[28]."</span>
		</div>
		<div class='form-group ' >
		<span>destino:  ".$this->datosReserva[30]  ."/". $this->datosReserva[31] ."/".  $this->datosReserva[32]." </span>
		</div>
		<div class='form-group ' >
		<span>Nombre:".$this->datosReserva[1]."</span>
		</div>
		<div class='form-group ' >
		<span>Documento:".$this->datosReserva[0]."</span>
		</div>
		<div class='form-group ' >
		<span>E-mail:  ".$this->datosReserva[2]."</span>
		</div>
		<div class='form-group ' >
		<span>Categoria:  ".$this->datosReserva[10]."</span>
		</div>
		<div class='form-group ' >
		
		<span>Precio:  $".$this->datosReserva[9]."</span>
		</div>
		
		</div>";
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

