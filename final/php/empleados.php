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

echo "<div>
	<span>Pasajes Caidos y Vendidos</span>
<img src='graficoCaidosVendidos.php'>
</div>";
echo "<div>
	<span>Pasajes vendidos por categoria</span>
<img src='graficoPorCategoria.php'>
</div>";
echo "<div>
	<span>Lugares ocupados por vuelo</span>
<img src='graficoPasajerosPorVuelos.php'>
</div>";

 ?>

<footer class="bs-docs-footer col-md-12" role="contentinfo">
		<p>Universidad Nacional de La Matanza</p>
		<p> Programacion Web 2 -  J. / Sanchez, M. / Tula, L.</p>
		<p>2C 2014</p>
	</footer>
</body>
</html>