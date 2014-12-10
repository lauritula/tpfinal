<?php 
session_start();
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
	
	<title>Administracion</title>
</head>
<body id= "empleados">
	<nav class="navbar navbar-inverse" role="navigation">
		<ul  class="nav navbar-nav">
			<li class="active"><a href="index.php">Home</a></li>
		</ul>

	</nav>
	<?php 
	
	if (!isset($_SESSION['idUsuario'])) 

{
echo "<div class='well pago-box'>
		<form id='pagoTarjetaFormulario' action='empleados.php' method='post' role='search'>
			<legend>Login</legend>
			<div  id='the-basics' >
				
				<div class='form-group' >
					<label for='username-email'>ID</label>
					<input type='text'  id='user' class='  form-control ' name='user' placeholder='Usuario'>
				</div>				
				<div class='form-group'>
					<label for='password'>Password</label>
					<input type='password'  id='pass' class='  form-control ' name='pass' placeholder='(password)'>
				</div>				
				<input type='submit' id='login' name='login'value='Ingresar' class=' col-md-12 btn btn-success btn-pago-submit'   />
			</form>";
}
	///////////////////////////////////////////////
	if (isset($_POST['login'])) 
	{

		$user=$_POST['user'];
		$pass=$_POST['pass'];
		
		///
		$objConexion = new conexion();
		$objConexion->conectar("tpfinal");
		$login=$objConexion->query("select * from usuario where user='$user' and pass='$pass'");
		////
		if (mysql_num_rows($login)>0)
		{ 

			$_SESSION['idUsuario']=$user;
			header('location: empleados.php');

		}
		$objConexion->desconectar();
	}

			if (isset($_SESSION['idUsuario'])) 
		{
			echo "<div class = ' panel panel-info text-center col-md-4 col-md-offset-4 '>
			<form action='empleados.php' method='post' role='search' >
			 <legend class='text-center'>PANEL DE CONTROL <button class='btn btn-danger col-md-2 col-md-offset-4' style='float: right;' type='submit' name='salir' >exit</button></legend>
				
					<input type='submit' id='tirarReservas'NAME='tirarReservas' value='Eliminar reserva' class=' col-md-12 btn btn-info'>

					<input type='submit' id='vacantes'NAME='vacantes' value='Notificar Vacantes' class=' col-md-12 btn btn-info'>
			
					<input type='submit' id='graficos'NAME='graficos' value='Graficos semanales' class=' col-md-12 btn btn-info'>
				</form>
			</div>";
			
			$hoy = date('Y-m-d');
				if (isset($_POST['graficos'])) {


					 echo "<div class='text-center col-md-12'>
					 	<div>
						<img src='graficoCaidosVendidos.php'>
						</div>
						 <div>
						<img src='graficoPorCategoria.php'>
						</div>
						 <div>
						<img src='graficoPasajerosPorVuelos.php'>
						</div>
					</div>";
				}
				if (isset($_POST['tirarReservas'])) {
					$objReserva = new reserva(000000);
					$objReserva->tirarReservasMasivas();
					echo" <div class='col-md-12'>
					$objReserva->datosCaidos
					</div>";
					
				}
				if (isset($_POST['vacantes'])) {
					$objReserva = new reserva(000000);
					$objReserva->listaEspera();
					echo "<div class='col-md-12'>
					$objReserva->vacantesDisponibles
					</div>
					<form action='empleados.php' method='post' role='search'  >
			 			<input type='submit' id='notificar'NAME='notificar' value='Notificar por Email' class=' col-md-4 col-md-offset-4  btn btn-info'>
					</form>";
				}
		
	
			}
			if (isset($_POST['notificar'])) {
				$objConexion = new conexion();
				$objConexion->conectar("tpfinal");
				$objConexion->query("update reserva set listaEspera = null where listaEspera = 0 "); // establece null una vez notificado en la tabla 
				$objConexion->desconectar();
			}
			if (isset($_POST['salir'])) {
					session_destroy();
					header('location: empleados.php');
				}
	?>


	
</body>
</html>