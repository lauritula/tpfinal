<?php include 'class.php'; ?>
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
	<script src="../js/script.js"></script>
	<title>Check In</title>
</head>
<body>

	<nav class="navbar navbar-inverse col-md-12" role="navigation">
		<ul  class="nav navbar-nav">
			<li class="active"><a href="index.php">Home</a></li>
		</ul>
	</nav>
<?php 
	$tipoAvion=$_POST['tipoAvion']; 
	$codigoReserva=$_POST['codigoReserva']; 
	$objConexion = new conexion;
	$objConexion->conectar("tpfinal");
	$objPlano = new planoLugares($tipoAvion);
	$objPlano->plano($codigoReserva);
	//echo "$tipoAvion";
	//echo $objPlano->datosTipoAvion['primera'];
 ?>
	<div class="primera col-md-5  col-md-offset-3"> 
	
			<?php echo "$objPlano->primera"; ?>
		
	</div>
	<div class="economy col-md-5  col-md-offset-3"> 
		<?php echo "$objPlano->economy"; ?>
	</div>
</body>
</html>