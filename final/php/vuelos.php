<?php 
include 'class.php';


/* valoes de base de datos */
function listado($tipoDeBusqueda,$dias){
	$lista ="";
	$contador= 1;
	while ( $fila  = mysql_fetch_row($tipoDeBusqueda)) {
		$lista .= "	<tr><td>$dias</td>
		<td name='origen'>".$fila[10].",".$fila[9].",".$fila[8]."(".$fila[1].")"."</td>
		<td name='destino'>".$fila[14].",".$fila[12].",".$fila[13]."(".$fila[2].")"."</td>
		<td>
		<div class='col-md-12'>
		<input TYPE='radio' id='selectorPrimera' NAME='clase".$contador."' VALUE='primera' CHECKED > Primera $".$fila[4]."
		</div>
		<div class='col-md-12'>
		<input TYPE='radio'  id='selectorEconomy' NAME='clase".$contador."' VALUE='economico' > Economy $".$fila[5]."
		</div>
		</td>
		<input type='hidden'   name='fecha' value='".$fecha= before('(',$dias)."' />
		<input type='hidden'   name='tipoAvion".$contador."' value='".$fila[3]."' />
		<input type='hidden'   name='precioEconomy".$contador."' value='".$fila[5]."' />
		<input type='hidden'   name='precioPrimera".$contador."' value='".$fila[4]."' />
		<input type='hidden'   NAME='codigoFrecuencia".$contador."' value='".$fila[0]."' />
		<td><button type='submit'  name=' reservar".$contador++."'class=' btn btn-success'>reservar  </button></td><input type='hidden' id='botonBusqueda'  NAME='buscarDia' value='Buscar'>
		</tr>";
	}
	return $lista;
}


function tipoBusqueda($origen, $diasBinario, $destino,$dias){
	$objConexion = new conexion;
	$objConexion->conectar("tpfinal");

	$unionTabla = "select * from frecuencias f join aeropuerto a on f.origen = a.codAeropuerto join aeropuerto aDos on f.destino = aDos.codAeropuerto ";
	if (!$dias && !$origen && !$destino) 
		$resultado = $objConexion->query("$unionTabla where 1");		
	if($dias && !$origen && !$destino)
		$resultado = $objConexion->query("$unionTabla where dias LIKE '$diasBinario'");
	if($origen && !$dias  && !$destino)
		$resultado =  $objConexion->query("$unionTabla where origen ='$origen'");	
	if (!$origen && !$dias &&  $destino) 
		$resultado = $objConexion->query("$unionTabla where destino ='$destino'");	
	if ($origen && $dias &&  $destino) 
		$resultado = $objConexion->query("$unionTabla where origen ='$origen' and dias LIKE '$diasBinario' and destino='$destino'");	
	if (!$origen && $dias &&  $destino) 
		$resultado = $objConexion->query("$unionTabla where dias LIKE '$diasBinario' and destino='$destino'");	
	if ($origen && !$dias &&  $destino) 
		$resultado = $objConexion->query("$unionTabla where origen ='$origen' and destino='$destino'");	
	if ($origen && $dias &&  !$destino) 
		$resultado = $objConexion->query("$unionTabla where origen ='$origen' and dias LIKE '$diasBinario' ");	
	$lista=listado($resultado,$dias);
	$objConexion->desconectar();
	return $lista;

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
	<nav class="navbar navbar-inverse col-md-12" role="navigation">
		<ul  class="nav navbar-nav">
			<li class="active"><a href="index.php">Home</a></li>
		</ul>
	</nav>

	
	<?php 

	if(isset($_POST['buscarDia']))  {
	/*	conexion();
	mysql_select_db("tpfinal") or die("no se puede selecionar la base de datos ");*/ //seleccion

	/* variables*/
	$dias=$_POST['dias']; 
	$origen=$_POST['origen']; 
	$destino=$_POST['destino']; 
	$diasBinario= diaFormato($dias);
	$origenCodigo= between('(',')',$origen); // captura solo el codigo de aeropuerto 
	$destinoCodigo= between('(',')',$destino); // captura solo el codigo de aeropuerto
	$lista = tipoBusqueda($origenCodigo,$diasBinario,$destinoCodigo,$dias);

	/* formulario*/
	echo "<div id='vuelosEncontrados' class='  col-md-9 col-md-offset-1'>
	<div class='col-md-12'>

	<form action='reservaVuelos.php' method='post' role='search'>
	<legend>Vuelos encontrados</legend>
	<table class='table table-hover '>
	<tr class='info'>
	<td>Fecha de vuelo</td>
	<td>Origen</td>
	<td>Destino</td>
	<td>Clase</td>
	<td>Precio</td>
	<td></td>
	</tr>

	$lista

	</table>
	</div>
	</form>
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