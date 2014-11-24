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
	<!-- <link href='http://fonts.googleapis.com/css?family=Roboto:700,500italic,300' rel='stylesheet' type='text/css'> -->
	
	<title>Pago</title>
</head>

<body>
	<nav class="navbar navbar-inverse" role="navigation">
		<ul  class="nav navbar-nav">
			<li class="active"><a href="index.php">Home</a></li>
		</ul>

	</nav>
	 <div class='well pago-box'>
		<form id='pagoTarjetaFormulario' action='resultadoPago.php' method='post' role='search'>
			<legend>Ingrese los datos de la tarjeta</legend>
			<div  id='the-basics' >
				<div class='form-group' >
					<label><input class="radioButton" class="tarjetaEmpresa" TYPE="radio" NAME="tarjetaEmpresa" VALUE="visa"><img class="tarjetaLogo" src="../imagenes/visa.png"></label>
					
				<label><input  class="radioButton" class="tarjetaEmpresa" TYPE="radio" NAME="tarjetaEmpresa" VALUE="masterCard"><img class="tarjetaLogo"  src="../imagenes/masterCard.jpg"></label>
				<label><input  class="radioButton" class="tarjetaEmpresa" TYPE="radio" NAME="tarjetaEmpresa" VALUE="cabal"><img class="tarjetaLogo"  src="../imagenes/cabal.jpg"></label>
			</div>
				<div class='form-group' id='nombreApellidoError'>
					<label for='username-email'>Titular de la tarjeta</label>
					<input type='text'  id='nombreApellido' class='  form-control ' name='nombreApellido' placeholder='Nombre y Apellido'>
					<span class='glyphicon glyphicon-remove form-control-feedback'></span>
				</div>
				<div class='form-group' id='numeroTarjetaError'>
					<label for='numeroTarjeta'>Numero de tarjeta</label>
					<input type='text'  id='numeroTarjeta' class='  form-control ' name='numeroTarjeta' placeholder='16 digitos'>
					<span class='glyphicon glyphicon-remove form-control-feedback'></span>
				</div>
				<div class='form-group' id='fechaVencimientoError'>
					<label for='password'>Fecha de Vencimiento</label>
					<input type='text'  id='fechaVencimiento' class='  form-control ' name='fechaVencimiento' placeholder='mm/aa'>
					<span class='glyphicon glyphicon-remove form-control-feedback'></span>
				</div>
				<div class='form-group' id='codigoSeguridadError'>
					<label for='password'>Codigo de seguridad</label>
					<input type='password'  id='codigoSeguridad' class='  form-control ' name='codigoSeguridad' placeholder='(Ver en el reverso de la tarjeta)'>
					<span class='glyphicon glyphicon-remove form-control-feedback'></span>
				</div>
			<div class='form-group text-center'>
			</div>
			
				
				<input type='submit' value="PAGAR VUELO" class=' col-md-12 btn btn-success btn-pago-submit'   />
				<input type='hidden' id='cargarDatos'  NAME='cargarDatos' value='Cargar' />

				<script src="../js/script.js"></script>
</body>
</html>