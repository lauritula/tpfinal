<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	
	<script type="text/javascript" src="../js/jquery.js"></script>
	
	<script type="text/javascript" src="../js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../js/typeahead.min.js"></script>
	<script type="text/javascript" src="../js/bootstrap-datepicker.js"></script>
	
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap-theme.min.css">

	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<title>Reserva de vuelos</title>
</head>
<body>
<nav class="navbar navbar-inverse col-md-12" role="navigation">
		<ul  class="nav navbar-nav">
			<li class="active"><a href="index.php">Home</a></li>
		</ul>
	</nav>






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
</body>
</html>