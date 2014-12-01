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
		$nombreApellido=$_POST['nombreApellido'];
		$numeroTarjeta=$_POST['numeroTarjeta'];
			//die($numeroTarjeta);
		$objConexion = new conexion;
		$objConexion->conectar("tpfinal");
		$objReserva = new reserva($codigoReserva);
		$objReserva->datosReserva();

		$hoy = date('Y-m-d');
		$objConexion->query("UPDATE reserva SET fechaPago='$hoy' where codigoReserva = '$codigoReserva'");
		$objConexion->query("UPDATE reserva SET numTarjeta = '".$numeroTarjeta."' where codigoReserva = '$codigoReserva'");
		$objConexion->desconectar();
			//die($numeroTarjeta);
		echo  "
		<div class='well create-box'>
		<legend>Comprobante de pago  <a href=\"reservaPago.pdf\" target=\"_blank\"><button class= ' btn btn-success' style='float: right;'>Imprimir</button></a></legend>
		<div  id='the-basics' >
		<div class='form-group ' >
		<span class='col-md-6'>Titular de Tarjeta: ".$nombreApellido."</span>
		<span class='col-md-6'>Fecha:  ".$hoy."</span>
		</div>		
		<div class='form-group ' >
		
		<span>Precio:  $".$objReserva->datosReserva[9]."</span>
		</div>		
		</div>";
		//
		QRcode::png("Titular de Tarjeta: ".$nombreApellido."
			Fecha de pago  ".$hoy."
		Importe:  $".$objReserva->datosReserva[9]."", 'qr.png'); // crea el qr
		//
		$comprobantePago =  "<html>
	<head>
		<link rel='stylesheet' type='text/css' href='../css/style.css'>
		<link rel='stylesheet' type='text/css' href='../css/bootstrap.css'>
		<link rel='stylesheet' type='text/css' href='../css/bootstrap-theme.min.css'>

		<title></title>
	</head>
	<body>

		<div class='well create-box'>
			<legend>Comprobante de pago </legend>
			<div  id='the-basics' >
				<div  class='form-group ' >
					<span class='col-md-6'>Titular de Tarjeta: ".$nombreApellido."</span>
				</div>
				<div >
					<span class='col-md-6'>Fecha:  ".$hoy."</span>
				</div>
				
				<div class='form-group ' >
					
					<span>Precio:  $".$objReserva->datosReserva[9]."</span>
				</div>
				<div class='logo' style='float: right;'>

					<img   class='logo' src= qr.png />
				</div>
				
			</div>	
		</div>
	</body>
	</html>
		";
		$dompdf = new DOMPDF();
		$dompdf->set_paper("letter", "portrait");
		$dompdf->load_html($comprobantePago);//cargamos el html
		$dompdf->render();//renderizamos
		$pdf = $dompdf->output();//asignamos la salida a una variable
		file_put_contents("ReservaPago.pdf", $pdf);//colocamos la salida en un archivo
		



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

