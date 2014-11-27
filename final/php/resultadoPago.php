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
			$objConexion = new conexion;
		$objConexion->conectar("tpfinal");
		$comprontePago = ""; 
		$hoy = date('Y-m-d');
		$objConexion->query("UPDATE reserva SET fechaPago='$hoy' where codigoReserva = '$codigoReserva'");
		$objConexion->desconectar();
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

