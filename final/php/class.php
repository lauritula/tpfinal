<?php 
require_once("dompdf/dompdf_config.inc.php");
require_once("phpqrcode/qrlib.php");
require_once("phpqrcode/qrconfig.php"); 
		

class conexion
{
	var $conexion;
	var $nombre;

	function conectar($nombre)
	{
		$this->nombre = $nombre;
		$this->conexion =  mysql_connect("localhost","root","");
		mysql_select_db($this->nombre) or die("no se puede selecionar la base de datos ");
		


	}			
	function query($query)
	{	
		
		$tabla =  mysql_query($query);

		if (!$tabla){
			//echo "Fallo la consulta $query";
			
			return $tabla;
		}
		else
			return $tabla;

	}
	function desconectar()
	{
		mysql_close($this->conexion) or die("no cerro");
	}
}

class pasajero 
{
	var $dni;
	var $nombre;
	var $email;
	var $fecha;
	var $duplicado;
	function __construct($dni,$nombre,$email,$fecha)
	{	
		$this->dni = $dni;
		$this->nombre = $nombre;
		$this->email = $email;
		$this->fecha = $fecha;
		
	}
	function guardarPasajero() 
	{
		$conectar = new conexion();
		$resultado = $conectar->query("INSERT INTO pasajero (dni, nombre, email, fecha) VALUES ('$this->dni', '$this->nombre', '$this->email', '$this->fecha')");
		if ($resultado == 0) {
			$this->duplicado = 1;
		}
	}
	function duplicado()
	{
		$tabla = conexion::query("select codigoReserva,estado from reserva where dniPasajero = $this->dni");
		$codigoReserva = mysql_fetch_row($tabla);
		$objReserva = new reserva($codigoReserva[0]);
		if ($codigoReserva[1] == 1) {
		
		
		$objReserva->datosReserva();
		echo " <legend>Usted ya dispone de la siguiente reserva... desea eliminarla y crear una nuevamente? </legend>$objReserva->imprimirDatos";
		// eliminar reserva para crear otra 
		/*echo "<form action='reservaVuelos.php' method='post' role='search'> 
		<input type='hidden' id='codigoReserva'  NAME='codigoReserva' value='".$objReserva->codigoReserva."' />
		<input type='submit' id='eliminarReserva'NAME='eliminarReserva' value='Eliminar reserva' class=' col-md-12 btn btn-info'   />
		</div>
		</form>";*/
		die();
	}
	
	
	}
	
}

class reserva
{
	var $codigoReserva;
	var $datosReserva;
	var $imprimirDatos;
	var $hoy;
	var $cantidadAsientos;
	var $imprimirPdf;

	function __construct($codigoReserva)
	{


		$this->codigoReserva  = $codigoReserva;
		date_default_timezone_set (  'America/Argentina/Buenos_Aires' );
		$this->hoy = date('Y-m-d');
	}

