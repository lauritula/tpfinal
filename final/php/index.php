<?php
function conexion (){
	$conexion = mysql_connect("localhost","root","");
	if (!$conexion) 
		return "la conexion fallo";
	else
		return "Conectado";
}
function sentenciaSQL($sentencia){
	$tabla =  mysql_query($sentencia);
	
	if (!$tabla) 
		echo "Fallo la consulta";
	else
		return $tabla;

}

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
	
	
	
	
	<title>Busqueda</title>
</head>
<body>
	<nav class="navbar navbar-inverse" role="navigation">
		<ul  class="nav navbar-nav">
			<li><a href="">Home</a></li>
			<li>
				<form class="navbar-form navbar-left" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" role="search">
					<input>
					<button class="btn btn-default" type="submit" NAME="buscarPasaje" >busque su pasaje</button>
				</form>
			</li>
		</ul>

	</nav>



	<div class="well login-box">
		<form id="busquedaVuelos" action="vuelos.php" method="post" role="search">
			<legend>B&uacute;squeda de vuelos</legend>
			<div  id="the-basics" >
			<div class="form-group">
				<label for="username-email">Ingrese su ciudad</label>
				<input type="text" class=" typeahead form-control " name="origen" placeholder="origen">
			</div>
			<div class="form-group">
				<label for="password">Ingrese la ciudad de destino</label>
				<input type="text" class=" typeahead form-control " name="destino" placeholder="destino">
			</div>
			</div>
			<label for="password">Selecione la fecha de vuelo </label>
			<div class="input-group date">				
				<input type="text" class="form-control" name="dias" readonly>
				<span class="  input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
			</div>
			<div class="form-group text-center">
				
				<input type="submit"  class=" col-md-12 btn btn-info btn-login-submit"   />
				<input type="hidden" id="botonBusqueda"  NAME="buscarDia" value="Buscar" />
			</div>
		</form>
	</div>
	<div class="logged-in well">
		<h1>Buscando vuelos!  <div class="pull-right"></div></h1>
	</div>


	



<footer class="bs-docs-footer col-md-12" role="contentinfo">



	<p>Calle xxxx - xxxx - localidad
		( B1714ALE ) - Buenos Aires - Argentina</p>
		<p>Tel/Fax: ( 54-11 ) 4444-4444 / 5555-5555</p>
		<p>Mail:  mail@mail.com.ar</p>
		<p>Web:   http://www.php.com.ar</p>



	</footer>
	<!-- typeahead y calendario  -->
	


	<script src="../js/script.js"></script>
</body>
</html>