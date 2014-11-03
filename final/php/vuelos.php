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
function listado($tipoDeBusqueda,$dias){
	$lista ="";
	while ( $fila  = mysql_fetch_assoc($tipoDeBusqueda)) {
		$lista .= "	<tr><td>$dias</td>
						<td>" .$fila['origen']."</td>
						<td>" .$fila['destino']."</td>
						<td>
							<select class='form-control' class='col-md-2'>
								<option value='economico'>Economico</option>
								<option value='primera'>Primera</option>
							</select>
						</td>
						<td>$2000</td>
						<td><input type='number'  class='form-control' style='width:50px;'></td>
						<td><button type='submit'  class=' btn btn-success btn-login-submit'>reservar  </button></td><input type='hidden' id='botonBusqueda'  NAME='buscarDia' value='Buscar'>
					</tr>";
	}
	return $lista;
}
function tipoBusqueda($origen, $diasBinario, $destino,$dias){
	if (!$dias && !$origen && !$destino) {
		$resultado = sentenciaSQL("select * from frecuencias where 1");
		$lista=listado($resultado,$dias);
		return $lista;
	}	
	if($dias && !$origen && !$destino){
		$resultado = sentenciaSQL("select * from frecuencias where dias LIKE '$diasBinario'");
		$lista=listado($resultado,$dias);
		return $lista;
	}

	if($origen && !$dias  && !$destino){
		$resultado =  sentenciaSQL("select * from frecuencias where origen ='$origen'");
		$lista=listado($resultado,$dias);
		return $lista;
	}
	if (!$origen && !$dias &&  $destino) {
		$resultado = sentenciaSQL("select * from frecuencias where destino ='$destino'");
		$lista=listado($resultado,$dias);
		return $lista;
	}
	if ($origen && $dias &&  $destino) {
		$resultado = sentenciaSQL("select * from frecuencias where origen ='$origen' and dias LIKE '$diasBinario' and destino='$destino'");
		$lista=listado($resultado,$dias);
		return $lista;
	}
	if (!$origen && $dias &&  $destino) {
		$resultado = sentenciaSQL("select * from frecuencias where dias LIKE '$diasBinario' and destino='$destino'");
		$lista=listado($resultado,$dias);
		return $lista;
	}
	if ($origen && !$dias &&  $destino) {
		$resultado = sentenciaSQL("select * from frecuencias where origen ='$origen' and destino='$destino'");
		$lista=listado($resultado,$dias);
		return $lista;
	}
	if (!$origen && $dias &&  !$destino) {
		$resultado = sentenciaSQL("select * from frecuencias where origen ='$origen' and dias LIKE '$diasBinario' ");
		$lista=listado($resultado,$dias);
		return $lista;
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
function diaFormato($diasBinario){
	$diasBinario= between('(',')',$diasBinario);
  	switch ($diasBinario) {
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
	
	<script type="text/javascript" src="../js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../js/typeahead.min.js"></script>
	<script type="text/javascript" src="../js/bootstrap-datepicker.js"></script>
	
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap-theme.min.css">

	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<title>Vuelos disponibles</title>
</head>
<body>
	<nav class="navbar navbar-inverse" role="navigation">
		<ul  class="nav navbar-nav">
			<li class="active"><a href="index.php">Home</a></li>
		</ul>
	</nav>

	
<?php 

if(isset($_POST['buscarDia']))  {
	conexion();
	mysql_select_db("tpfinal") or die("no se puede selecionar la base de datos "); //seleccion
   /* variables*/
	$dias=$_POST['dias']; 
	$origen=$_POST['origen']; 
	$destino=$_POST['destino']; 
	$diasBinario= diaFormato($dias);
	$origenCodigo= between('(',')',$origen); // captura solo el codigo de aeropuerto 
	$destinoCodigo= between('(',')',$destino); // captura solo el codigo de aeropuerto
	$lista = tipoBusqueda($origenCodigo,$diasBinario,$destinoCodigo,$dias);

	/* formulario*/
	echo "<div id='vuelosEncontrados' class='  login-box col-md-8 col-md-offset-2'>
		<div class='col-md-12'>
			
			<form action=' method='post' role='search'>
				<legend>Vuelos encontrados</legend>
				<table class='table table-hover '>
					<tr class='info'>
						<td>Fecha de vuelo</td>
						<td>Origen</td>
						<td>Destino</td>
						<td>Clase</td>
						<td>Precio</td>
						<td>Cantidad</td>
						<td></td>
					</tr>
					
						$lista
						
				</table>
			</div>
		</form>
	</div>

	<div class='logged-in well'>
		<h1>Su numero de reserva es  <div class='pull-right'></div></h1>
	</div>";

}

?>
<footer class="bs-docs-footer col-md-12" role="contentinfo">
	<p>Calle xxxx - xxxx - localidad
		( B1714ALE ) - Buenos Aires - Argentina</p>
		<p>Tel/Fax: ( 54-11 ) 4444-4444 / 5555-5555</p>
		<p>Mail:  mail@mail.com.ar</p>
		<p>Web:   http://www.php.com.ar</p>
	</footer>
	<script src="../js/script.js"></script>
</body>
</html>