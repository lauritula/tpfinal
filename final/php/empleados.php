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
	<form action='empleados.php' method='post' role='search'>
	<input type='submit' id='tirarReservas'NAME='tirarReservas' value='Eliminar reserva' class=' col-md-6 btn btn-info'>
</form>

<form action='empleados.php' method='post' role='search'>
	<input type='submit' id='graficos'NAME='graficos' value='Graficos semanales' class=' col-md-6 btn btn-info'>
</form>

<?php 
$hoy = date('Y-m-d');
if (isset($_POST['graficos'])) {
	

echo "<div>
<img src='graficoCaidosVendidos.php'>
</div>";
echo "<div>
<img src='graficoPorCategoria.php'>
</div>";
echo "<div>
<img src='graficoPasajerosPorVuelos.php'>
</div>";
}
if (isset($_POST['tirarReservas'])) {
$objReserva = new reserva(000000);
$objReserva->tirarReservasMasivas();
echo $objReserva->datosCaidos;
}
 ?>


<footer class="bs-docs-footer col-md-12" role="contentinfo">
		<p>Universidad Nacional de La Matanza</p>
		<p> Programacion Web 2 -  J. / Sanchez, M. / Tula, L.</p>
		<p>2C 2014</p>
	</footer>
</body>
</html>