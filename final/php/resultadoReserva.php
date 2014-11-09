
<?php 
include "class.php";

 ?>



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
	
	<title>Resultado de b&uacute;squeda de reserva!</title>
</head>

<body>
	<nav class="navbar navbar-inverse" role="navigation">
		<ul  class="nav navbar-nav">
			<li class="active"><a href="index.php">Home</a></li>
		</ul>	
	</nav>


<?php



//funcion para encontrar el codigo de reserva en la base de datos//
$numReserva=$_POST['numReserva'];
echo "$numReserva";
function codReserva($numReserva)
{
	$objConexion = new conexion;
	$objConexion->conectar("tpfinal");

    $consulta=mysql_query("select * from reserva where codigoReserva=$numReserva");

    //$resultado=$objConexion->query("select codigoReserva from reserva where codigoReserva=$numReserva");
    //mysql_fetch_assoc($resultado);

    //if($resultado==$numReserva){

    //	echo "$res reserva encontrada";
    //}
	$objConexion->desconectar();

	$a=mysql_fetch_assoc($consulta);
    
	echo $a["codigoReserva"];

}
  codReserva($numReserva);

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
