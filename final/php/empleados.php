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
	
	<title>Adminitracion</title>
</head>
<body>
<nav class="navbar navbar-inverse" role="navigation">
		<ul  class="nav navbar-nav">
			<li class="active"><a href="index.php">Home</a></li>
		</ul>

	</nav>

<?php 
$hoy = date('Y-m-d');

/*$objConexion = new conexion();
	$objConexion->conectar("tpfinal");
$unionTablas = "select * from pasajero p 
			join reserva r on p.dni = r.dniPasajero
			join vuelos v on r.codVuelo = v.codVuelo
			join frecuencias f on v.codFrecuencia =  f.codFrecuencia
			join aeropuerto a on f.origen = a.codAeropuerto 
			join aeropuerto aDos on f.destino = aDos.codAeropuerto"; // une las tablas

$reservasActivasTabla = $objConexion->query("$unionTablas where r.estado = 1"); // trae los vuelos activos 
while ( $reservasActivas  = mysql_fetch_row($reservasActivasTabla)) 
	{ 	
		echo "<p>".$reservasActivas[0]."</p>";
	}*/

echo "<img src='graficoCaidosVendidos.php'>";
echo "<img src='graficoPorCategoria.php'>";
echo "asientos ociupaods";
echo "<img src='graficoPasajerosPorVuelos.php'>";

 ?>


<footer class="bs-docs-footer col-md-12" role="contentinfo">
		<p>Universidad Nacional de La Matanza</p>
		<p> Programacion Web 2 -  J. / Sanchez, M. / Tula, L.</p>
		<p>2C 2014</p>
	</footer>
</body>
</html>