	function guardarReserva($dni,$codigoVuelo,$monto,$categoria)
	{
		$conectar = new conexion();
		
		$conectar->query("INSERT INTO reserva (codigoReserva,dniPasajero,codVuelo,monto,categoria,estado) VALUES ('$this->codigoReserva',$dni,'$codigoVuelo',$monto,'$categoria',1)");

	}
	function datosReserva()
	{
		$conectar = new conexion();		
		$hs24 = date('Y-m-d',strtotime($this->hoy . "1 days "));
		$hs48 = date('Y-m-d',strtotime($this->hoy . "2 days "));

		$tabla = $conectar->query("select * from pasajero p 
			join reserva r on p.dni = r.dniPasajero
			join vuelos v on r.codVuelo = v.codVuelo
			join frecuencias f on v.codFrecuencia =  f.codFrecuencia
			join aeropuerto a on f.origen = a.codAeropuerto 
			join aeropuerto aDos on f.destino = aDos.codAeropuerto
			where r.codigoReserva  = '$this->codigoReserva'");
		$this->datosReserva =  mysql_fetch_row($tabla);

		$vueloPerdido = "";
		$disabledButtonCheckIn = "<a href='checkIn.php'><button type='button' disabled='disabled' class=' col-md-12 btn btn-warning  sinpadding'>CHECK-IN</button></a>";//deshablitado
		$disabledButtonPago = "<input name='pagar'  value='PAGAR VUELO' type='submit' class=' col-md-12 btn btn-success sinpadding '>";// habilitado
		$tirarReservaButton = "<input type='submit' id='tirarReserva'NAME='tirarReserva' value='Eliminar reserva' class=' col-md-12 btn btn-danger'   />";
		if ($this->datosReserva[8] != NULL &&($this->hoy == $this->datosReserva[15] ||  $hs48 == $this->datosReserva[15] || $hs24 == $this->datosReserva[15] )) 
		{// se habilita el boton cuando el clinte pago y se encuentra dentro de  las 48 hs 
			$disabledButtonCheckIn = "<input type='submit' class=' col-md-12 btn btn-warning sinpadding' value='CHECK-IN'>";
			$tirarReservaButton = "<input type='submit' disabled='disabled' id='tirarReserva'NAME='tirarReserva' value='Tirar reserva' class=' col-md-12 btn btn-danger'   />";

		}
		if ($this->hoy >= $this->datosReserva[15] ||  $this->datosReserva[8] != NULL) 
			{ // se deshabilita el boton cuando ya se encuentra dentro de las 24 hs del vuelo o el vuelo ya este pago 
				$disabledButtonPago ="<input disabled='disabled' value='PAGAR VUELO'   type='submit' class=' col-md-12 btn btn-success sinpadding '>";
				
			}
			if ($this->hoy >= $this->datosReserva[15]) 
			{ // se deshabilita el boton cuando ya se encuentra dentro de las 24 hs del vuelo o el vuelo ya este pago 
				$disabledButtonCheckIn = ""; 
			$disabledButtonPago = "";
			$vueloPerdido = "<button  type='button' disabled='disabled' class=' col-md-12 btn btn-danger '>¡Ya supero el limite para pagar! </button>";
				
			}
			if ($this->hoy > $this->datosReserva[15])
		{// se borran los dos botones
			$disabledButtonCheckIn = ""; 
			$disabledButtonPago = "";
			$vueloPerdido = "<button  type='button' disabled='disabled' class=' col-md-12 btn btn-danger '>¡el vuelo ya partio! </button>";
		}	
		if ($this->datosReserva[7] > 0) // en caso de encontrarse en espera
		{// se borran los dos botones
			$disabledButtonCheckIn = ""; 
			$disabledButtonPago = "";
			$vueloPerdido = "<button  type='button' disabled='disabled' class=' col-md-12 btn btn-danger '>¡Aun no hay vacantes! </button>";
		}	
		if ($this->datosReserva[13] == 0 ) {
			// la reserva esta deshabilitada
			$disabledButtonCheckIn = ""; 
			$disabledButtonPago = "";
			$tirarReservaButton= "";
			$vueloPerdido = "<button  type='button' disabled='disabled' class=' col-md-12 btn btn-danger '>su reserva fue dada de baja </button>";
		}


		$this->imprimirDatos = "
		<div class='well create-box'>
		<legend>Reserva     ".$this->datosReserva[4]." <a href=\"reserva.pdf\" target=\"_blank\"><button class= ' btn btn-success' style='float: right;'>Obtener PDF</button></a></legend>
		<div  id='the-basics' >
		<div class='form-group ' >
		<span class='col-md-6'>Vuelo Numero: ".$this->datosReserva[14]."</span>
		<span class='col-md-6'>Fecha:  ".$this->datosReserva[15]."</span>
		</div>
		<div class='form-group ' >
		<span>Origen:  ".$this->datosReserva[26] ."/". $this->datosReserva[27] ."/".  $this->datosReserva[28]."</span>
		</div>
		<div class='form-group ' >
		<span>destino:  ".$this->datosReserva[30]  ."/". $this->datosReserva[31] ."/".  $this->datosReserva[32]." </span>
		</div>
		<div class='form-group ' >
		<span>Nombre:".$this->datosReserva[1]."</span>
		</div>
		<div class='form-group ' >
		<span>Documento:".$this->datosReserva[0]."</span>
		</div>
		<div class='form-group ' >
		<span>E-mail:  ".$this->datosReserva[2]."</span>
		</div>
		<div class='form-group ' >
		<span>Categoria:  ".$this->datosReserva[10]."</span>
		</div>
		<div class='form-group ' >
		
		<span>Precio:  $".$this->datosReserva[9]."</span>
		</div>
		".$vueloPerdido."
		<div class=' col-md-12 sinpadding'>
		<form action='formularioPague.php' class=' col-md-6 sinpadding' method='post' role='search'>
		<input type='hidden' id='tipoAvion'  NAME='tipoAvion' value='".$this->datosReserva[21]."' /> 
		<input type='hidden' id='codigoReserva'  NAME='codigoReserva' value='".$this->codigoReserva."' /> 
		
		".$disabledButtonPago."		
		</form>
		<form action='checkIn.php' method='post'class=' col-md-6 sinpadding' role='search'>
		<input type='hidden' id='tipoAvion'  NAME='tipoAvion' value='".$this->datosReserva[21]."' /> 
		<input type='hidden' id='codigoReserva'  NAME='codigoReserva' value='".$this->codigoReserva."' /> 
		".$disabledButtonCheckIn."		
		</form>
		<form action='reservaVuelos.php'class=' col-md-12 sinpadding' method='post' role='search'> 
		<input type='hidden' id='codigoReserva'  NAME='codigoReserva' value='".$this->codigoReserva."' />
		".$tirarReservaButton."
		</form>

		</div>
		</div>";
	/*	$tabla = conexion::query("select count(codigoReserva) cantidad from reserva where codVuelo = '".$this->datosReserva[14]."' and categoria = '".$this->datosReserva[10]. "'");
		$codigo = mysql_fetch_row($tabla);
		$this->cantidadAsientos = $codigo[0];*/
		$this->imprimirPdf = "
		<div class='well create-box'>
		<legend>Comprobante de reserva</legend>
		<legend>Reserva     ".$this->datosReserva[4]."</legend>
		<div  id='the-basics' >
		<div class='form-group ' >
		<span class='col-md-6'>Vuelo Numero: ".$this->datosReserva[14]."</span>
		<span class='col-md-6'>Fecha:  ".$this->datosReserva[15]."</span>
		</div>
		<div class='form-group ' >
		<span>Origen:  ".$this->datosReserva[26] ."/". $this->datosReserva[27] ."/".  $this->datosReserva[28]."</span>
		</div>
		<div class='form-group ' >
		<span>destino:  ".$this->datosReserva[30]  ."/". $this->datosReserva[31] ."/".  $this->datosReserva[32]." </span>
		</div>
		<div class='form-group ' >
		<span>Nombre:".$this->datosReserva[1]."</span>
		</div>
		<div class='form-group ' >
		<span>Documento:".$this->datosReserva[0]."</span>
		</div>
		<div class='form-group ' >
		<span>E-mail:  ".$this->datosReserva[2]."</span>
		</div>
		<div class='form-group ' >
		<span>Categoria:  ".$this->datosReserva[10]."</span>
		</div>
		<div class='form-group ' >
		
		<span>Precio:  $".$this->datosReserva[9]."</span>
		</div>
		</div>
		</div>";
  

$dompdf = new DOMPDF();
$dompdf->set_paper("letter", "portrait");
$dompdf->load_html($this->imprimirPdf);//cargamos el html
$dompdf->render();//renderizamos
$pdf = $dompdf->output();//asignamos la salida a una variable
file_put_contents("Reserva.pdf", $pdf);//colocamos la salida en un archivo
	}
	function buscarReserva()
	{
		$conectar = new conexion();

		$tabla=$conectar->query("select codigoReserva from reserva where codigoReserva='$this->codigoReserva' ");
		$codigo = mysql_fetch_assoc($tabla);
		$this->codigoReserva =  $codigo['codigoReserva'];
	}
	function contarReservas()
	{
		$tabla = conexion::query("select count(codigoReserva) cantidad from reserva where codVuelo = '".$this->datosReserva[14]."' and categoria = '".$this->datosReserva[10]. "'");
		$codigo = mysql_fetch_row($tabla);
		$this->cantidadAsientos = $codigo[0];
	}
	function eliminarReserva()
	{		
		$this->datosReserva($this->codigoReserva);
		conexion::query("DELETE FROM reserva WHERE codigoReserva = '$this->codigoReserva'");
		conexion::query("DELETE FROM pasajero WHERE dni = ".$this->datosReserva[0]."");	
		// si el vuelo tiene lista de espera reduce el numero de espera porque se libera una vacante 
		$tabla = conexion::query("UPDATE reserva set listaEspera = listaEspera  - 1 where codVuelo = '".$this->datosReserva[14]."' and categoria = '".$this->datosReserva[10]. "' and listaEspera is not NULL and listaEspera >0 ORDER BY listaEspera ASC ");
		
	}
	function tirarReserva()
	{		
		$this->datosReserva($this->codigoReserva);
		conexion::query("UPDATE reserva SET estado = 0 where codigoReserva = '$this->codigoReserva'");
		// si el vuelo tiene lista de espera reduce el numero de espera porque se libera una vacante 
		$tabla = conexion::query("UPDATE reserva set listaEspera = listaEspera  - 1 where codVuelo = '".$this->datosReserva[14]."' and categoria = '".$this->datosReserva[10]. "' and listaEspera is not NULL and listaEspera >0 ORDER BY listaEspera ASC ");
		
	}
	function colaEspera()
	{
		conexion::query("");
	}
	function tirarReservasMasivas()
	{
		$hoy = date('Y-m-d');
		$contador= 0; 
$objConexion = new conexion();
	$objConexion->conectar("tpfinal");

$reservasActivasTabla = $objConexion->query("select * from pasajero p 
			join reserva r on p.dni = r.dniPasajero
			join vuelos v on r.codVuelo = v.codVuelo
			join frecuencias f on v.codFrecuencia =  f.codFrecuencia
			join aeropuerto a on f.origen = a.codAeropuerto 
			join aeropuerto aDos on f.destino = aDos.codAeropuerto where r.estado = 1"); // trae los vuelos activos 
while ( $reservasActivas  = mysql_fetch_row($reservasActivasTabla)) 
	{ 	
		$this->codigoReserva = $reservasActivas[4];
		if ($hoy >= $reservasActivas[15]) 
		{ // cuando ya se encuentra dentro de las 24 hs del vuelo o el vuelo ya este pago 
			$contador++;
			//echo $reservasActivas[4];
			$this->tirarReserva();


		}
		if ($hoy > $reservasActivas[15] &&  $reservasActivas[12] == null)
		{// el vuelo ya partio y no se hizo checkin
			$contador++;
			//echo $reservasActivas[4];
			$this->tirarReserva();

		}

	}
//echo "Se cancelaron ".$contador." reservas";
	}
}

class vuelo{
	var $codigoVuelo;
	var $fechaVuelo;
	var $codigoFrecuencia;
	var $modeloAvion;
	
	function __construct($fecha,$codigoFrecuencia,$tipoAvion)
	{	
		$conectar = new conexion();
		$crearVuelo = 1;
		$this->codigoVuelo = chr(rand(65,90)) . chr(rand(65,90)) . intval( "0" . rand(1,9) . rand(0,9)) . chr(rand(65,90)) . chr(rand(65,90)); 
		$this->fechaVuelo = date('Y-m-d',strtotime($fecha));
		$this->codigoFrecuencia = $codigoFrecuencia;
	//die("$fecha , $this->fechaVuelo $this->codigoVuelo $this->codigoFrecuencia ");
		$vueloExistente = $conectar->query("SELECT * FROM vuelos WHERE 1 "); // busca los vuelos existentes
		while ($fila =  mysql_fetch_row($vueloExistente)) 
		{
			if ($this->fechaVuelo == $fila[1] && $this->codigoFrecuencia == $fila[2] )
			{
				$crearVuelo = 0;
				$this->codigoVuelo = $fila[0];

			}


		}
		
		if ($crearVuelo == 1) {


			$resultado = $conectar->query("SELECT codAvion FROM avion WHERE tipoAvion  = '$tipoAvion' ");
			while ($fila =  mysql_fetch_row($resultado)) {
			$this->modeloAvion  =$fila[0]; // busca el modelo de avion segun su tipo

		}
		$conectar->query("INSERT INTO vuelos (codVuelo,fechaVuelo,codFrecuencia,codAvion) VALUES ('$this->codigoVuelo','$this->fechaVuelo',$this->codigoFrecuencia,'$this->modeloAvion')");
	}
}
}

class planoLugares{
	var $economy; // cantidad de lugares 
	var $primera; 
	var $datosTipoAvion;
	var $contadorPrimera=0;
	var $contadorEconomy = 0;
	function __construct($tipoAvion)
	{	
		switch ($tipoAvion)
		{
			case '1':
			$tabla = conexion::query("select * from tipo where tipoAvion=$tipoAvion");
			break;
			
			case '2':
			$tabla = conexion::query("select * from tipo where tipoAvion=$tipoAvion");
			break;
			
			case '3':
			$tabla = conexion::query("select * from tipo where tipoAvion=$tipoAvion");
			break;
			
			case '4':
			$tabla = conexion::query("select * from tipo where tipoAvion=$tipoAvion");
			break;
			default:
				die("error");
			break;
		}

		$this->datosTipoAvion =  mysql_fetch_assoc($tabla);
		
	}

	
	function plano($codigoReserva)
	{	
		$objReserva = new reserva($codigoReserva);
		$objReserva->buscarReserva();
		$objReserva->datosReserva();
		$this->contadorPrimera = 1;
		$this->contadorEconomy = 1;
		$asientoOcupado = "class = '' disabled='disabled'><img src='../imagenes/asientos sin fondo blanco/asiento4.png '> ";
		$asientoDesocupado = "class='btn-success'><img src='../imagenes/asientos sin fondo blanco/asiento6.png '> ";

		$ocupados = 0;
		$deshabilitado = 0;

		// asientos ocupados 
		$tabla = conexion::query("select * from reserva where codVuelo = '".$objReserva->datosReserva[14]."'");
		
		while ( $butaca  = mysql_fetch_assoc($tabla)) // asigna a un array las variables de BD
		{
			$butacas[$ocupados] = $butaca['asiento'];
			$ocupados++;			
		}

		
		if ($this->datosTipoAvion['primera'] != 0) // si el avion no tiene primera no lo crea
		{
			$this->primera = "<table class='table table-condensed'>";
			for ($i=0; $i < $this->datosTipoAvion['primeraFilas'] ; $i++) // construye el plano primera
			{ 
				$this->primera .= "<tr>";
				for ($j=0; $j <$this->datosTipoAvion['primeraCols'] ; $j++)//columnas 
				{ 
					
					for ( $d=0; $d < $ocupados;  $d++) // asientos deshabilitados 
					{		
						if ($butacas[$d] == "P".$this->contadorPrimera  || $objReserva->datosReserva[10]!="primera")						
						$deshabilitado = 1;				
					}
					
					if ($deshabilitado == 1) 
						$asiento = $asientoOcupado;					
					else
						$asiento = $asientoDesocupado;

					$this->primera .= "<td><button  name='1' value='".$codigoReserva."P".$this->contadorPrimera."'".$asiento .$this->contadorPrimera."</button></td>";
					 $this->contadorPrimera++;
					$deshabilitado = 0; // vuelve a estanciar la variable para que lo calcule otra vez

					
				}
				$this->primera .= "</tr>";
			}	
			$this->primera .= "</table>";
			
			
		}
		
		$this->economy = "<table class='table table-condensed planilla'>";
		for ($i=0; $i <$this->datosTipoAvion['economyFilas'] ; $i++)  // construye el plano economy
		{ 
			$this->economy .= "<tr class='plano'>";
			for ($j=0; $j <$this->datosTipoAvion['economyCols'] ; $j++)
			{ 
				for ( $d=0; $d < $ocupados;  $d++) // asientos deshabilitados 
					{		
						if ($butacas[$d] == "E".$this->contadorEconomy || $objReserva->datosReserva[10]!="economy" )	//si el cliente tiene pasaje Economy 					
						$deshabilitado = 1;				
					}
					
					if ($deshabilitado == 1) 
						$asiento = $asientoOcupado;					
					else
						$asiento = $asientoDesocupado;

				$this->economy .= "<td  class='butaca'><button   name='1'value='".$codigoReserva."E".$this->contadorEconomy."'".$asiento.$this->contadorEconomy."</button></td>";
				$this->contadorEconomy++;
				$deshabilitado = 0; // vuelve a estanciar la variable para que lo calcule otra vez
			}
			$this->economy .= "</tr>";
		}	
		$this->economy .= "</table>";
	

	}

}
?>