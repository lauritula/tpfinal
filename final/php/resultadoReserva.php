
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



$numReserva=$_POST['numReserva'];
    
	$objConexion = new conexion;
	$objConexion->conectar("tpfinal");
	$objReserva = new reserva;
	$codigo= $objReserva->buscarReserva($numReserva);
  
 if ($codigo) {
echo "$codigo";
   /*	$imprimirFormulario = "<div class='well create-box'>
			<legend>Reserva</legend>
		<div  id='the-basics' >
			<div class='form-group col-md-12' >
				<span class='col-md-6'>Vuelo Numero: ".."</span>
				<span class='col-md-6'>Fecha:".."</span>

			</div>
			<div class='form-group col-md-12' >
				<span>Origen: ".."</span>
			</div>
			<div class='form-group col-md-12' >
				<span>destino:".." </span>
			</div>
			<div class='form-group col-md-12' >
				<span>Nombre:</span>
			</div>
			<div class='form-group col-md-12' >
				<span>Documento:</span>
			</div>
			<div class='form-group col-md-12' >
				<span>E-mail:</span>
			</div>
			<div class='form-group col-md-12' >
				<span>Categoria:</span>
				<span>Precio:</span>
			</div>
			<div class='form-group col-md-12' >
				<span>asdsadsasa</span>
			</div>
			<div class='form-group col-md-12' >
				<span></span>
			</div>
 		</div>
		<div class='form-group text-center'>

		<a href='formularioPague.php'><button type='button' class=' col-md-6 btn btn-warning '>PAGAR VUELO</button></a>
	<a href='checkIn.php'><button type='button' class=' col-md-6 btn btn-success '>CHECK-IN</button></a>
	
	</div>
	</div>
	

</div>";*/


	
		$DatosReserva=$objConexion->query("select * from pasajero p join reserva r on p.dni = r.dniPasajero join vuelos v on r.codVuelo = v.codVuelo 
where r.codigoReserva  = '$codigo'");
	echo "$imprimirFormulario";

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
