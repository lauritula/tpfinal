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


/* valoes de base de datos */
function listado($tipoDeBusqueda){
	while ( $fila  = mysql_fetch_assoc($tipoDeBusqueda)) {
		echo "<form action='formulario.php' method='post'>
		<input TYPE='hidden' name='check'value='$fila[codFrecuencia]'>";
		echo " <tr>
		<td>" .$fila['codFrecuencia']."</td>
		<td>" .$fila['origen']."</td>
		<td>" .$fila['destino']."</td>
		<td>" .$fila['tipoAvion']."</td>
		<td>" .$fila['primera']."</td>
		<td>" .$fila['economy']."</td>
		<td>" .$fila['dias']."</td>


		</tr>";
		echo "</form>";

	}
}
/* ---------------------------------*/
/* tipo de busquedas de vuelo*/
function tipoBusqueda($origen, $dias, $destino){
	if (!$dias && !$origen && !$destino) {
		$resultadoVacio = sentenciaSQL("select * from frecuencias where 1");
		listado($resultadoVacio);
	}	
	if($dias && !$origen && !$destino){
		$resultadoDias = sentenciaSQL("select * from frecuencias where dias LIKE '$dias'");
		listado($resultadoDias);
	}

	if($origen && !$dias  && !$destino){
		$resultadoOrigen =  sentenciaSQL("select * from frecuencias where origen ='$origen'");
		listado($resultadoOrigen);
	}
	if (!$origen && !$dias &&  $destino) {
		$resultadoDestino = sentenciaSQL("select * from frecuencias where destino ='$destino'");
		listado($resultadoDestino);
	}
	if ($origen && $dias &&  $destino) {
		$resultado = sentenciaSQL("select * from frecuencias where origen ='$origen' and dias LIKE '$dias' and destino='$destino'");
		listado($resultado);
	}
	if (!$origen && $dias &&  $destino) {
		$resultado = sentenciaSQL("select * from frecuencias where dias LIKE '$dias' and destino='$destino'");
		listado($resultado);
	}
	if ($origen && !$dias &&  $destino) {
		$resultado = sentenciaSQL("select * from frecuencias where origen ='$origen' and destino='$destino'");
		listado($resultado);
	}
	if (!$origen && $dias &&  !$destino) {
		$resultado = sentenciaSQL("select * from frecuencias where origen ='$origen' and dias LIKE '$dias' ");
		listado($resultado);
	}
}


/* funcion de extraccion de string*/
function after ($this, $inthat)
{
	if (!is_bool(strpos($inthat, $this)))
		return substr($inthat, strpos($inthat,$this)+strlen($this));
};
function before ($this, $inthat)
{
	return substr($inthat, 0, strpos($inthat, $this));
};

function between ($this, $that, $inthat)
{
	return before ($that, after($this, $inthat));
};
function diaFormato($dias){
	$dias= between('(',')',$dias);
  	//echo "$dias";
	/*	$dias= substr($dias, 0,2);*/
	switch ($dias) {
		case 'Lunes':
		return '1______';
		break;
		case 'Martes':
		return '_1_____';
		break;
		case 'Miércoles':
		return '__1____';
		break;
		case 'Jueves':
		return '___1___';
		break;
		case 'Viernes':
		return '____1__';
		break;
		case 'Sábado':
		return '_____1_';
		break;
		case 'Domingo':
		return '______1';
		break;

		default:
		return null;
		break;
	}
};
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
<!-- 
	<div class="col-md-5 col-md-offset-3 col-offset-md-1  panel panel-info " >
		<form class="navbar-form navbar-left" action="" method="post" role="search">
			<div class="form-group well " id="the-basics">
				<label for="origen">Ingrese su ciudad</label>
				<input type="text" class=" typeahead form-control " name="origen" placeholder="origen">
				<label for="origen">Ingrese la ciudad de destino</label>
				<input type="text" class=" typeahead form-control " name="destino" placeholder="destino">
				<div class="input-group date">
					<input type="text" class="form-control" name="dias" readonly><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
				</div>
			</div>

			<div class="form-group col-md-12" >
				<button type="submit" NAME="buscarDia" class="btn btn-default">Submit</button>
			</div>
		</form>


	</div> -->

	<!--  prueba  -->


	<div class="well login-box">
		<form id="busquedaVuelos" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" role="search">
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


	<!-- ................................... -->
	<?php 

	if(isset($_POST['buscarDia']))  {
		conexion();
	mysql_select_db("tpfinalv2") or die("no se puede selecionar la base de datos "); //seleccion

	echo "<table border='1'>";
	echo " <tr>
	<td>codFrecuencia</td>
	<td>origen</td>
	<td>destino</td>
	<td>tipoAvion</td>
	<td>primera</td>
	<td>economy</td>
	<td>dias</td>
	</tr>";
	$dias=$_POST['dias']; 
	$origen=$_POST['origen']; 
	$destino=$_POST['destino']; 
	$dias= diaFormato($dias);
	tipoBusqueda($origen,$dias,$destino);

}

?>




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